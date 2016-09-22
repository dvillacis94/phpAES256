# phpAES256
This class is use to encrypt text using an AES-256

Important things about the Keys: 
  1. A fixed password is not an AES key. Using it directly as an AES key opens you up to attacks.  
  2. A fixed password should be salted or stretched.
  3. Fist it should be salted, this means adding Random Data to it, this ensure that data encrypted with the same password will get different ciphertext.
  4. Second it should be hashed, so that the final result is the correct length.

Almost every algorithim can be broken, the real point is to force the attacker to waste some time, and make them give up.
