<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Core
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Table tl_content
 */
$GLOBALS['TL_DCA']['tl_page']['config']['oncopy_callback'][] = array('colsCallback','pageCheck');
$GLOBALS['TL_DCA']['tl_page']['palettes']['root'] = str_replace('pageTitle;','pageTitle,description;',$GLOBALS['TL_DCA']['tl_page']['palettes']['root']);