<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace xBootstrap;

class FormTextArea extends \Contao\FormTextArea
{

	/**
	 * Generate the widget and return it as string
	 *
	 * @return string The widget markup
	 */
	public function generate()
	{
		return sprintf('<textarea name="%s" id="ctrl_%s" class="form-control textarea%s" rows="%s" cols="%s"%s>%s</textarea>',
						$this->strName,
						$this->strId,
						(($this->strClass != '') ? ' ' . $this->strClass : ''),
						$this->intRows,
						$this->intCols,
						$this->getAttributes(),
						$this->value) . $this->addSubmit();
	}
}
