<?php

/**
 * This file is part of the ContaoWowJs Bundle.
 *
 * (c) inspiredminds <https://github.com/inspiredminds>
 *
 * @package   ContaoWowJs
 * @author    Fritz Michael Gschwantner <https://github.com/fritzmg>
 * @license   MIT
 * @copyright inspiredminds 2018
 */

namespace InspiredMinds\ContaoWowJs\EventListener;

use Contao\ContentModel;

class HookListener
{
    /**
     * Inject WOW.js attributes
     *
     * @param  ContentModel $objElement
     * @param  string $strBuffer
     * @return string
     */
    public function onGetContentElement(ContentModel $objElement, string $strBuffer): string
    {
        if (TL_MODE == 'BE' || !$objElement->wowjsAnimation)
        {
            return $strBuffer;
        }

        $strClasses = 'wow ' . $objElement->wowjsAnimation;

        $arrData = \array_filter([
            'data-wow-duration' => $objElement->wowjsDuration,
            'data-wow-delay' => $objElement->wowjsDelay,
            'data-wow-offset' => $objElement->wowjsOffset,
            'data-wow-iteration' => $objElement->wowjsIteration,
        ], function ($v) { return \strlen($v) > 0; });

        // parse the initial HTML tag
        $strBuffer = \preg_replace_callback(
            '|<([a-zA-Z]+)(\s[^>]*?)?(?<!/)>|',
            function ($matches) use ($strClasses, $arrData)
            {
                $strTag = $matches[1];
                $strAttributes = $matches[2];

                // add the CSS classes
                $strAttributes = preg_replace('/class="([^"]+)"/', 'class="$1 ' . $strClasses . '"', $strAttributes, 1, $count);
                if (0 === $count) $strAttributes.= ' class="' . $strClasses . '"';

                // add the data attributes
                foreach ($arrData as $key => $value)
                {
                    $strAttributes.= ' ' . $key . '="' . $value . '"';
                }

                return "<{$strTag}{$strAttributes}>";
            },
            $strBuffer, 1
        );

        return $strBuffer;
    }
}
