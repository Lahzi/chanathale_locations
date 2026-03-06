<?php

use TYPO3\CMS\Core\Security\ContentSecurityPolicy\Directive;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\Mutation;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\MutationCollection;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\MutationMode;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\UriValue;
use TYPO3\CMS\Core\Type\Map;

return Map::fromEntries([
    \TYPO3\CMS\Core\Security\ContentSecurityPolicy\Scope::backend(),
    new MutationCollection(
        new Mutation(
            MutationMode::Extend,
            Directive::ConnectSrc,
            new UriValue('https://maps.googleapis.com'),
            new UriValue('https://maps.gstatic.com'),
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::ScriptSrc,
            new UriValue('https://maps.googleapis.com'),
            new UriValue('https://maps.gstatic.com'),
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::ImgSrc,
            new UriValue('https://maps.googleapis.com'),
            new UriValue('https://maps.gstatic.com'),
            new UriValue('https://*.googleapis.com'),
            new UriValue('https://*.gstatic.com'),
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::FrameSrc,
            new UriValue('https://www.google.com'),
        ),
    ),
]);