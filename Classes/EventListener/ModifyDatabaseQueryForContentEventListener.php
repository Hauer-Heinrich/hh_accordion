<?php
declare(strict_types=1);

/*
 * This file is part of the "hh_slider" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace HauerHeinrich\HhAccordion\EventListener;

// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Core\Database\Connection;
use \TYPO3\CMS\Backend\View\Event\ModifyDatabaseQueryForContentEvent;

/**
 * Event for PageLayoutView to hide tt_content elements in page view
 */
final class ModifyDatabaseQueryForContentEventListener {

    public function modify(ModifyDatabaseQueryForContentEvent $event): void {
        if ($event->getTable() === 'tt_content' && $event->getPageId() > 0) {
            // Only hide elements which are inline, allowing for standard
            // elements to show
            $event->getQueryBuilder()->andWhere(
                $event->getQueryBuilder()->expr()->lte('tx_hhaccordion_content_elements_parent', $event->getQueryBuilder()->createNamedParameter(0, Connection::PARAM_INT))
            );
        }
    }
}
