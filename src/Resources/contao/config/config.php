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

$GLOBALS['TL_HOOKS']['getContentElement'][] = ['inspiredminds_contao_wowjs.listener.hook', 'onGetContentElement'];
