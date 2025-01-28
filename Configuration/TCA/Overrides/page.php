<?php
defined('TYPO3') || die('Access denied.');

call_user_func(function(string $extensionKey) {

    // make PageTsConfig selectable
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        $extensionKey,
        "Configuration/TsConfig/AllPage.tsconfig",
        "EXT:{$extensionKey} :: Hauer-Heinrich - Accordion Page TS"
    );
}, 'hh_accordion');
