<?php

declare(strict_types=1);

/*
 * This file is part of the ContaoWowJsBundle.
 *
 * (c) inspiredminds
 *
 * @license LGPL-3.0-or-later
 */

$GLOBALS['TL_HOOKS']['getContentElement'][] = ['inspiredminds_contao_wowjs.listener.hook', 'onGetContentElement'];
