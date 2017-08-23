<?php
/**
 * Register the classes
 */

/**
 * Register PSR-0 namespaces
 */
if (class_exists('NamespaceClassLoader')) {
    NamespaceClassLoader::add('Xboostrap', 'system/modules/xboostrap/library');
}



ClassLoader::addClasses(array
(
	
    //'xbootstrap\LazySizes' => 'system/modules/xbootstrap/classes/LazySizes.php',
    
	'Controller' => 'system/modules/xbootstrap/library/Contao/Controller.php',
    'Hooks' => 'system/modules/xbootstrap/classes/Hooks.php',
    
	// Elements
	'ContentLigneStart' => 'system/modules/xbootstrap/elements/ContentLigneStart.php',
	'ContentLigneStop' => 'system/modules/xbootstrap/elements/ContentLigneStop.php',
    'ContentColStart' => 'system/modules/xbootstrap/elements/ContentColStart.php',
	'ContentColStop' =>'system/modules/xbootstrap/elements/ContentColStop.php',
	'ContentColSeparator' => 'system/modules/xbootstrap/elements/ContentColSeparator.php',
    'ContentAlert' => 'system/modules/xbootstrap/elements/ContentAlert.php',
    
    //'xbootstrap\ContentElement' => 'system/modules/xbootstrap/elements/ContentElement.php',
    //'xbootstrap\Hybrid' => 'system/modules/xbootstrap/classes/Hybrid.php',
    //'xbootstrap\Module' => 'system/modules/xbootstrap/modules/Module.php',
	
    'FormCaptcha' => 'system/modules/xbootstrap/forms/FormCaptcha.php',
	'FormCheckBox' => 'system/modules/xbootstrap/forms/FormCheckBox.php',
	'FormPassword' => 'system/modules/xbootstrap/forms/FormPassword.php',
    'FormRadioButton' => 'system/modules/xbootstrap/forms/FormRadioButton.php',
    'FormSelectMenu' => 'system/modules/xbootstrap/forms/FormSelectMenu.php',
    'FormSubmit' => 'system/modules/xbootstrap/forms/FormSubmit.php',
	'FormTextField' => 'system/modules/xbootstrap/forms/FormTextField.php',
	'FormTextArea' => 'system/modules/xbootstrap/forms/FormTextArea.php',
    
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
    'fe_page'  => 'system/modules/xbootstrap/templates/frontend',
	
	'block_alert'  => 'system/modules/xbootstrap/templates/block',
    
    'ce_ligne_start'  => 'system/modules/xbootstrap/templates/elements',
	'ce_ligne_stop'   => 'system/modules/xbootstrap/templates/elements',
    'ce_col_start'  => 'system/modules/xbootstrap/templates/elements',
	'ce_col_stop'   => 'system/modules/xbootstrap/templates/elements',
	'ce_col_separator'   => 'system/modules/xbootstrap/templates/elements',
	'ce_image'  => 'system/modules/xbootstrap/templates/elements',
	'ce_text'  => 'system/modules/xbootstrap/templates/elements',
    'ce_hyperlink_image'  => 'system/modules/xbootstrap/templates/elements',
    'ce_alert'  => 'system/modules/xbootstrap/templates/elements',
    
    'gallery_default'  => 'system/modules/xbootstrap/templates/gallery',
    'gallery_responsive'  => 'system/modules/xbootstrap/templates/gallery',

	'pagination'   => 'system/modules/xbootstrap/templates/pagination',
	
    'picture_default'  => 'system/modules/xbootstrap/templates/picture',
    
    'mod_breadcrumb'  => 'system/modules/xbootstrap/templates/modules',
    
    'form_captcha'  => 'system/modules/xbootstrap/templates/forms',
    'form_fieldset'  => 'system/modules/xbootstrap/templates/forms',
    'form_select'  => 'system/modules/xbootstrap/templates/forms',
    'form_submit'  => 'system/modules/xbootstrap/templates/forms',
    'form_textarea'  => 'system/modules/xbootstrap/templates/forms',
    'form_textfield'  => 'system/modules/xbootstrap/templates/forms',
    'form_checkbox'  => 'system/modules/xbootstrap/templates/forms',
    'form_radio'  => 'system/modules/xbootstrap/templates/forms',
    'form_upload'  => 'system/modules/xbootstrap/templates/forms',
    'form_password'  => 'system/modules/xbootstrap/templates/forms'
));
