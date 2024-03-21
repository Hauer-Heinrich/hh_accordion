<?php

declare(strict_types=1);

namespace HauerHeinrich\HhAccordion\Upgrades;

use \Symfony\Component\Console\Output\OutputInterface;
// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Install\Attribute\UpgradeWizard;
use \TYPO3\CMS\Install\Updates\UpgradeWizardInterface;
use \TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use \TYPO3\CMS\Install\Updates\ChattyInterface;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Database\ConnectionPool;

#[UpgradeWizard('hhAccordion_contentElementsUpgradeWizard')]
final class ContentElementsUpgradeWizard implements UpgradeWizardInterface, ChattyInterface {

    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * Setter injection for output into upgrade wizards
     */
    public function setOutput(OutputInterface $output): void {
        $this->output = $output;
    }

    /**
     * Return the identifier for this wizard
     * This should be the same string as used in the ext_localconf class registration
     *
     * @return string
     */
    public function getIdentifier(): string {
        return 'hhAccordion_contentElementsUpgradeWizard';
    }

    /**
     * Return the speaking name of this wizard
     */
    public function getTitle(): string {
        return 'EXT:hh_accordion upgrade colPos of content-elements';
    }

    /**
     * Return the description for this wizard
     */
    public function getDescription(): string {
        return 'Change colPos of content-elements from 999 to 987';
    }

    /**
     * Execute the update
     *
     * Called when a wizard reports that an update is necessary
     */
    public function executeUpdate(): bool {
        $affectedRows = $this->getAffectedRows();

        if(empty($affectedRows)) {
            return true;
        }

        $this->output->writeln('Performing ' . count($affectedRows) . ' database operations.');

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_hhsimplejobposts_domain_model_jobpost');

        foreach ($affectedRows as $row) {
            $queryBuilder->update('tt_content');
            $queryBuilder->where(
                $queryBuilder->expr()->eq('uid', $row['uid'])
            );
            $queryBuilder->set('colPos', 987);
            $queryBuilder->executeStatement();
        }

        return true;
    }

    /**
     * Is an update necessary?
     *
     * Is used to determine whether a wizard needs to be run.
     * Check if data for migration exists.
     *
     * @return bool Whether an update is required (TRUE) or not (FALSE)
     */
    public function updateNecessary(): bool {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tt_content');
        $whereExpressions = [];

        $whereExpressions[] = $queryBuilder->expr()->gt('tx_hhaccordion_content_elements_parent', 0);
        $whereExpressions[] = $queryBuilder->expr()->eq('colPos', $queryBuilder->createNamedParameter(999));

        $queryBuilder
            ->select('tx_hhaccordion_content_elements_parent', 'colPos')
            ->from('tt_content');
        $queryBuilder->where(...$whereExpressions);
        $results = $queryBuilder->executeQuery()->fetchAllAssociative();

        if(!empty($results)) {
            return true;
        }

        return false;
    }

    /**
     * Returns an array of class names of prerequisite classes
     *
     * This way a wizard can define dependencies like "database up-to-date" or
     * "reference index updated"
     *
     * @return string[]
     */
    public function getPrerequisites(): array {
        return [];
    }

    protected function getAffectedRows(): array {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tt_content');
        $whereExpressions = [];

        $whereExpressions[] = $queryBuilder->expr()->gt('tx_hhaccordion_content_elements_parent', 0);
        $whereExpressions[] = $queryBuilder->expr()->eq('colPos', $queryBuilder->createNamedParameter(999));

        $queryBuilder
            ->select('uid')
            ->from('tt_content');
        $queryBuilder->where(...$whereExpressions);
        $results = $queryBuilder->executeQuery()->fetchAllAssociative();

        if(!empty($results) && \is_array($results)) {
            return $results;
        }

        return [];
    }
}
