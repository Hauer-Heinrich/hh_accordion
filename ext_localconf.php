<?php
defined('TYPO3_MODE') || die();

call_user_func(function() {
    // Register content element icons
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'tx_hhaccordion_hh_accordion',
        \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
        [
            'source' => 'EXT:hh_accordion/Resources/Public/Icons/Content/hh_accordion.png',
        ]
    );

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['formDataGroup']['tcaDatabaseRecord'][\HauerHeinrich\HhAccordion\Form\FormDataProvider\TcaColPosItem::class] = [
        'depends' => [
            \TYPO3\CMS\Backend\Form\FormDataProvider\DatabaseRowDefaultValues::class,
        ],
        'before' => [
            \TYPO3\CMS\Backend\Form\FormDataProvider\TcaSelectItems::class,
        ],
    ];

    // Add backend preview hook
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['hh_accordion'] = 
        HauerHeinrich\HhAccordion\Hooks\PageLayoutViewDrawItem::class;
});