<?php

/**
* Rackspace Cloud Files Behavior
*
* This behavior takes care of your uploaded file by putting it in the
* desired Container in the Rackspace Cloud.
*
* Relies on the cloudfiles vendor (included in the Vendors folder)
*
* PHP versions 4 and 5
*
* Mindthecode: http://www.mindthecode.com
* Copyright 2011, Stef van den Ham
*
* Licensed under The MIT License
* Redistributions of files must retain the above copyright notice.
*
* @author Stef van den Ham
* @copyright Copyright 2011, Mindthecode (http://www.mindthecode.com)
* @license MIT License (http://www.opensource.org/licenses/mit-license.php)
*/

App::import('Vendor', 'Cloudfiles.Cloudfiles');

class CloudfilesBehavior extends ModelBehavior {
	
	/* The Behavior settings */
	public $settings;
	
	/* Custom validations */
	public $validations = array(
		'InvalidExt' => array(
			'rule' => array('checkFileExt'),
			'message' => 'Invalid file extension'
		),
	);
	
	/* Set up the Behavior by taking care of settings */
	function setup(&$Model, $settings = array()) {
		foreach ($settings as $field => $options) {
			if (!is_array($options)) {
				$field   = $options;
				$options = array();
			}
		}
		
		$this->_field = $field;

		$settings[$this->_field]['auth_url'] = US_AUTHURL;
		if(isset($settings[$this->_field]['location']) && $settings[$this->_field]['location'] == 'UK') {
			$settings[$this->_field]['auth_url'] = UK_AUTHURL;
		}
				
		$this->settings = $settings;
	}
	
	/* Attach any validation rules, if needed */
	function beforeValidate(&$model) {
		if(isset($this->settings[$this->_field]['allowedExt'])) {
			$model->validate[$this->_field]['InvalidExt']  = $this->validations['InvalidExt'];
		}
		return true;
	}
	
	/* The main auto-magic. Uploading the file to the cloud, and updating the Model Data with the CDN Url */
	function beforeSave(&$model) {
		$settings = $this->settings[$this->_field];
		$data = $model->data[$model->alias][$this->_field];
		
		$auth = new CF_Authentication($settings['username'], $settings['key'], null, $settings['auth_url']);
		$auth->ssl_use_cabundle();
		$auth->authenticate();
		$conn = new CF_Connection($auth);
		
		$container = $conn->get_container($settings['container']);

		// store file information
		$localfile = $data['tmp_name'];
		$filename = md5(time()).'_'.$data['name'];

		// upload file to Rackspace
		$object = $container->create_object($filename);
		$object->content_type = $data['type'];
		$object->load_from_filename($localfile);
		
		$model->data[$model->alias][$this->_field] = $object->public_uri();
	}
	
	/* File extension validation rule */
	function checkFileExt($check, $data) {
		$return = false;
		foreach($this->settings[$this->_field]['allowedExt'] as $extension) {
			if( strtolower(substr($data[$this->_field]['name'], -strlen($extension))) == strtolower($extension) ) {
				$return = true;
			}
		}
		return $return;
	}
	
};