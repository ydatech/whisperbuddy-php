<?php
	
	
	require(__DIR__ . '/../vendor/autoload.php');
	
	
	use whisperbuddy\WhisperBuddy;
	
	
	
	$key = 'REa3kVPVwP8fsB5eJ5kEVx0FFOQV3BJd';
	$secret = 'vjr99xF9jM5JGn2evDztur58jIWdp2TQ';
	
	
	$whisperbuddy = new WhisperBuddy($key,$secret);
	
	// Create new Lead
	
	$data = [ 'name'=> 'John Smith' , 'email'=>'johnsmith@gmail.com'];
	
	$response = $whisperbuddy->createLead($data);
	
	$response = json_decode($response);
	echo var_dump($response);
	
	
	// Create Listener
	
	
	$listener = $whisperbuddy->listen();
	
	var_dump($listener);
	
