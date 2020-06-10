<?php

declare(strict_types=1);

/*
 * This file is part of the ContaoWowJsBundle.
 *
 * (c) inspiredminds
 *
 * @license LGPL-3.0-or-later
 */

use InspiredMinds\ContaoWowJs\EventListener\HookListener;

$GLOBALS['TL_HOOKS']['getContentElement'][] = [HookListener::class, 'onGetContentElement'];
$GLOBALS['TL_HOOKS']['parseWidget'][] = [HookListener::class, 'onParseWidget'];
