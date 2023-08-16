<?php

/*
 * This file is part of the package ucph_ce_dropdown.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3') or die('Access denied.');

call_user_func(function ($extKey ='ucph_ce_dropdown', $contentType ='ucph_ce_dropdown') {
    // Add Content Element
    if (!is_array($GLOBALS['TCA']['tt_content']['types'][$contentType] ?? false)) {
        $GLOBALS['TCA']['tt_content']['types'][$contentType] = [];
    }

    // Add content element PageTSConfig
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        $contentType,
        'Configuration/TsConfig/Page/tx_KuDropdown.tsconfig',
        'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_be.xlf:title'
    );

    // Add content element to selector list
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_be.xlf:title',
            $contentType,
            'ucph-ce-dropdown-icon',
            $extKey
        ]
    );

    // Assign Icon
    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes'][$contentType] = 'ucph-ce-dropdown-icon';

    // New palette
    $GLOBALS['TCA']['tt_content']['palettes']['dropdown_content'] = array(
        'showitem' => 'header,--linebreak--,tx_ucph_ce_dropdown_item','canNotCollapse' => 1
    );

    // Configure element type
    $GLOBALS['TCA']['tt_content']['types'][$contentType] = array_replace_recursive(
        $GLOBALS['TCA']['tt_content']['types'][$contentType],
        [
            'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_be.xlf:title;dropdown_content,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                categories,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                rowDescription,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
            ',
            'columnsOverrides' => [
                'header' => [
                    'config' => [
                        'size' => 25,
                        'max' => 50,
                        'eval' => 'trim,required',
                    ]
                ],
            ]
        ]
    );

    // Add Inline records
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', [
        'tx_ucph_ce_dropdown_item' => [
            'exclude' => true,
            'label' => 'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_be.xlf:add_links',
            'config' => [
                'type' => 'inline',
                'minitems' => 1,
                'foreign_table' => 'tx_ucph_ce_dropdown_item',
                'foreign_field' => 'tt_content',
                'appearance' => [
                    'newRecordLinkTitle' => 'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_be.xlf:add_link',
                    'useSortable' => true,
                    'showSynchronizationLink' => true,
                    'showAllLocalizationLink' => true,
                    'showPossibleLocalizationRecords' => true,
                    'expandSingle' => true,
                    'enabledControls' => [
                        'localize' => true,
                    ]
                ],
                'behaviour' => [
                    'mode' => 'select',
                ]
            ],
        ],
    ]);
});
