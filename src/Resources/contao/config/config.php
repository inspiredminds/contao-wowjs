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

$GLOBALS['TL_HOOKS']['getContentElement'][] = ['inspiredminds_contao_wowjs.listener.hook', 'onGetContentElement'];
