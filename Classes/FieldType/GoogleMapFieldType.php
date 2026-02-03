<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension by adesso SE.
 *
 * (c) 2026 Aphisit Chanathale <aphisit.chanathale@adesso.de>, adesso SE
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

#[FieldType(name: 'GoogleMap', tcaType: 'input')]
final class GoogleMapFieldType extends AbstractFieldType
{
    use WithCommonProperties;

    public function createFromArray(array $settings): FieldTypeInterface
    {
        $self = clone $this;
        $self->setCommonProperties($settings);
        return $self;
    }

    public function getTca(): array
    {
        return array_replace_recursive(
            $this->toTca(),
            [
                'config' => [
                    'type' => 'input',
                    'renderType' => 'googleMap',
                    'eval' => 'trim',
                ],
            ]
        );
    }
}