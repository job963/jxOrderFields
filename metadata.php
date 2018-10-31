<?php
/**
 * Metadata version
 */
$sMetadataVersion = '2.0';
 
/**
 * Module information
 * 
 * @link      https://github.com/job963/jxOrderFields
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @copyright (C) Joachim Barthel 2016-2018
 * 
 */
$aModule = array(
    'id'           => 'jxorderfields',
    'title'        => 'jxOrderFields - Add more fields to oxOrderArticles',
    'description'  => array(
                        'de' => 'Fügt weitere Felder aus oxArticles zur oxOrderArticles Tabelle hinzu und kopiert deren Werte am Ende des Bestellprozess.',
                        'en' => 'Adds more fields of oxArticles to oxOrderArticles table and copies the values at the end of the ordering process.'
                        ),
    'thumbnail'    => 'jxorderfields.png',
    'version'      => '0.3.0',
    'author'       => 'Joachim Barthel',
    'url'          => 'https://github.com/job963/jxOrderFields',
    'email'        => 'jobarthel@gmail.com',
    'extend'       => array(
                        OxidEsales\Eshop\Application\Model\OrderArticle::class  => \JxMods\JxOrderFields\Application\Models\OrderArticle::class
                        ),
    'files'        => array(/*
                        'jxorderfields_events' => 'jxmods/jxorderfields/application/events/jxorderfields_events.php',
                        */),
    'templates'    => array(
                        ),
    'events'       => array(
                        'onActivate'   => '\JxMods\JxOrderFields\Core\Events::onActivate', 
                        'onDeactivate' => '\JxMods\JxOrderFields\Core\Events::onDeactivate'
                        ),
    'settings' => array(
                        array(
                                'group' => 'JXORDERFIELDS_SETTINGS', 
                                'name'  => 'aJxOrderFieldsSaveFields', 
                                'type'  => 'arr', 
                                'value' => array(), 
                                'position' => 1
                                ),
                        )
);