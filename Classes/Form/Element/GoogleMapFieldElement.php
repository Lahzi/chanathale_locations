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

namespace Chanathale\ChanathaleLocations\Form\Element;

use TYPO3\CMS\Backend\Form\Element\AbstractFormElement;
use TYPO3\CMS\Core\Page\JavaScriptModuleInstruction;
use TYPO3\CMS\Core\Utility\StringUtility;

/**
 * Class GoogleMapFieldElement
 */
class GoogleMapFieldElement extends AbstractFormElement
{

    /**
     * render
     * @return array
     */
    public function render(): array
    {
        $resultArray = $this->initializeResultArray();
        $parameterArray = $this->data['parameterArray'];
        $itemValue = $parameterArray['itemFormElValue'];
        $fieldId = StringUtility::getUniqueId('formengine-googlemap-');
        $autoSuggestionId = StringUtility::getUniqueId('formengine-googlemap-autosuggestion-');
        $fieldName = $parameterArray['itemFormElName'];

        $html = [];
        $html[] = '<div class="form-control-wrap">';
        $html[] = '<input type="hidden" id="' . $fieldId . '" name="' . $fieldName . '" value="' . htmlspecialchars($itemValue) . '" />';
        $html[] = '<typo3-google-maps-container id="map-' . $fieldId . '" style="height: 600px; display: block">';
        $html[] = '<div class="auto-suggestion-wrapper"><label for="'.$autoSuggestionId.'">Adressensuche</label><input id="'.$autoSuggestionId.'" type="text" class="form-control" /></div>';
        $html[] = '<typo3-google-maps class="map-placeholder" style="height: 100%">Loading map...</typo3-google-maps>';
        $html[] = '</typo3-google-maps-container>';
        $html[] = '</div>';

        $resultArray['html'] = implode(LF, $html);
        $resultArray['javaScriptModules'][] = JavaScriptModuleInstruction::create('@chanathale/chanathale-locations/google-map-field-type.js');

        return $resultArray;
    }
}