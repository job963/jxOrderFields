<?php
/*
 *    This file is part of the module jxOrderFields for OXID eShop Community Edition.
 *
 *    The module jxOrderFields for OXID eShop is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    The module jxOrderFields for OXID eShop is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      https://github.com/job963/jxOrderFields
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @copyright (C) Joachim Barthel 2017-2018
 * 
 */

use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Registry;

namespace JxMods\JxOrderFields\Core;

/**
 * Class Events
 */
class Events
{ 
    /**
     * This event gets executed on activation of the module.
     * Creates the database fields, specified in the module setting.
     * 
     * @return boolean
     */
    public static function onActivate() 
    { 
        //-$oConfig = oxRegistry::get('oxConfig');
        $config = $this->getConfig();
        $sLogPath = $config()->getConfigParam( 'sShopDir' ) . '/log/';
        $fh = fopen( $sLogPath.'jxmods.log', "a+" );
        
        $aSaveFields = $config->getConfigParam( 'aJxOrderFieldsSaveFields' );
        
        //-$oDb = oxDb::getDb( oxDB::FETCH_MODE_ASSOC );
        $oDb = DatabaseProvider::getDb( DatabaseProvider::FETCH_MODE_ASSOC );
        $query = "SHOW COLUMNS FROM oxarticles";
        
        try {
            $resultSet = $oDb->Select( $query );
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
        
        /*--$aArticleCols = array();
        if ($rs) {
            while (!$rs->EOF) {
                array_push($aArticleCols, $rs->fields);
                $rs->MoveNext();
            }
        }*/
        $aArticleCols = $resultSet->fetchAll();

        foreach ($aSaveFields as $sDbField) {
            $sDbField = strtoupper($sDbField);
            foreach ($aArticleCols as $key => $aFields) {
                if (strtoupper($aFields['Field']) == $sDbField) {
                    $sAlter = 'ALTER TABLE oxorderarticles ';
                    $sAlter .= 'ADD COLUMN `' . 'JX' . substr($sDbField, 2) . '` ';
                    $sAlter .= $aFields['Type'] . ' ';
                    if ($aFields['Null'] != 'No') {
                        $sAlter .= 'NOT NULL ';
                    } 
                    if ($aFields['Default'] != '') {
                        $sAlter .= 'DEFAULT ' . $oDb->quote($aFields['Default']);
                    }
                }
            }
            
            if ( !$oDb->getOne( "SHOW COLUMNS FROM oxorderarticles LIKE 'JX".substr($sDbField, 2)."'", false, false ) ) {
                try {
                    $oDb->execute($sAlter);
                }
                catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
        
        fclose($fh);
        
        return TRUE;
    }

    
    /**
     * This event gets executed on deactivation of the module.
     * But does nothing ;)
     * 
     * @return boolean
     */
    public static function onDeactivate() 
    { 
        // do nothing
        
        return TRUE; 
    }  
}