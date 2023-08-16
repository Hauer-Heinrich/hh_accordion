<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "hh_accordion".
 *
 * Auto generated 16-08-2023 10:41
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF['hh_accordion'] = [
    'title' => 'hh_accordion',
    'description' => '',
    'category' => 'fe',
    'author' => 'Christian Hackl',
    'author_email' => 'chackl@hauer-heinrich.de',
    'author_company' => 'www.hauer-heinrich.de',
    'state' => 'stable',
    'version' => '0.5.1',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-12.4.99',
            'fluid_styled_content' => '',
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
