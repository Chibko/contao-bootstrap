<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace xBootstrap;


class FormCaptcha extends \Contao\FormCaptcha
{

	/**
	 * Generate the label and return it as string
	 *
	 * @return string The label markup
	 */
	public function generateLabel()
	{
		if ($this->strLabel == '')
		{
			return '';
		}

		return sprintf('<label for="ctrl_%s" class="mandatory%s"><span class="invisible">%s </span>%s<span class="mandatory">*</span><span class="invisible"> %s</span></label>',
						$this->strId,
						(($this->strClass != '') ? ' ' . $this->strClass : ''),
						$GLOBALS['TL_LANG']['MSC']['mandatory'],
						$this->strLabel,
						$this->getQuestion());
	}


	/**
	 * Generate the widget and return it as string
	 *
	 * @return string The widget markup
	 */
	public function generate()
	{
		return sprintf('<input type="text" name="%s" id="ctrl_%s" class="captcha form-control mandatory%s" value=""%s%s',
						$this->strCaptchaKey,
						$this->strId,
						(($this->strClass != '') ? ' ' . $this->strClass : ''),
						$this->getAttributes(),
						$this->strTagEnding) . $this->addSubmit();
	}


	/**
	 * Return the captcha question as string
	 *
	 * @return string The question markup
	 */
	public function generateQuestion()
	{
		return sprintf('<span class="captcha_text%s">%s</span>',
						(($this->strClass != '') ? ' ' . $this->strClass : ''),
						$this->getQuestion());
	}
}
