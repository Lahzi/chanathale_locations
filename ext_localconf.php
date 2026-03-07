<?php

declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

call_user_func(function ($extKey) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1770126525] = [
        'nodeName' => 'googleMap',
        'priority' => 40,
        'class' => \Chanathale\ChanathaleLocations\Form\Element\GoogleMapFieldElement::class,
    ];

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1770126526] = [
        'nodeName' => 'coordinate',
        'priority' => 40,
        'class' => \Chanathale\ChanathaleLocations\Form\Element\CoordinateFieldElement::class,
    ];

    ExtensionUtility::registerControllerActions(
        'ChanathaleLocations',
        'pinsearch',
        [
            \Chanathale\ChanathaleLocations\Controller\LocationController::class => ['search']
        ],
        [
            \Chanathale\ChanathaleLocations\Controller\LocationController::class => ['search']
        ]
    );
}, 'chanathale_locations');