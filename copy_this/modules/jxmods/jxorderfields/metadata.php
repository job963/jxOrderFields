<?php
/**
 * Metadata version
 */
$sMetadataVersion = '1.1';
 
/**
 * Module information
 */
$aModule = array(
    'id'           => 'jxorderfields',
    'title'        => 'jxOrderFields - Add more fields to oxOrderArticles',
    'description'  => array(
                        'de' => 'Fügt weitere Felder aus oxArticles zur oxOrderArticles Tabelle hinzu und kopiert deren Werte am Ende des Bestellprozess.',
                        'en' => 'Adds more fields of oxArticles to oxOrderArticles table and copies the values at the end of the ordering process.'
                        ),
    'thumbnail'    => 'jxorderfields.png',
    'version'      => '0.2.1',
    'author'       => 'Joachim Barthel',
    'url'          => 'https://github.com/job963/jxOrderFields',
    'email'        => 'jobarthel@gmail.com',
    'extend'       => array(
                        'oxorderarticle'  => 'jxmods/jxorderfields/application/models/jxorderfields_oxorderarticles'
                        ),
    'files'        => array(
                        'jxorderfields_events' => 'jxmods/jxorderfields/application/events/jxorderfields_events.php',
                        ),
    'templates'    => array(
                        ),
    'events'       => array(
                        'onActivate'   => 'jxorderfields_events::onActivate', 
                        'onDeactivate' => 'jxorderfields_events::onDeactivate'
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