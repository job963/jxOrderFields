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
    'title'        => 'jxOrderFields - Add more fields to OrderArticles',
    'description'  => array(
                        'de' => 'Fügt weitere Felder und deren Werte zur OrderArticles Tabelle.',
                        'en' => 'Add more fields to OrderArticles table.'
                        ),
    'thumbnail'    => 'jxorderfields.png',
    'version'      => '0.2.0',
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