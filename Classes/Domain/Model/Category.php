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
 * Class Category
 */
class Category extends AbstractEntity
{
    /**
     * @var string $title
     */
    protected string $title = '';

    /**
     * @var string $description
     */
    protected string $description = '';

    /**
     * @var ObjectStorage<Radius> $radius
     */
    protected ObjectStorage $radius;

    /**
     * @var ObjectStorage<Subcategory> $subcategories
     */
    protected ObjectStorage $subcategories;

    public function __construct() {
        $this->radius = new ObjectStorage();
        $this->subcategories = new ObjectStorage();
    }

    public function getSubcategories(): ObjectStorage {
        return $this->subcategories;
    }

    public function setSubcategories(ObjectStorage $subcategories): void {
        $this->subcategories = $subcategories;
    }

    public function getRadius(): ObjectStorage {
        return $this->radius;
    }

    public function setRadius(ObjectStorage $radius): void {
        $this->radius = $radius;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }
}