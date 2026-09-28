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
});
