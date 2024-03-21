<?php
defined('TYPO3') || die('Access denied.');

// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Backend\Form\FormDataProvider\DatabaseRowDefaultValues;
use \TYPO3\CMS\Backend\Form\FormDataProvider\TcaSelectItems;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Information\Typo3Version;
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

    $classTypo3Version = GeneralUtility::makeInstance(Typo3Version::class)->getMajorVersion();
    if($classTypo3Version < 12) {
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['record_is_used']['HhAccordion'] =
            \HauerHeinrich\HhAccordion\Hooks\PageLayoutViewHook::class . '->contentIsUsed';
    }

    // Custom UpgradeWizard
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['hhAccordion_contentElementsUpgradeWizard']
        = \HauerHeinrich\HhAccordion\Upgrades\ContentElementsUpgradeWizard::class;
});
