<?php
defined('TYPO3') || die('Access denied.');

$GLOBALS['TCA']['tt_content']['columns']['colPos']['config']['itemsProcFunc'] = \HauerHeinrich\HhAccordion\Tca\ItemProcFunc::class . '->colPos';
$GLOBALS['TCA']['tt_content']['columns']['colPos']['config']['items'][] = [
    'accordion_content_elements',
    987,
];

$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['hhaccordion_hh_accordion'] = 'tx_hhaccordion_hh_accordion';
$tempColumns = [
    'tx_hhaccordion_type' => [
        'label' => 'LLL:EXT:hh_accordion/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhaccordion_type',
        'exclude' => '1',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxLabeledToggle',
            'items' => [
                [
                    0 => '',
                    'labelChecked' => 'Tabs',
                    'labelUnchecked' => 'Accordion',
                    'invertStateDisplay' => false,
                ],
            ],
        ],
    ],
    'tx_hhaccordion_arrows' => [
        'label' => 'LLL:EXT:hh_accordion/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhaccordion_arrows',
        'exclude' => '1',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxLabeledToggle',
            'items' => [
                [
                    0 => '',
                    'labelChecked' => 'Enabled',
                    'labelUnchecked' => 'Disabled',
                    'invertStateDisplay' => false,
                ],
            ],
        ],
    ],
    'tx_hhaccordion_content' => [
        'label' => 'LLL:EXT:hh_accordion/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhaccordion_content',
        'exclude' => '1',
        'config' => [
            'type' => 'inline',
            'appearance' => [
                'enabledControls' => [
                    'dragdrop' => '1',
                ],
                'levelLinksPosition' => 'top',
            ],
            'foreign_field' => 'parentid',
            'foreign_sortby' => 'sorting',
            'foreign_table' => 'tx_hhaccordion_content',
            'foreign_table_field' => 'parenttable',
        ],
    ],
];
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns);

$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = [
    'LLL:EXT:hh_accordion/Resources/Private/Language/locallang_db.xlf:tt_content.CType.div._hhaccordion_',
    '--div--',
];

$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = [
    'LLL:EXT:hh_accordion/Resources/Private/Language/locallang_db.xlf:tt_content.CType.hhaccordion_hh_accordion',
    'hhaccordion_hh_accordion',
    'tx_hhaccordion_hh_accordion',
];

$tempPalettes = [
    'header_pal' => [
        'showitem' => 'header_layout, header_position', 'canNotCollapse' => 1
    ],
];
$GLOBALS['TCA']['tt_content']['palettes'] += $tempPalettes;

$tempTypes = [
    'hhaccordion_hh_accordion' => [
        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;
                general,
                header,
                subheader,
                --palette--;;header_pal,
                tx_hhaccordion_type,
                tx_hhaccordion_content,
                --div--;Options,
                    tx_hhaccordion_arrows,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;
                    frames,
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                --div--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_category.tabs.category,
                    categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                    rowDescription,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended',
    ],
];
$GLOBALS['TCA']['tt_content']['types'] += $tempTypes;

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'hh_accordion',
    'Configuration/TypoScript/',
    'hh_accordion'
);
