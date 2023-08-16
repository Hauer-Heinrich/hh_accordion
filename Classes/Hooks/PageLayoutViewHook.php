<?php
namespace HauerHeinrich\HhAccordion\Hooks;

// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Backend\View\PageLayoutView;

class PageLayoutViewHook {
    public function contentIsUsed(array $params, PageLayoutView $parentObject): bool {
        if (isset($params['used']) && $params['used']) {
           return true;
        }

        $record = $params['record'];

        return $record['colPos'] === 987 && !empty($record['tx_hhaccordion_content_elements_parent']);
    }
}
