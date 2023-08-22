<?php

/*
 * This file is part of the package ucph_ce_dropdown.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

$EM_CONF[$_EXTKEY] = [
    'title' => 'UCPH TYPO3 content element "Dropdowns"',
    'description' => 'UCPH TYPO3 content element "Dropdown"',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.99-12.1.0'
        ]
    ],
    'autoload' => [
        'psr-4' => [
            'UniversityOfCopenhagen\\UcphCeDropDown\\' => 'Classes'
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Nanna Ellegaard',
    'author_email' => 'nel@adm.ku.dk',
    'author_company' => 'private',
    'version' => '1.0.0',
];
