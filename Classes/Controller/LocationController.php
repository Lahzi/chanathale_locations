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

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Class LocationController
 */
class LocationController extends ActionController
{
    public function __construct() {
    }

    /**
     * searchAction
     * @return ResponseInterface
     */
    public function searchAction () : ResponseInterface {
        /** @var ContentObjectRenderer $contentObject */
        $contentObject = $this->request->getAttribute('currentContentObject');
        $dataFromTypoScript = $contentObject->data;

        $this->view->assign('data', $dataFromTypoScript);

        return $this->htmlResponse();
    }
}