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
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Filter
 */
class Filter extends AbstractEntity
{
    /**
     * @var string $input
     */
    protected string $input = '';

    /**
     * @var Radius $radius
     */
    protected Radius $radius;

    /**
     * @var float $latitude
     */
    protected float $latitude = 0.0;

    /**
     * @var float $longitude
     */
    protected float $longitude = 0.0;

    /**
     * @var ObjectStorage<Subcategory> $subcategories
     */
    protected ObjectStorage $subcategories;

    /**
     * @var string $sortBy
     */
    protected string $sortBy = 'radius';

    /**
     * @var string $sortDirection
     */
    protected string $sortDirection = 'asc';

    /**
     * @var int $contentElementUid
     */
    protected int $contentElementUid = 0;

    public function __construct() {
        $this->subcategories = new ObjectStorage();
    }

    public function getInput(): string {
        return $this->input;
    }

    public function setInput(string $input): void {
        $this->input = $input;
    }

    public function getRadius(): Radius {
        return $this->radius;
    }

    public function setRadius(Radius $radius): void {
        $this->radius = $radius;
    }

    public function getLatitude(): float {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): void {
        $this->latitude = $latitude;
    }

    public function getLongitude(): float {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): void {
        $this->longitude = $longitude;
    }

    public function getSubcategories(): ObjectStorage {
        return $this->subcategories;
    }

    public function setSubcategories(ObjectStorage $subcategories): void {
        $this->subcategories = $subcategories;
    }

    public function getSortBy(): string {
        return $this->sortBy;
    }

    public function setSortBy(string $sortBy): void {
        $this->sortBy = $sortBy;
    }

    public function getSortDirection(): string {
        return $this->sortDirection;
    }

    public function setSortDirection(string $sortDirection): void {
        $this->sortDirection = $sortDirection;
    }

    public function getContentElementUid(): int {
        return $this->contentElementUid;
    }

    public function setContentElementUid(int $contentElementUid): void {
        $this->contentElementUid = $contentElementUid;
    }
}