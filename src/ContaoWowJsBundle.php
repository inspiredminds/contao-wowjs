<?php

declare(strict_types=1);

/*
 * This file is part of the ContaoWowJsBundle.
 *
 * (c) inspiredminds
 *
 * @license LGPL-3.0-or-later
 */

namespace InspiredMinds\ContaoWowJs;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Configures the ContaoWowJsBundle.
 */
class ContaoWowJsBundle extends Bundle
{
    public static $animationOptions = [
        'Attention Seekers' => [
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
        'Bouncing Entrances' => [
            'bounceIn',
            'bounceInDown',
            'bounceInLeft',
            'bounceInRight',
            'bounceInUp',
        ],
        'Bouncing Exits' => [
            'bounceOut',
            'bounceOutDown',
            'bounceOutLeft',
            'bounceOutRight',
            'bounceOutUp',
        ],
        'Fading Entrances' => [
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
        'Fading Exits' => [
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
        'Flippers' => [
            'flip',
            'flipInX',
            'flipInY',
            'flipOutX',
            'flipOutY',
        ],
        'Lightspeed' => [
            'lightSpeedIn',
            'lightSpeedOut',
        ],
        'Rotating Entrances' => [
            'rotateIn',
            'rotateInDownLeft',
            'rotateInDownRight',
            'rotateInUpLeft',
            'rotateInUpRight',
        ],
        'Rotating Exits' => [
            'rotateOut',
            'rotateOutDownLeft',
            'rotateOutDownRight',
            'rotateOutUpLeft',
            'rotateOutUpRight',
        ],
        'Sliding Entrances' => [
            'slideInUp',
            'slideInDown',
            'slideInLeft',
            'slideInRight',
        ],
        'Sliding Exits' => [
            'slideOutUp',
            'slideOutDown',
            'slideOutLeft',
            'slideOutRight',
        ],
        'Zoom Entrances' => [
            'zoomIn',
            'zoomInDown',
            'zoomInLeft',
            'zoomInRight',
            'zoomInUp',
        ],
        'Zoom Exits' => [
            'zoomOut',
            'zoomOutDown',
            'zoomOutLeft',
            'zoomOutRight',
            'zoomOutUp',
        ],
        'Specials' => [
            'hinge',
            'jackInTheBox',
            'rollIn',
            'rollOut',
        ],
    ];
}
