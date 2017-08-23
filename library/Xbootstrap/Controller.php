<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Library
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

namespace Xbootstrap;


/**
 * Extend Contao Controllers
 *
 * Permet de séparer les scripts du Head
 * 
 * Dans le fe_page :
 * <?= $this->javascript ?> pour les scripts
 * <?= $this->head ?> pour le head
 */
class Controller extends \Contao\Controller
{
	/**
	 * Replace the dynamic script tags (see #4203)
	 *
	 * @param string $strBuffer The string with the tags to be replaced
	 *
	 * @return string The string with the replaced tags
	 */
	public static function replaceDynamicScriptTags($strBuffer)
	{
		// HOOK: add custom logic
		if (isset($GLOBALS['TL_HOOKS']['replaceDynamicScriptTags']) && is_array($GLOBALS['TL_HOOKS']['replaceDynamicScriptTags']))
		{
			foreach ($GLOBALS['TL_HOOKS']['replaceDynamicScriptTags'] as $callback)
			{
				$strBuffer = static::importStatic($callback[0])->{$callback[1]}($strBuffer);
			}
		}

		/** @var \PageModel $objPage */
		global $objPage;

		$arrReplace = array();
		$blnXhtml = ($objPage->outputFormat == 'xhtml');
		$strScripts = '';

		// Add the internal jQuery scripts
		if (!empty($GLOBALS['TL_JQUERY']) && is_array($GLOBALS['TL_JQUERY']))
		{
			foreach (array_unique($GLOBALS['TL_JQUERY']) as $script)
			{
				$strScripts .= "\n" . trim($script) . "\n";
			}
		}

		$arrReplace['[[TL_JQUERY]]'] = $strScripts;
		$strScripts = '';

		// Add the internal MooTools scripts
		if (!empty($GLOBALS['TL_MOOTOOLS']) && is_array($GLOBALS['TL_MOOTOOLS']))
		{
			foreach (array_unique($GLOBALS['TL_MOOTOOLS']) as $script)
			{
				$strScripts .= "\n" . trim($script) . "\n";
			}
		}

		$arrReplace['[[TL_MOOTOOLS]]'] = $strScripts;
		$strScripts = '';

		// Add the internal <body> tags
		if (!empty($GLOBALS['TL_BODY']) && is_array($GLOBALS['TL_BODY']))
		{
			foreach (array_unique($GLOBALS['TL_BODY']) as $script)
			{
				$strScripts .= trim($script) . "\n";
			}
		}

		// Add the syntax highlighter scripts
		if (!empty($GLOBALS['TL_HIGHLIGHTER']) && is_array($GLOBALS['TL_HIGHLIGHTER']))
		{
			$objCombiner = new \Combiner();

			foreach (array_unique($GLOBALS['TL_HIGHLIGHTER']) as $script)
			{
				$objCombiner->add($script);
			}

			$strScripts .= "\n" . \Template::generateScriptTag($objCombiner->getCombinedFile(), $blnXhtml);
			$strScripts .= "\n" . \Template::generateInlineScript('SyntaxHighlighter.defaults.toolbar=false;SyntaxHighlighter.all()', $blnXhtml) . "\n";
		}

		// Command scheduler
		if (!\Config::get('disableCron'))
		{
			$strScripts .= "\n" . \Template::generateInlineScript('setTimeout(function(){var e=function(e,t){try{var n=new XMLHttpRequest}catch(r){return}n.open("GET",e,!0),n.onreadystatechange=function(){this.readyState==4&&this.status==200&&typeof t=="function"&&t(this.responseText)},n.send()},t="system/cron/cron.";e(t+"txt",function(n){parseInt(n||0)<Math.round(+(new Date)/1e3)-' . \Frontend::getCronTimeout() . '&&e(t+"php")})},5e3);', $blnXhtml) . "\n";
		}

		$arrReplace['[[TL_BODY]]'] = $strScripts;
		$strScripts = '';

		$objCombiner = new \Combiner();

		// Add the CSS framework style sheets
		if (!empty($GLOBALS['TL_FRAMEWORK_CSS']) && is_array($GLOBALS['TL_FRAMEWORK_CSS']))
		{
			foreach (array_unique($GLOBALS['TL_FRAMEWORK_CSS']) as $stylesheet)
			{
				$objCombiner->add($stylesheet);
			}
		}

		// Add the internal style sheets
		if (!empty($GLOBALS['TL_CSS']) && is_array($GLOBALS['TL_CSS']))
		{
			foreach (array_unique($GLOBALS['TL_CSS']) as $stylesheet)
			{
				$options = \StringUtil::resolveFlaggedUrl($stylesheet);

				if ($options->static)
				{
					if ($options->mtime === null)
					{
						$options->mtime = filemtime(TL_ROOT . '/' . $stylesheet);
					}

					$objCombiner->add($stylesheet, $options->mtime, $options->media);
				}
				else
				{
					$strScripts .= \Template::generateStyleTag(static::addStaticUrlTo($stylesheet), $options->media, $blnXhtml) . "\n";
				}
			}
		}

		// Add the user style sheets
		if (!empty($GLOBALS['TL_USER_CSS']) && is_array($GLOBALS['TL_USER_CSS']))
		{
			foreach (array_unique($GLOBALS['TL_USER_CSS']) as $stylesheet)
			{
				$options = \StringUtil::resolveFlaggedUrl($stylesheet);

				if ($options->static)
				{
					if ($options->mtime === null)
					{
						$options->mtime = filemtime(TL_ROOT . '/' . $stylesheet);
					}

					$objCombiner->add($stylesheet, $options->mtime, $options->media);
				}
				else
				{
					$strScripts .= \Template::generateStyleTag(static::addStaticUrlTo($stylesheet), $options->media, $blnXhtml) . "\n";
				}
			}
		}

		// Create the aggregated style sheet
		if ($objCombiner->hasEntries())
		{
			$strScripts .= \Template::generateStyleTag($objCombiner->getCombinedFile(), 'all', $blnXhtml) . "\n";
		}

		$arrReplace['[[TL_CSS]]'] = $strScripts;
		$strScripts = '';

		// Add the internal scripts
		if (!empty($GLOBALS['TL_JAVASCRIPT']) && is_array($GLOBALS['TL_JAVASCRIPT']))
		{
			$objCombiner = new \Combiner();
			$objCombinerAsync = new \Combiner();

			foreach (array_unique($GLOBALS['TL_JAVASCRIPT']) as $javascript)
			{
				$options = \StringUtil::resolveFlaggedUrl($javascript);

				if ($options->static)
				{
					if ($options->mtime === null)
					{
						$options->mtime = filemtime(TL_ROOT . '/' . $javascript);
					}

					$options->async ? $objCombinerAsync->add($javascript, $options->mtime) : $objCombiner->add($javascript, $options->mtime);
				}
				else
				{
					$strScripts .= \Template::generateScriptTag(static::addStaticUrlTo($javascript), $blnXhtml, $options->async) . "\n";
				}
			}

			// Create the aggregated script and add it before the non-static scripts (see #4890)
			if ($objCombiner->hasEntries())
			{
				$strScripts = \Template::generateScriptTag($objCombiner->getCombinedFile(), $blnXhtml) . "\n" . $strScripts;
			}

			if ($objCombinerAsync->hasEntries())
			{
				$strScripts = \Template::generateScriptTag($objCombinerAsync->getCombinedFile(), $blnXhtml, true) . "\n" . $strScripts;
			}
		}
        
         #CUSTOM CHIBKO : Sépare le Javascript du Head
        $arrReplace['[[TL_DEFERS]]'] = $strScripts;
        $strScripts='';
        
		// Add the internal <head> tags
		if (!empty($GLOBALS['TL_HEAD']) && is_array($GLOBALS['TL_HEAD']))
		{
			foreach (array_unique($GLOBALS['TL_HEAD']) as $head)
			{
				$strScripts .= trim($head) . "\n";
			}
		}

		$arrReplace['[[TL_HEAD]]'] = $strScripts;

		return str_replace(array_keys($arrReplace), array_values($arrReplace), $strBuffer);
	}

    
    
}
