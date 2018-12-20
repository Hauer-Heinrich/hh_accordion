<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:hh_accordion/Resources/Private/Language/locallang_db.xlf:tx_hhaccordion_content',
        'label' => 'tx_hhaccordion_content_header',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'tx_hhaccordion_content_header,tx_hhaccordion_content_whichtype,tx_hhaccordion_content_default_text,tx_hhaccordion_content_default_assets,tx_hhaccordion_content_elements',
        'dynamicConfigFile' => '',
        'iconfile' => 'EXT:hh_accordion/Resources/Public/Icons/Extension.png',
        'hideTable' => true,
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, tx_hhaccordion_content_header, tx_hhaccordion_content_whichtype, tx_hhaccordion_content_default_text, tx_hhaccordion_content_default_assets, tx_hhaccordion_content_elements',
    ],
    'types' => [
        1 => [
            'showitem' => '
                tx_hhaccordion_content_header,
                tx_hhaccordion_content_whichtype,
                tx_hhaccordion_content_default_text,
                tx_hhaccordion_content_default_assets,
                tx_hhaccordion_content_elements,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
                hidden,
                starttime,
                endtime,
                --div--;Language,
                sys_language_uid,
                l10n_parent,
                l10n_diffsource,
            ',
        ],
    ],
    'palettes' => [
        1 => [
            'showitem' => '',
        ],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    0 => [
                        0 => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        1 => -1,
                        2 => 'flags-multiple',
                    ],
                ],
                'special' => 'languages',
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    0 => [
                        0 => '',
                        1 => 0,
                    ],
                ],
                'foreign_table' => 'tx_hhaccordion_content',
                'foreign_table_where' => 'AND tx_hhaccordion_content.pid=###CURRENT_PID### AND tx_hhaccordion_content.sys_language_uid IN (-1,0)',
                'default' => 0,
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
            ],
        ],
        'starttime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
                'renderType' => 'inputDateTime',
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime,int',
                'checkbox' => 0,
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
                'renderType' => 'inputDateTime',
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime,int',
                'checkbox' => 0,
                'default' => 0,
            ],
        ],
        'parentid' => [
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    0 => [
                        0 => '',
                        1 => 0,
                    ],
                ],
                'foreign_table' => 'tt_content',
                'foreign_table_where' => 'AND tt_content.pid=###CURRENT_PID### AND tt_content.sys_language_uid IN (-1,###REC_FIELD_sys_language_uid###)',
            ],
        ],
        'parenttable' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'sorting' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'tx_hhaccordion_content_default_assets' => [
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'sys_file_reference',
                'foreign_field' => 'uid_foreign',
                'foreign_sortby' => 'sorting_foreign',
                'foreign_table_field' => 'tablenames',
                'foreign_match_fields' => [
                    'fieldname' => 'tx_hhaccordion_content_default_assets',
                ],
                'foreign_label' => 'uid_local',
                'foreign_selector' => 'uid_local',
                'overrideChildTca' => [
                    'columns' => [
                        'uid_local' => [
                            'config' => [
                                'appearance' => [
                                'elementBrowserType' => 'file',
                                'elementBrowserAllowed' => 'png,jpg,jpeg,svg,gif',
                                ],
                            ],
                        ],
                    ],
                    'types' => [
                        0 => [
                            'showitem' => '--palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
                        ],
                        1 => [
                            'showitem' => '--palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
                        ],
                        2 => [
                            'showitem' => '--palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
                        ],
                        3 => [
                            'showitem' => '--palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
                        ],
                        4 => [
                            'showitem' => '--palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
                        ],
                        5 => [
                            'showitem' => '--palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
                        ],
                    ],
                ],
                'filter' => [
                    0 => [
                        'userFunc' => 'TYPO3\\CMS\\Core\\Resource\\Filter\\FileExtensionFilter->filterInlineChildren',
                        'parameters' => [
                            'allowedFileExtensions' => 'png,jpg,jpeg,svg,gif',
                        ],
                    ],
                ],
                'appearance' => [
                    'useSortable' => '1',
                    'headerThumbnail' => [
                        'field' => 'uid_local',
                        'width' => '45',
                        'height' => '45c',
                    ],
                    'enabledControls' => [
                        'info' => 'tx_hhaccordion_content_default_assets',
                        'new' => false,
                        'dragdrop' => 'tx_hhaccordion_content_default_assets',
                        'sort' => false,
                        'hide' => 'tx_hhaccordion_content_default_assets',
                        'delete' => 'tx_hhaccordion_content_default_assets',
                    ],
                    'collapseAll' => '1',
                    'expandSingle' => '1',
                    'showAllLocalizationLink' => '1',
                    'showPossibleLocalizationRecords' => '1',
                    'showSynchronizationLink' => '1',
                    'fileUploadAllowed' => false,
                ],
            ],
            'exclude' => '1',
            'label' => 'LLL:EXT:hh_accordion/Resources/Private/Language/locallang_db.xlf:tx_hhaccordion_content.tx_hhaccordion_content_default_assets',
            'order' => 8,
        ],
        'tx_hhaccordion_content_default_text' => [
            'config' => [
                'enableRichtext' => '1',
                'richtextConfiguration' => 'default',
                'type' => 'text',
            ],
            'exclude' => '1',
            'label' => 'LLL:EXT:hh_accordion/Resources/Private/Language/locallang_db.xlf:tx_hhaccordion_content.tx_hhaccordion_content_default_text',
            'order' => 7,
        ],
        'tx_hhaccordion_content_elements' => [
            'config' => [
                'appearance' => [
                'collapseAll' => '1',
                'enabledControls' => [
                    'dragdrop' => '1',
                ],
                'levelLinksPosition' => 'top',
                'showAllLocalizationLink' => '1',
                'showPossibleLocalizationRecords' => '1',
                'showSynchronizationLink' => '1',
                'useSortable' => '1',
                ],
                'foreign_sortby' => 'sorting',
                'foreign_table' => 'tt_content',
                'overrideChildTca' => [
                    'columns' => [
                        'colPos' => [
                            'config' => [
                                'default' => '999',
                            ],
                        ],
                    ],
                ],
                'type' => 'inline',
                'foreign_field' => 'tx_hhaccordion_content_elements_parent',
            ],
            'exclude' => '1',
            'label' => 'LLL:EXT:hh_accordion/Resources/Private/Language/locallang_db.xlf:tx_hhaccordion_content.tx_hhaccordion_content_elements',
            'order' => 9,
        ],
        'tx_hhaccordion_content_header' => [
            'config' => [
                'type' => 'input',
            ],
            'exclude' => '1',
            'label' => 'LLL:EXT:hh_accordion/Resources/Private/Language/locallang_db.xlf:tx_hhaccordion_content.tx_hhaccordion_content_header',
            'order' => 5,
        ],
        'tx_hhaccordion_content_whichtype' => [
            'config' => [
                'items' => [
                    0 => [
                        0 => 'LLL:EXT:hh_accordion/Resources/Private/Language/locallang_db.xlf:tx_hhaccordion_content.tx_hhaccordion_content_whichtype.I.0',
                        1 => '1',
                    ],
                    1 => [
                        0 => 'LLL:EXT:hh_accordion/Resources/Private/Language/locallang_db.xlf:tx_hhaccordion_content.tx_hhaccordion_content_whichtype.I.1',
                        1 => '2',
                    ],
                ],
                'maxitems' => '1',
                'renderType' => 'selectSingle',
                'type' => 'select',
            ],
            'exclude' => '1',
            'label' => 'LLL:EXT:hh_accordion/Resources/Private/Language/locallang_db.xlf:tx_hhaccordion_content.tx_hhaccordion_content_whichtype',
            'order' => 6,
        ],
    ],
];