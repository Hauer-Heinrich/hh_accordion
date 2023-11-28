<?php

declare(strict_types=1);

namespace HauerHeinrich\HhAccordion\Tca;

/*
 * This file is part of TYPO3 CMS-based extension "container" by b13.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 */

// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Backend\View\BackendLayoutView;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Extbase\Configuration\ConfigurationManager;

class ItemProcFunc {

    /**
     * @var BackendLayoutView
     */
    protected $backendLayoutView;

    public function __construct(BackendLayoutView $backendLayoutView) {
        $this->backendLayoutView = $backendLayoutView;
    }

    /**
     * Gets colPos items to be shown in the forms engine.
     * This method is called as "itemsProcFunc" with the accordant context
     * for tt_content.colPos.
     */
    public function colPos(array &$parameters): void {
        $row = $parameters['row'];

        if(isset($row['tx_hhaccordion_content_elements_parent']) && $row['tx_hhaccordion_content_elements_parent'] > 0) {
            try {
                $items = [];
                $items[] = [
                    'accordion_content_elements',
                    987,
                ];
                $parameters['items'] = $items;

                return;

                // if (is_array($grid)) {
                //     $items = [];
                //     foreach ($grid as $rows) {
                //         foreach ($rows as $column) {
                //             // only one item is show, so it is not changeable
                //             if ((int)$column['colPos'] === (int)$row['colPos']) {
                //                 $items[] = [
                //                     $column['name'],
                //                     $column['colPos'],
                //                 ];
                //             }
                //         }
                //     }
                //     $parameters['items'] = $items;
                //     return;
                // }

            } catch (Exception $e) {
            }
        }

        $this->backendLayoutView->colPosListItemProcFunc($parameters);
    }

    /**
     * filterCtypes
     * allow only CTypes which are set via TypoScript settings 'allowedCtypes'
     *
     * @param  array $parameters
     * @return void
     */
    public function filterCtypes(array &$parameters): void {
        if(!empty($parameters) && isset($parameters['items'])) {
            $configurationManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface');
            $settings = $configurationManager->getConfiguration(
                \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT,
                'hh_accordion'
            );

            if(
                !empty($settings)
                && is_array($settings)
                && isset($settings['tt_content.']['hhaccordion_hh_accordion.']['settings.'])
            ) {
                $typoScript = $settings['tt_content.']['hhaccordion_hh_accordion.']['settings.'];

                if(isset($typoScript['allowedCtypes'])) {
                    if($typoScript['allowedCtypes'] === 'all') {
                        return;
                    }

                    if(is_string($typoScript['allowedCtypes'])) {
                        $allowedCtypesArray = explode(',', $typoScript['allowedCtypes']);

                        foreach ($parameters['items'] as $key => $value) {
                            $cType = $value[1];
                            if(empty($cType) || in_array($cType, $allowedCtypesArray)) {
                                continue;
                            }
                            unset($parameters['items'][$key]);
                        }
                    }
                }
            }
        }
    }
}
