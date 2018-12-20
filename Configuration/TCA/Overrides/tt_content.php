<?php
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['hhaccordion_hh_accordion'] = 'tx_hhaccordion_hh_accordion';
$tempColumns = [
    'tx_hhaccordion_arrows' => [
        'config' => [
            'renderType' => 'checkboxLabeledToggle',
            'type' => 'check',
        ],
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_accordion/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhaccordion_arrows',
    ],
    'tx_hhaccordion_content' => [
        'config' => [
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
            'type' => 'inline',
        ],
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_accordion/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhaccordion_content',
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
                tx_hhaccordion_content,
                --div--;Options,
                    layout,
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
