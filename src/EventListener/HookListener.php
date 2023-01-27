<?php

declare(strict_types=1);

/*
 * This file is part of the ContaoWowJsBundle.
 *
 * (c) inspiredminds
 *
 * @license LGPL-3.0-or-later
 */

namespace InspiredMinds\ContaoWowJs\EventListener;

use Contao\ContentModel;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\Widget;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Inject WOW.js attributes.
 */
class HookListener
{
    private $scopeMatcher;
    private $requestStack;

    public function __construct(ScopeMatcher $scopeMatcher, RequestStack $requestStack)
    {
        $this->scopeMatcher = $scopeMatcher;
        $this->requestStack = $requestStack;
    }

    /** 
     * @Hook("getContentElement")
     */
    public function onGetContentElement(ContentModel $element, string $buffer): string
    {
        return $this->processBuffer($buffer, $element);
    }

    /** 
     * @Hook("parseWidget")
     */
    public function onParseWidget(string $buffer, Widget $widget): string
    {
        return $this->processBuffer($buffer, $widget);
    }

    /**
     * @param object $object
     */
    private function processBuffer(string $buffer, $object): string
    {
        $request = $this->requestStack->getCurrentRequest();

        if (($request && $this->scopeMatcher->isBackendRequest($request)) || !$object->wowjsAnimation) {
            return $buffer;
        }

        $classes = 'wow '.$object->wowjsAnimation;

        $dataAttributes = \array_filter([
            'data-wow-duration' => $object->wowjsDuration,
            'data-wow-delay' => $object->wowjsDelay,
            // https://github.com/contao/contao/issues/5034
            'data-wow-offset' => $object->wowjsOffset > 0 ? $object->wowjsOffset : '',
            'data-wow-iteration' => $object->wowjsIteration > 0 ? $object->wowjsIteration : '',
        ], function ($v) { return null !== $v && '' !== $v; });

        // parse the initial HTML tag
        $buffer = \preg_replace_callback(
            '|<([a-zA-Z0-9]+)(\s[^>]*?)?(?<!/)>|',
            function ($matches) use ($classes, $dataAttributes) {
                $tag = $matches[1];
                $attributes = $matches[2];

                // add the CSS classes
                $attributes = preg_replace('/class="([^"]+)"/', 'class="$1 '.$classes.'"', $attributes, 1, $count);
                if (0 === $count) {
                    $attributes .= ' class="'.$classes.'"';
                }

                // add the data attributes
                foreach ($dataAttributes as $key => $value) {
                    $attributes .= ' '.$key.'="'.$value.'"';
                }

                return "<{$tag}{$attributes}>";
            },
            $buffer, 1
        );

        return $buffer;
    }
}
