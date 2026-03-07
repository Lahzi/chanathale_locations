<?php
declare(strict_types=1);

return [
    \Chanathale\ChanathaleLocations\Domain\Model\Radius::class => [
        'tableName' => 'tx_chanathale_radius',
        'recordType' => \Chanathale\ChanathaleLocations\Domain\Model\Radius::class,
        'properties' => [
            'title' => [
                'fieldName' => 'title',
            ],
            'radius' => [
                'fieldName' => 'radius',
            ]
        ],
    ],
    \Chanathale\ChanathaleLocations\Domain\Model\Subcategory::class => [
        'tableName' => 'tx_chanathale_subcategory',
        'recordType' => \Chanathale\ChanathaleLocations\Domain\Model\Subcategory::class,
        'properties' => [
            'title' => [
                'fieldName' => 'title',
            ],
        ]
    ],
    \Chanathale\ChanathaleLocations\Domain\Model\Category::class => [
        'tableName' => 'tx_chanathale_category',
        'recordType' => \Chanathale\ChanathaleLocations\Domain\Model\Category::class,
        'properties' => [
            'title' => [
                'fieldName' => 'title',
            ],
            'description' => [
                'fieldName' => 'description',
            ],
            'subcategories' => [
                'fieldName' => 'subcategories',
                'relationType' => 'hasMany',
                'foreignClassName' => \Chanathale\ChanathaleLocations\Domain\Model\Subcategory::class,
                'foreignFieldName' => 'category',
            ],
            'radius' => [
                'fieldName' => 'radius',
                'relationType' => 'hasMany',
                'foreignClassName' => \Chanathale\ChanathaleLocations\Domain\Model\Radius::class,
                'foreignFieldName' => 'category',
            ]
        ],
    ]
];