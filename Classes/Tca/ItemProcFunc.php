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

use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Backend\View\BackendLayoutView;

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

        if($row['tx_hhaccordion_content'] > 0 && $row['CType'][0] !== 'hhaccordion_hh_accordion') {
            DebuggerUtility::var_dump($row);
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
}
