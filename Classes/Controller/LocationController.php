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

namespace Chanathale\ChanathaleLocations\Controller;

use Chanathale\ChanathaleLocations\Domain\Model\Category;
use Chanathale\ChanathaleLocations\Domain\Model\Filter;
use Chanathale\ChanathaleLocations\Domain\Repository\CategoryRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Class LocationController
 */
class LocationController extends ActionController
{
    const DUMMMY_DATA = [
        [
            "name" => "Cologne Cathedral",
            "lat" => 50.941278,
            "lng" => 6.958281
        ],
        [
            "name" => "Hohenzollern Bridge",
            "lat" => 50.942222,
            "lng" => 6.967222
        ],
        [
            "name" => "Rheinpark Cologne",
            "lat" => 50.949722,
            "lng" => 6.979444
        ],
        [
            "name" => "KoelnTriangle",
            "lat" => 50.941389,
            "lng" => 6.971944
        ],
        [
            "name" => "Chocolate Museum Cologne",
            "lat" => 50.930556,
            "lng" => 6.962222
        ],
        [
            "name" => "Lanxess Arena",
            "lat" => 50.938056,
            "lng" => 6.982222
        ],
        [
            "name" => "Flora Botanical Garden",
            "lat" => 50.963333,
            "lng" => 6.971111
        ],
        [
            "name" => "MediaPark Cologne",
            "lat" => 50.948611,
            "lng" => 6.944444
        ],
        [
            "name" => "Aachener Weiher",
            "lat" => 50.933333,
            "lng" => 6.929444
        ],
        [
            "name" => "Rheinauhafen",
            "lat" => 50.923611,
            "lng" => 6.965833
        ]
    ];

    public function __construct(private CategoryRepository $categoryRepository) {
    }

    /**
     * searchAction
     * @return ResponseInterface
     */
    public function searchAction () : ResponseInterface {
        /** @var ContentObjectRenderer $contentObject */
        $contentObject = $this->request->getAttribute('currentContentObject');
        $data = $contentObject->data;

        $categoryUid = $data['chanathale_search_category'] ?? 0;
        $category = $this->categoryRepository->findByUid($categoryUid);
        if ($category instanceof Category) {
            $data['chanathale_search_category'] = $category;
        }

        $filter = new Filter();

        $siteFinder = GeneralUtility::makeInstance(SiteFinder::class);
        $site = $siteFinder->getSiteByPageId($data['pid']);
        $apiKey = $site->getConfiguration()['settings']['chanathalelocations']['googleApiKey'] ?? '';

        $this->view->assign('data', $data);
        $this->view->assign('resultSet', base64_encode(json_encode(self::DUMMMY_DATA)));
        $this->view->assign('filter', $filter);
        $this->view->assign('apiKey', $apiKey);

        return $this->htmlResponse();
    }
}