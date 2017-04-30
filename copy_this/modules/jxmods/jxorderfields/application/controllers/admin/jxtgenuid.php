<?php
/**
 *    This file is part of the module jxTools for OXID eShop Community Edition.
 *
 *    The module jxTools for OXID eShop Community Edition is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    The module jxTools for OXID eShop Community Edition is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      https://github.com/job963/jxTools
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @copyright (C) 2017 Joachim Barthel
 * @author    Joachim Barthel <jobarthel@gmail.com>
 *
 */

class jxtgenuid extends oxAdminDetails {

    protected $_sThisTemplate = "jxtgenuid.tpl";

    /**
     * Generates 10 new GUIDs
     */
    public function render() 
    {
        parent::render();
        
        $myUtilsObject = oxUtilsObject::getInstance();
        $aUids = array();
        for ($i = 1; $i <= 10; $i++) {
            $aUids[] = $myUtilsObject->generateUid();
        }

        $this->_aViewData["aUids"] = $aUids;

        $oModule = oxNew('oxModule');
        $oModule->load('jxtools');
        $this->_aViewData["sModuleId"] = $oModule->getId();
        $this->_aViewData["sModuleVersion"] = $oModule->getInfo('version');

        return $this->_sThisTemplate;
    }
	
}
