<?php
namespace HauerHeinrich\HhAccordion\Form\FormDataProvider;

// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Backend\Form\FormDataProviderInterface;

class TcaColPosItem implements FormDataProviderInterface {

    /**
     * @var array
     */
    protected $supportedInlineParentFields = array (
        0 => 'tx_hhaccordion_content_elements_parent',
    );

    /**
     * @param array $result
     * @return array
     */
    public function addData(array $result) {
        if (
            (array_key_exists('tableName', $result) && 'tt_content' !== $result['tableName'])
            || (isset($result['databaseRow']['colPos']) && 987 !== $result['databaseRow']['colPos'])
            || (
                (
                    (
                        array_key_exists('inlineParentUid', $result) && empty($result['inlineParentUid'])
                    )
                    || !in_array($result['inlineParentConfig']['foreign_field'], $this->supportedInlineParentFields, true)
                )
                && empty(array_filter(array_intersect_key($result['databaseRow'], array_flip($this->supportedInlineParentFields))))
            )
        ) {

            return $result;
        }

        if (isset($result['processedTca']['columns']['colPos']['config']['items'])) {
            if (!is_array($result['processedTca']['columns']['colPos']['config']['items'])) {
                $result['processedTca']['columns']['colPos']['config']['items'] = [];
            }

            if(isset($result['databaseRow']['colPos'])) {
                array_unshift(
                    $result['processedTca']['columns']['colPos']['config']['items'],
                    [
                        'LLL:EXT:hh_accordion/Resources/Private/Language/locallang_db.xlf:tt_content.colPos.nestedContentColPos',
                        $result['databaseRow']['colPos'],
                    ]
                );
            }
            unset($result['processedTca']['columns']['colPos']['config']['itemsProcFunc']);
        }

        return $result;
    }
}
