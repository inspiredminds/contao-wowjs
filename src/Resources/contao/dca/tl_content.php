<?php

/**
 * This file is part of the ContaoWowJs Bundle.
 *
 * (c) inspiredminds <https://github.com/inspiredminds>
 *
 * @package   ContaoWowJs
 * @author    Fritz Michael Gschwantner <https://github.com/fritzmg>
 * @license   LGPL-3.0-or-later
 * @copyright inspiredminds 2018
 */

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['wowjsAnimation'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['wowjsAnimation'],
    'exclude' => true,
    'inputType' => 'select',
    'options' => [
        "Attention Seekers" => [
            'bounce',
            'flash',
            'pulse',
            'rubberBand',
            'shake',
            'swing',
            'tada',
            'wobble',
            'jello',
        ],
        "Bouncing Entrances" => [
            'bounceIn',
            'bounceInDown',
            'bounceInLeft',
            'bounceInRight',
            'bounceInUp',
        ],
        "Bouncing Exits" => [
            'bounceOut',
            'bounceOutDown',
            'bounceOutLeft',
            'bounceOutRight',
            'bounceOutUp',
        ],
        "Fading Entrances" => [
            'fadeIn',
            'fadeInDown',
            'fadeInDownBig',
            'fadeInLeft',
            'fadeInLeftBig',
            'fadeInRight',
            'fadeInRightBig',
            'fadeInUp',
            'fadeInUpBig',
        ],
        "Fading Exits" => [
            'fadeOut',
            'fadeOutDown',
            'fadeOutDownBig',
            'fadeOutLeft',
            'fadeOutLeftBig',
            'fadeOutRight',
            'fadeOutRightBig',
            'fadeOutUp',
            'fadeOutUpBig',
        ],
        "Flippers" => [
            'flip',
            'flipInX',
            'flipInY',
            'flipOutX',
            'flipOutY',
        ],
        "Lightspeed" => [
            'lightSpeedIn',
            'lightSpeedOut',
        ],
        "Rotating Entrances" => [
            'rotateIn',
            'rotateInDownLeft',
            'rotateInDownRight',
            'rotateInUpLeft',
            'rotateInUpRight',
        ],
        "Rotating Exits" => [
            'rotateOut',
            'rotateOutDownLeft',
            'rotateOutDownRight',
            'rotateOutUpLeft',
            'rotateOutUpRight',
        ],
        "Sliding Entrances" => [
            'slideInUp',
            'slideInDown',
            'slideInLeft',
            'slideInRight',

        ],
        "Sliding Exits" => [
            'slideOutUp',
            'slideOutDown',
            'slideOutLeft',
            'slideOutRight',
        ],
        "Zoom Entrances" => [
            'zoomIn',
            'zoomInDown',
            'zoomInLeft',
            'zoomInRight',
            'zoomInUp',
        ],
        "Zoom Exits" => [
            'zoomOut',
            'zoomOutDown',
            'zoomOutLeft',
            'zoomOutRight',
            'zoomOutUp',
        ],
        "Specials" => [
            'hinge',
            'jackInTheBox',
            'rollIn',
            'rollOut',
        ],
    ],
    'eval' => ['tl_class' => 'w50', 'includeBlankOption'=>true],
    'sql' => ['type' => 'string', 'length' => 32]
);

$GLOBALS['TL_DCA']['tl_content']['fields']['wowjsDuration'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['wowjsDuration'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50 clr'],
    'sql' => ['type' => 'string', 'length' => 16]
);

$GLOBALS['TL_DCA']['tl_content']['fields']['wowjsDelay'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['wowjsDelay'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50'],
    'sql' => ['type' => 'string', 'length' => 16]
);

$GLOBALS['TL_DCA']['tl_content']['fields']['wowjsOffset'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['wowjsOffset'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'rgxp' => 'natural'],
    'sql' => "smallint unsigned NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['wowjsIteration'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['wowjsIteration'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'rgxp' => 'natural'],
    'sql' => "smallint unsigned NULL"
);


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = function()
{
    foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $key => $palette)
    {
        if (\is_string($palette))
        {
            PaletteManipulator::create()
                ->addLegend('wowjs_legend', 'expert_legend', PaletteManipulator::POSITION_AFTER, true)
                ->addField('wowjsAnimation', 'wowjs_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('wowjsDuration', 'wowjs_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('wowjsDelay', 'wowjs_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('wowjsOffset', 'wowjs_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('wowjsIteration', 'wowjs_legend', PaletteManipulator::POSITION_APPEND)
                ->applyToPalette($key, 'tl_content');
        }
    }
};
