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

namespace Chanathale\ChanathaleLocations\Form\Element;

use TYPO3\CMS\Backend\Form\Element\AbstractFormElement;
use TYPO3\CMS\Core\Utility\StringUtility;

/**
 * Class CoordinateFieldElement
 */
class CoordinateFieldElement extends AbstractFormElement
{
    /**
     * @inheritDoc
     */
    public function render(): array {
        $fieldName = $this->data['fieldName'];
        $parameterArray = $this->data['parameterArray'];

        $value = (string)($this->data['databaseRow'][$fieldName] ?? '0');
        $fieldId = StringUtility::getUniqueId('formengine-input-');
        $itemName = (string)$parameterArray['itemFormElName'];
        $renderedLabel = $this->renderLabel($fieldId);

        $html = sprintf(
            '%s<input type="text" id="%s" readonly data-field-name="%s" class="form-control" name="%s" value="%s" />',
            $renderedLabel,
            $fieldId,
            $fieldName,
            htmlspecialchars($itemName),
            htmlspecialchars($value)
        );
        return [
            'html' => $html,
        ];
    }
}