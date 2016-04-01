<?php
	namespace whisperbuddy;
	
	use \Firebase\JWT\JWT;
	use \Curl\Curl;
	
	class WhisperBuddy{
		/*
			* Campaign Key
		*/
		public $key = '';
		
		/*
			* Campaign Secret
		*/
		public $secret = '';
		
		
		const API_URL = 'http://api.whisperbuddy.com/leads';
		
		public function __construct($key,$secret){
			
			
			$this->key = $key;
			$this->secret = $secret;
			
		}
		
		/* 
			* Data related to the signer user
			*sample array $data
			* [                  
			*	'name'   => 'Bewara Blog', // name
			*	'email'=> 'be.wa.rabl.og@gmail.com',
			*	'ip'=>'192.168.2.1',
			*	'ref_id'=>19,
			*	'extra'=>[
			*	'username'=>'ydatech',
			*	'apa'=>'pun'
			
			*	]
			
			*	]
			*
		*/
		
		
		public function createLead($data){
			
			if(!array_key_exists( 'name',$data)){
				
				throw new \Exception( 'Name is required' );
				
			}
			if(!array_key_exists('email',$data)){
				
				throw new \Exception( 'Email is required' );
				
			}
			
			
			$tokenId    = base64_encode(mcrypt_create_iv(32));
			$issuedAt   = time();
			$notBefore  = $issuedAt ;             
			$expire     = $notBefore +  (3 * 60);            // Adding 3 minutes
			$serverName = 'http://api.whisperbuddy.com'; 
			
			
			/*
				* Create the token as an array
			*/
			$prop = [
			'iat'  => $issuedAt,         // Issued at: time when the token was generated
			'jti'  => $tokenId,          // Json Token Id: an unique identifier for the token
			'iss'  => $serverName,       // Issuer
			'nbf'  => $notBefore,        // Not before
			'exp'  => $expire,           // Expire
			'data' => $data
			
			
			];
			
			$secretkey = base64_encode($this->secret);
			
			$jwt = JWT::encode($prop,$secretkey, 'HS512');
			
			
			
			$curl = new Curl();
			$curl->post('http://api.whisperbuddy.com/leads', array(
			'key' => $this->key,
			'token' => $jwt,
			));
			
			$response = $curl->response;
			$curl->close();
			
			return $response;
			
		}
		
		/*
		 * WhisperBuddy listener
		 * 
		 *
		 */
		
		public function listen(){
			
			if(isset($_POST['token'])){
				$secretkey = base64_encode($this->secret);
				$token = $_POST['token'];
				try{
					
					$jwt = JWT::decode($token,$secretkey, array('HS512'));
					
					
					
					
					return $jwt->data;
					
				}
				catch(\Exception $e){
					
					return ['exception'=>'Invalid or Expired Token ' . $e->getMessage()];
					//throw new \Exception('Invalid or Expired Token ' . $e->getMessage());
					
				}
			}
			
		}
		
		
		
		
		
	}																						