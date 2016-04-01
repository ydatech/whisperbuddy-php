<?php
	
	
	require(__DIR__ . '/../vendor/autoload.php');
	
	
	use whisperbuddy\WhisperBuddy;
	
	
	
	$key = "NC8XanSyKcyU8PtUOnl-MwK2hYZ1kd8F";
	$secret = "mE7sGcH-zQc_-KF6yLDLnCVBByRge2bZ";
	
	
	$whisperbuddy = new WhisperBuddy($key,$secret);
	
	$data = [ 'name'=> 'Asep Koswara' , 'email'=>'asep.koswara@gmail.com'];
	
	$response = $whisperbuddy->createLead($data);
	
	
	var_dump($response);