# phpAES256
This class is use to encrypt text using an AES-256

Important things about the Keys: 
  1. A fixed password is not an AES key. Using it directly as an AES key opens you up to attacks.  
  2. A fixed password should be salted or stretched.
  3. Fist it should be salted, this means adding Random Data to it, this ensure that data encrypted with the same password will get different ciphertext.
  4. Second it should be hashed, so that the final result is the correct length.

Almost every algorithim can be broken, the real point is to force the attacker to waste some time, and make them give up.

## Recommendation

* As soon as you generate the key store it, usually on a different DataBase that the user information, this will help you to protect your information, in case of an attack the hacker will not have whole information
* because this is random generated key, storing it will help you to decrypt your password later on.

## Generating a Salt

1. Add the `include('PATH/AES256.php');` to your PHP File,
2. Create AES256 Object
  * `$aes = new AES256():`
3. Gets a Salt of 32bits for AES256
	* `$salt = $aes->getSaltKey(16);`

## Using AES

1. Password encrypted using AES-256 CBC
  * `$password = $aes->encryptString($password, $salt);`
2. Password decrypted using AES-256 CBC
  * `$password = $aes->decryptString($saltedPassword, $salt);`
