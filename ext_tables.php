<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_hhaccordion_accordion, tx_hhaccordion_child_content, tx_hhaccordion_content');
});