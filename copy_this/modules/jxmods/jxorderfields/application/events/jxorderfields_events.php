<?php
/*
 *    This file is part of the module jxOrderFields for OXID eShop Community Edition.
 *
 *    The module jxOrderFields for OXID eShop Community Edition is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    The module jxOrderFields for OXID eShop Community Edition is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      https://github.com/job963/jxOrderFields
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @copyright (C) Joachim Barthel 2017
 * 
 */

class jxorderfields_events
{ 
    public static function onActivate() 
    { 
        $oConfig = oxRegistry::get('oxConfig');
        $sLogPath = $oConfig->getConfigParam("sShopDir") . '/log/';
        $fh = fopen($sLogPath.'jxmods.log', "a+");
        
        $aSaveFields = $oConfig->getConfigParam('aJxOrderFieldsSaveFields');
        
        $oDb = oxDb::getDb( oxDB::FETCH_MODE_ASSOC );
        $sSql = "SHOW COLUMNS FROM oxarticles";
        
        try {
            $rs = $oDb->Select($sSql);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
        
        $aArticleCols = array();
        if ($rs) {
            while (!$rs->EOF) {
                array_push($aArticleCols, $rs->fields);
                $rs->MoveNext();
            }
        }

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
            
            try {
                $oDb->execute($sAlter);
            }
            catch (Exception $e) {
                //echo $e->getMessage();
            }
        }
        
        fclose($fh);
        
        return TRUE;
    }

    
    public static function onDeactivate() 
    { 
        // do nothing
        
        return TRUE; 
    }  
}