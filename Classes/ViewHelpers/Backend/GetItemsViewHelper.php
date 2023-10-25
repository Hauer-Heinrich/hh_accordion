<?php

namespace HauerHeinrich\HhAccordion\ViewHelpers\Backend;

// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use \TYPO3\CMS\Core\Utility\GeneralUtility;

class GetItemsViewHelper extends AbstractViewHelper {

    public function initializeArguments() {
        $this->registerArgument('element', 'array', '', true);
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     *
     * @return void
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext) {
        $element = $arguments['element'];
        if(!empty($element)) {
            if(isset($element['uid']) && isset($element['tx_hhaccordion_content'])) {
                // parentid = intval($element['uid'])
                // parenttable = tt_content

                $connectionPool = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class);
                $queryBuilder = $connectionPool->getQueryBuilderForTable('tx_hhaccordion_content');
                $result = $queryBuilder
                    ->select('*')
                    ->from('tx_hhaccordion_content')
                    ->where(
                        $queryBuilder->expr()->eq('parentid', $queryBuilder->createNamedParameter(intval($element['uid'])))
                    )
                    ->executeQuery();

                if(!empty($result)) {
                    $accContentItems = $result->fetchAll();

                    $templateVariableContainer = $renderingContext->getVariableProvider();
                    $templateVariableContainer->add('accordionItems', $accContentItems);
                    return;
                }
            }
        }

        return '';
    }
}
