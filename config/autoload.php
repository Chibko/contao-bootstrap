<?php
/**
 * Register the classes
 */
 
ClassLoader::addNamespaces(array(
'xBootstrap')
);


ClassLoader::addClasses(array
(
	
    //'xBootstrap\LazySizes' => 'system/modules/xBootstrap/classes/LazySizes.php',
    
	'xBootstrap\Controller' => 'system/modules/xBootstrap/library/Contao/Controller.php',
    'xBootstrap\Hooks' => 'system/modules/xBootstrap/classes/Hooks.php',
    
	// Elements
	'xBootstrap\ContentLigneStart' => 'system/modules/xBootstrap/elements/ContentLigneStart.php',
	'xBootstrap\ContentLigneStop' => 'system/modules/xBootstrap/elements/ContentLigneStop.php',
    'xBootstrap\ContentColStart' => 'system/modules/xBootstrap/elements/ContentColStart.php',
	'xBootstrap\ContentColStop' =>'system/modules/xBootstrap/elements/ContentColStop.php',
	'xBootstrap\ContentColSeparator' => 'system/modules/xBootstrap/elements/ContentColSeparator.php',
    'xBootstrap\ContentAlert' => 'system/modules/xBootstrap/elements/ContentAlert.php',
    
    //'xBootstrap\ContentElement' => 'system/modules/xBootstrap/elements/ContentElement.php',
    //'xBootstrap\Hybrid' => 'system/modules/xBootstrap/classes/Hybrid.php',
    //'xBootstrap\Module' => 'system/modules/xBootstrap/modules/Module.php',
	
    'xBootstrap\FormCaptcha' => 'system/modules/xBootstrap/forms/FormCaptcha.php',
	'xBootstrap\FormCheckBox' => 'system/modules/xBootstrap/forms/FormCheckBox.php',
	'xBootstrap\FormPassword' => 'system/modules/xBootstrap/forms/FormPassword.php',
    'xBootstrap\FormRadioButton' => 'system/modules/xBootstrap/forms/FormRadioButton.php',
    'xBootstrap\FormSelectMenu' => 'system/modules/xBootstrap/forms/FormSelectMenu.php',
    'xBootstrap\FormSubmit' => 'system/modules/xBootstrap/forms/FormSubmit.php',
	'xBootstrap\FormTextField' => 'system/modules/xBootstrap/forms/FormTextField.php',
	'xBootstrap\FormTextArea' => 'system/modules/xBootstrap/forms/FormTextArea.php',
    
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
    'fe_page'  => 'system/modules/xBootstrap/templates/frontend',
	
	'block_alert'  => 'system/modules/xBootstrap/templates/block',
    
    'ce_ligne_start'  => 'system/modules/xBootstrap/templates/elements',
	'ce_ligne_stop'   => 'system/modules/xBootstrap/templates/elements',
    'ce_col_start'  => 'system/modules/xBootstrap/templates/elements',
	'ce_col_stop'   => 'system/modules/xBootstrap/templates/elements',
	'ce_col_separator'   => 'system/modules/xBootstrap/templates/elements',
	'ce_image'  => 'system/modules/xBootstrap/templates/elements',
	'ce_text'  => 'system/modules/xBootstrap/templates/elements',
    'ce_hyperlink_image'  => 'system/modules/xBootstrap/templates/elements',
    'ce_alert'  => 'system/modules/xBootstrap/templates/elements',
    
    'gallery_default'  => 'system/modules/xBootstrap/templates/gallery',
    'gallery_responsive'  => 'system/modules/xBootstrap/templates/gallery',

	'pagination'   => 'system/modules/xBootstrap/templates/pagination',
	
    'picture_default'  => 'system/modules/xBootstrap/templates/picture',
    
    'mod_breadcrumb'  => 'system/modules/xBootstrap/templates/modules',
    
    'form_captcha'  => 'system/modules/xBootstrap/templates/forms',
    'form_fieldset'  => 'system/modules/xBootstrap/templates/forms',
    'form_select'  => 'system/modules/xBootstrap/templates/forms',
    'form_submit'  => 'system/modules/xBootstrap/templates/forms',
    'form_textarea'  => 'system/modules/xBootstrap/templates/forms',
    'form_textfield'  => 'system/modules/xBootstrap/templates/forms',
    'form_checkbox'  => 'system/modules/xBootstrap/templates/forms',
    'form_radio'  => 'system/modules/xBootstrap/templates/forms',
    'form_upload'  => 'system/modules/xBootstrap/templates/forms',
    'form_password'  => 'system/modules/xBootstrap/templates/forms'
));
