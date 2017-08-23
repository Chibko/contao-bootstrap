<?php
/**
 * Register the classes
 */

/**
 * Register PSR-0 namespaces
 */
if (class_exists('NamespaceClassLoader')) {
    NamespaceClassLoader::add('Xbootstrap', 'system/modules/xbootstrap/library');
}



ClassLoader::addClasses(array
(
	
    //'xbootstrap\LazySizes' => 'system/modules/xbootstrap/classes/LazySizes.php',
    
	'Xbootstrap\Controller' => 'system/modules/xbootstrap/library/Xbootstrap/Controller.php',
    'Xbootstrap\Hooks' => 'system/modules/xbootstrap/library/Xbootstrap/classes/Hooks.php',
    
	// Elements
	'Xbootstrap\ContentLigneStart' => 'system/modules/xbootstrap/elements/ContentLigneStart.php',
	'Xbootstrap\ContentLigneStop' => 'system/modules/xbootstrap/elements/ContentLigneStop.php',
    'Xbootstrap\ContentColStart' => 'system/modules/xbootstrap/elements/ContentColStart.php',
	'Xbootstrap\ContentColStop' =>'system/modules/xbootstrap/elements/ContentColStop.php',
	'Xbootstrap\ContentColSeparator' => 'system/modules/xbootstrap/elements/ContentColSeparator.php',
    'Xbootstrap\ContentAlert' => 'system/modules/xbootstrap/elements/ContentAlert.php',
    
    //'xbootstrap\ContentElement' => 'system/modules/xbootstrap/elements/ContentElement.php',
    //'xbootstrap\Hybrid' => 'system/modules/xbootstrap/classes/Hybrid.php',
    //'xbootstrap\Module' => 'system/modules/xbootstrap/modules/Module.php',
	
    'Xbootstrap\FormCaptcha' => 'system/modules/xbootstrap/forms/FormCaptcha.php',
	'Xbootstrap\FormCheckBox' => 'system/modules/xbootstrap/forms/FormCheckBox.php',
	'Xbootstrap\FormPassword' => 'system/modules/xbootstrap/forms/FormPassword.php',
    'Xbootstrap\FormRadioButton' => 'system/modules/xbootstrap/forms/FormRadioButton.php',
    'Xbootstrap\FormSelectMenu' => 'system/modules/xbootstrap/forms/FormSelectMenu.php',
    'Xbootstrap\FormSubmit' => 'system/modules/xbootstrap/forms/FormSubmit.php',
	'Xbootstrap\FormTextField' => 'system/modules/xbootstrap/forms/FormTextField.php',
	'Xbootstrap\FormTextArea' => 'system/modules/xbootstrap/forms/FormTextArea.php',
    
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
