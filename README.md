## Whisperbuddy PHP library to create lead and listener ##


----------


 1. Install
 
 ```
 omposer require whisperbuddy/whisperbuddy-php
 ```
 
 2. Example Usage
 

 ```php
<?php
	
	
	require(__DIR__ . 'path/to/vendor/autoload.php');
	
	
	use whisperbuddy\WhisperBuddy;
	
	
	
	$key = "NC8XanSyKcyU8PtUOnl-xxxxxxxxxx";
	$secret = "mE7sGcH-zQc_-KF6xxxxxxxxxxxxxx";
	
	
	$whisperbuddy = new WhisperBuddy($key,$secret);
	
	// Create new Lead
	
	$data = [ 'name'=> 'John Smith' , 'email'=>'johnsmith@gmail.com'];
	
	$response = $whisperbuddy->createLead($data);
	
	
	var_dump($response);
	
	
	// Create Listener
	
	
	$listener = $whisperbuddy->listen();
	
	var_dump($listener);
	
	
```