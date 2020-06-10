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

class HookListener
{
    /**
     * Inject WOW.js attributes.
     *
     * @return string
     */
    public function onGetContentElement(ContentModel $objElement, string $strBuffer): string
    {
        if (TL_MODE === 'BE' || !$objElement->wowjsAnimation) {
            return $strBuffer;
        }

        $strClasses = 'wow '.$objElement->wowjsAnimation;

        $arrData = \array_filter([
            'data-wow-duration' => $objElement->wowjsDuration,
            'data-wow-delay' => $objElement->wowjsDelay,
            'data-wow-offset' => $objElement->wowjsOffset,
            'data-wow-iteration' => $objElement->wowjsIteration,
        ], function ($v) { return \strlen($v) > 0; });

        // parse the initial HTML tag
        $strBuffer = \preg_replace_callback(
            '|<([a-zA-Z0-9]+)(\s[^>]*?)?(?<!/)>|',
            function ($matches) use ($strClasses, $arrData) {
                $strTag = $matches[1];
                $strAttributes = $matches[2];

                // add the CSS classes
                $strAttributes = preg_replace('/class="([^"]+)"/', 'class="$1 '.$strClasses.'"', $strAttributes, 1, $count);
                if (0 === $count) {
                    $strAttributes .= ' class="'.$strClasses.'"';
                }

                // add the data attributes
                foreach ($arrData as $key => $value) {
                    $strAttributes .= ' '.$key.'="'.$value.'"';
                }

                return "<{$strTag}{$strAttributes}>";
            },
            $strBuffer, 1
        );

        return $strBuffer;
    }
}
