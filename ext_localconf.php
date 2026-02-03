<?php

declare(strict_types=1);

call_user_func(function ($extKey) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1770126525] = [
        'nodeName' => 'googleMap',
        'priority' => 40,
        'class' => \Chanathale\ChanathaleLocations\Form\Element\GoogleMapFieldElement::class,
    ];
}, 'chanathale_locations');