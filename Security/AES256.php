<?php
	
	/**
	* This class cyphers a string using AES-256
	*/
	class AES256 {
		//Key Property
		private $key;
		
		//Key Setter
		private function setKey($sKey){
			//Set the HEXADECINAL Key
			$key = pack('H*', $sKey);
		}
		
		//Gets a Salt of 32bits
		public function getSaltKey($lenght){
			//Gets OpenSSL Bytes
			$bytes = openssl_random_pseudo_bytes($lenght);
			//Gets Hexadecimal representation of the Bytes
			$hex = bin2hex($bytes);
			//Return Parameter
			return $hex;
		}
		
		//Decode Using base64
		public function decode64String($string){
			//Decode Base64 String
			return base64_decode($$string);
		}
		
		//Encrypt
		public function encryptString($string, $salt) {
			//Set to false by default
		    $output = false;
			//Set Encryption Method
		    $encrypt_method = "AES-256-CBC";
		    // hash
		    $key = $salt;
		    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		    $iv = substr(hash('sha256', $salt), 0, 16);
	        //Encrypt the String with OpenSSL
	        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	        //Encode String Base 64, uncomment next line to use
	        //$output = base64_encode($output);
			//Return Parameter
		    return $output;			
		}
		
		//Decrypt
		public function decryptString($string, $salt) {
			//Set to false by default
		    $output = false;
		    //Encode String Base 64, uncomment next line to use
		    //$string = base64_decode($string);
			//Set Encryption Method
		    $encrypt_method = "AES-256-CBC";
		    // hash
		    $key = $salt;
		    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		    $iv = substr(hash('sha256', $salt), 0, 16);
			//Encrypt the String with OpenSSL
		    $output = openssl_decrypt($string, $encrypt_method, $key, 0, $iv);
			//Return Parameter
		    return $output;			
		}
	}
	
