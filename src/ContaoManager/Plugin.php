<?php

declare(strict_types=1);

/*
 * (c) INSPIRED MINDS
 */

namespace InspiredMinds\ContaoWowJs\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use InspiredMinds\ContaoWowJs\ContaoWowJsBundle;
use MadeYourDay\RockSolidCustomElements\RockSolidCustomElementsBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoWowJsBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class, RockSolidCustomElementsBundle::class]),
        ];
    }
}
