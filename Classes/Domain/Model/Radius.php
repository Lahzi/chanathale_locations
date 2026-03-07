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

namespace Chanathale\ChanathaleLocations\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class Radius
 */
class Radius extends AbstractEntity
{
    /**
     * @var string $title
     */
    protected string $title = '';

    /**
     * @var float $radius
     */
    protected float $radius = 0.0;

    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getRadius(): float {
        return $this->radius;
    }

    public function setRadius(float $radius): void {
        $this->radius = $radius;
    }
}