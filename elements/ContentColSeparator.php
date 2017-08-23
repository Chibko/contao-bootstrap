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
 * Run in a custom namespace, so the class can be replaced
 */
namespace xBootstrap;

/**
 * Class ContentColSeparator
 *
 * Front end content element "Séparation / Clearfix".
 * @copyright  Chibko Stéphane
 * @author     Chibko Stéphane <http://www.chibko.com>
 * @package    xBootstrap
 */
class ContentColSeparator extends \Contao\ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_html';


	/**
	 * Generate the content element
	 */
	protected function compile()
	{
		if (TL_MODE == 'FE')
		{
			$this->strTemplate = 'ce_col_separator';
			$this->Template = new \FrontendTemplate($this->strTemplate);
            $this->Template->class = $this->cssID[1];
		    $this->Template->cssID = $this->cssID[0];
			$this->Template->setData($this->arrData);
		}
		else
		{
            if ($this->bootstrap_clearfix) { $title="<div class='clearfix'></div>";}
            if ($this->bootstrap_separation) { $title="<hr>";}
            if ($this->bootstrap_separation && $this->bootstrap_clearfix) { $title="<div class='clearfix'></div>\n<hr>";}
        
            $this->Template->html = '<pre>' . htmlspecialchars($title) . '</pre>';
        }
	}
}
