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

namespace InspiredMinds\ContaoWowJs\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use InspiredMinds\ContaoWowJs\ContaoWowJsBundle;
use MadeYourDay\RockSolidCustomElements\RockSolidCustomElementsBundle;


/**
 * Plugin for the Contao Manager.
 *
 * @author Fritz Michael Gschwantner <fmg@inspiredminds.at>
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoWowJsBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class, RockSolidCustomElementsBundle::class])
        ];
    }
}
