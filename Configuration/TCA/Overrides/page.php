<?php
defined('TYPO3') || die('Access denied.');

call_user_func(function() {

    $extensionKey = "hh_accordion";

    // make PageTsConfig selectable
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        $extensionKey,
        "Configuration/PageTsConfig/All.typoscript",
        "EXT:{$extensionKey} :: Hauer-Heinrich - Accordion Page TS"
    );
});
