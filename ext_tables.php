<?php
defined('TYPO3') || die('Access denied.');

use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Information\Typo3Version;

call_user_func(function() {
    $classTypo3Version = GeneralUtility::makeInstance(Typo3Version::class)->getMajorVersion();
    if($classTypo3Version < 12) {
        ExtensionManagementUtility::allowTableOnStandardPages(
            'tx_hhaccordion_content'
        );
    }
});
