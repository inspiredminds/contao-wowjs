<?php

declare(strict_types=1);

/*
 * This file is part of the ContaoWowJsBundle.
 *
 * (c) inspiredminds
 *
 * @license LGPL-3.0-or-later
 */

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;
use InspiredMinds\ContaoWowJs\ContaoWowJsBundle;

/*
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['wowjsAnimation'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['wowjsAnimation'],
    'exclude' => true,
    'inputType' => 'select',
    'options' => ContaoWowJsBundle::$animationOptions,
    'eval' => ['tl_class' => 'w50', 'includeBlankOption' => true],
    'sql' => ['type' => 'string', 'length' => 32, 'default' => ''],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['wowjsDuration'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['wowjsDuration'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50 clr'],
    'sql' => ['type' => 'string', 'length' => 16, 'default' => ''],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['wowjsDelay'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['wowjsDelay'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50'],
    'sql' => ['type' => 'string', 'length' => 16, 'default' => ''],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['wowjsOffset'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['wowjsOffset'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'rgxp' => 'natural'],
    'sql' => 'smallint unsigned NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['wowjsIteration'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['wowjsIteration'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'rgxp' => 'natural'],
    'sql' => 'smallint unsigned NULL',
];

/*
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = function (DataContainer $dc): void {
    foreach ($GLOBALS['TL_DCA'][$dc->table]['palettes'] as $key => $palette) {
        if (\is_string($palette)) {
            PaletteManipulator::create()
                ->addLegend('wowjs_legend', 'expert_legend', PaletteManipulator::POSITION_AFTER, true)
                ->addField('wowjsAnimation', 'wowjs_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('wowjsDuration', 'wowjs_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('wowjsDelay', 'wowjs_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('wowjsOffset', 'wowjs_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('wowjsIteration', 'wowjs_legend', PaletteManipulator::POSITION_APPEND)
                ->applyToPalette($key, $dc->table)
            ;
        }
    }
};
