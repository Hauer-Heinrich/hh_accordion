<?php
defined('TYPO3') || die('Access denied.');

// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Backend\Form\FormDataProvider\DatabaseRowDefaultValues;
use \TYPO3\CMS\Backend\Form\FormDataProvider\TcaSelectItems;
use \HauerHeinrich\HhAccordion\Form\FormDataProvider\TcaColPosItem;

call_user_func(function() {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['formDataGroup']['tcaDatabaseRecord'][TcaColPosItem::class] = [
        'depends' => [
            DatabaseRowDefaultValues::class,
        ],
        'before' => [
            TcaSelectItems::class,
        ],
    ];

    // Custom UpgradeWizard
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['hhAccordion_contentElementsUpgradeWizard']
        = \HauerHeinrich\HhAccordion\Upgrades\ContentElementsUpgradeWizard::class;
});
