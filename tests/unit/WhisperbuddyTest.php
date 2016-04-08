<?php
	namespace whisperbuddy;
	
	use whisperbuddy\WhisperBuddy;
	class WhisperbuddyTest extends \PHPUnit_Framework_TestCase
	{
		public $key = 'REa3kVPVwP8fsB5eJ5kEVx0FFOQV3BJd';
		public $secret = 'vjr99xF9jM5JGn2evDztur58jIWdp2TQ';
		
		public function testCreateLead(){
			
			$whisperbuddy = new WhisperBuddy($this->key,$this->secret);
			$data = [ 'name'=> 'Bewara Blog' , 'email'=>'bewarablog@gmail.com' , 'extra' => [ 'username'=>'bewarablog', 'amember_id'=>453 ]];
			$response = $whisperbuddy->createLead($data);
			$response = json_decode($response);
			
			$this->assertTrue(property_exists($response,'success'));
			
			
		}
		
		
		
	}						