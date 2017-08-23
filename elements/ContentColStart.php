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
 * Class ContentColStart
 *
 * Front end content element "Début de colonne".
 * @copyright  Chibko Stéphane
 * @author     Chibko Stéphane <http://www.chibko.com>
 * @package    xBootstrap
 */
class ContentColStart extends \Contao\ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_col_start';


	/**
	 * Generate the content element
	 */
	protected function compile()
	{
		if (TL_MODE == 'FE')
		{
			$this->strTemplate = 'ce_col_start';
			$this->Template = new \FrontendTemplate($this->strTemplate);
			$this->Template->setData($this->arrData);
		}
		else
		{
			$this->strTemplate = 'be_wildcard';
			$this->Template = new \BackendTemplate($this->strTemplate);
			$color=deserialize($this->bootstrap_cols_color);
            $color=$color[0];
            if (!$color) {
                $color="444";
            }
            
            $title="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-weight:normal; color:#".$color.";'>";
			$cols=deserialize($this->bootstrap_cols);
            $cols_offset=deserialize($this->bootstrap_cols_offset);
            $cols_push=deserialize($this->bootstrap_cols_push);
            $cols_pull=deserialize($this->bootstrap_cols_pull);
			
			if ($cols[0]) { $title.="<strong>XS-".$cols[0]."</strong> ";}
			if ($cols[1]) { $title.="<strong>SM-".$cols[1]."</strong> ";}
			if ($cols[2]) { $title.="<strong>MD-".$cols[2]."</strong> ";}
			if ($cols[3]) { $title.="<strong>LG-".$cols[3]."</strong> ";}
            
            if ($cols_offset[0]) { $title.="XS-OFFSET-".$cols_offset[0]." ";}
			if ($cols_offset[1]) { $title.="SM-OFFSET-".$cols_offset[1]." ";}
			if ($cols_offset[2]) { $title.="MD-OFFSET-".$cols_offset[2]." ";}
			if ($cols_offset[3]) { $title.="LG-OFFSET-".$cols_offset[3]." ";}
            
            if ($cols_push[0]) { $title.="XS-PUSH-".$cols_push[0]." ";}
			if ($cols_push[1]) { $title.="SM-PUSH-".$cols_push[1]." ";}
			if ($cols_push[2]) { $title.="MD-PUSH-".$cols_push[2]." ";}
			if ($cols_push[3]) { $title.="LG-PUSH-".$cols_push[3]." ";}
            
            
            if ($cols_pull[0]) { $title.="XS-PULL-".$cols_pull[0]." ";}
			if ($cols_pull[1]) { $title.="SM-PULL-".$cols_pull[1]." ";}
			if ($cols_pull[2]) { $title.="MD-PULL-".$cols_pull[2]." ";}
			if ($cols_pull[3]) { $title.="LG-PULL-".$cols_pull[3]." ";}
            
            
			
            $title=substr($title,0,-1);
			$title.="</span></span>";
			$this->Template->title = $title;
		}

		
		$this->Template->class = $this->cssID[1];
		$this->Template->cssID = $this->cssID[0];
	}
}
