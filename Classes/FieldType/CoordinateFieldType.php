<?php
declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension.
 *
 * (c) 2025 Aphisit Chanathale <info@chanathale.dev>, chanathale GmbH
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace Chanathale\ChanathaleLocations\FieldType;

use TYPO3\CMS\ContentBlocks\FieldType\AbstractFieldType;
use TYPO3\CMS\ContentBlocks\FieldType\FieldType;
use TYPO3\CMS\ContentBlocks\FieldType\FieldTypeInterface;
use TYPO3\CMS\ContentBlocks\FieldType\WithCommonProperties;

/**
 * Class CoordinateFieldType
 */
#[FieldType(name: 'Coordinate', tcaType: 'input')]
final class CoordinateFieldType extends AbstractFieldType
{
    use WithCommonProperties;

    /**
     * createFromArray
     * @param array $settings
     * @return FieldTypeInterface
     */
    public function createFromArray(array $settings): FieldTypeInterface
    {
        $self = clone $this;
        $self->setCommonProperties($settings);
        return $self;
    }

    /**
     * getSql
     * @param string $column
     * @return string
     */
    public function getSql(string $column): string
    {
        return "`$column` DECIMAL (20,16) DEFAULT '0.0000000000000000' NOT NULL";
    }

    /**
     * getTca
     * @return array
     */
    public function getTca(): array
    {
        return array_replace_recursive(
            $this->toTca(),
            [
                'config' => [
                    'type' => 'input',
                    'renderType' => 'coordinate',
                    'eval' => 'required',
                ],
            ]
        );
    }
}