This little behavior takes care of uploading your files to the Rackspace Files Cloud

## Installation

### Clone

Clone from github: in your plugin directory type git clone https://github.com/Hyra/cloudfiles.git cloudfiles

### Submodule

Add as Git submodule: in your plugin directory type git submodule add https://github.com/Hyra/cloudfiles.git cloudfiles

### Manual

Download as archive from github and extract to app/plugins/cloudfiles

### Usage

In the model where you are uploading files attach the behavior and include your credentials:

	var $actsAs = array(
		'Cloudfiles.Cloudfiles' => array(
			'file_video' => array(
				'username'  => 'YOUR_USERNAME',
				'key'       => 'YOUR_APIKEY',
				'container' => 'THE_CONTAINER_YOU_WANT_TO_USE',
			)
		)
	);
	
## Extra options

By default, Rackspace Cloud works with the US server-clusters, if your Cloud File cluster is in the UK, specify this by adding the location parameter:
	
	var $actsAs = array(
		'Cloudfiles.Cloudfiles' => array(
			'file_video' => array(
				'username'  => 'YOUR_USERNAME',
				'key'       => 'YOUR_APIKEY',
				'container' => 'THE_CONTAINER_YOU_WANT_TO_USE',
				'location'  => 'UK', // THIS ONE
			)
		)
	);
	
If you want to validate for certain extensions, you can specify them as well:
	
	var $actsAs = array(
		'Cloudfiles.Cloudfiles' => array(
			'file_video' => array(
				'username'  => 'YOUR_USERNAME',
				'key'       => 'YOUR_APIKEY',
				'container' => 'THE_CONTAINER_YOU_WANT_TO_USE',
				'allowedExt'  => array('.m4v'), // THIS ONE
			)
		)
	);

## TODO

If I have time I will probably add more validation rules, but obviously I can handle pull requests as well ;)

