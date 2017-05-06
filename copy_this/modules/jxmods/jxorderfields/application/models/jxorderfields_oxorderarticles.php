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

class jxorderfields_oxorderarticles extends jxorderfields_oxorderarticles_parent
{
    /**
     * Saves order article object. If saving succeded - updates
     * article stock information if oxOrderArticle::isNewOrderItem()
     * returns TRUE. Returns saving status
     *
     * @return bool
     */
    public function save()
    {
        $blSave = parent::save();
        $this->jxSaveMoreFields();
        
        return $blSave;
    }
    
    
    /**
     * Saves the additional defined fields in table oxorderarticles.
     * For avoiding conflicts, the additional field are having the
     * prefix jx instead of the original ox prefix.
     * 
     * @return bool
     */
    public function jxSaveMoreFields()
    {
        $oConfig = oxRegistry::get('oxConfig');
        $aSaveFields = $oConfig->getConfigParam('aJxOrderFieldsSaveFields');
        $oArticle = $this->getArticle();
        $oDb = oxDb::getDb();
        $aSet = array();
        
        foreach ($aSaveFields as $sDbField) {
            if (array_key_exists($sDbField, $oArticle->_aFieldNames)) {
                $sTargetField = 'jx' . substr($sDbField, 2);
                $sOriginField = 'oxarticles__' . $sDbField;
            $aSet[] = 'oxorderarticles.' . $sTargetField . ' = ' . $oDb->quote($oArticle->{$sOriginField}->value);
            }
        }
        $sSet = implode(', ', $aSet);

        $sSql = 'update oxorderarticles set ' . $sSet . ' '
                .'where oxorderarticles.oxid = ' . $oDb->quote($this->oxorderarticles__oxid->value);

        $oDb->execute($sSql);
        
    }
    
}