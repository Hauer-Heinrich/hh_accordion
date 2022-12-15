<?php

/***************************************************************
 * Extension Manager/Repository config file for ext 'hh_accordion'.
 *
 * Auto generated 13-12-2018 15:33
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. 'version' and 'dependencies' must not be touched!
 ***************************************************************/

$EM_CONF['hh_accordion'] = [
    'title' => 'hh_accordion',
    'description' => '',
    'category' => 'fe',
    'author' => 'Christian Hackl',
    'author_email' => 'chackl@hauer-heinrich.de',
    'author_company' => 'www.hauer-heinrich.de',
    'state' => 'stable',
    'version' => '0.3.3',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'HauerHeinrich\\HhAccordion\\' => 'Classes'
        ],
    ],
];
