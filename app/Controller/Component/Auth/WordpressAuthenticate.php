<?php

App::uses('BaseAuthenticate', 'Controller/Component/Auth');

class WordpressAuthenticate extends BaseAuthenticate {

/**
 * Settings for this object.
 *
 * - `fields` The fields to use to identify a user by.
 * - `userModel` The model name of the User, defaults to User.
 * - `scope` Additional conditions to use when looking up and authenticating users,
 *    i.e. `array('User.is_active' => 1).`
 * - `realm` The realm authentication is for.  Defaults the server name.
 *
 * @var array
 */
	public $settings = array(
		'fields' => array(
			'username' => 'user_login',
			'password' => 'user_pass'
		),
		'userModel' => 'User',
		'scope' => array(),
		'realm' => '',
	);

/**
 * Authenticate a user using basic HTTP auth.  Will use the configured User model and attempt a
 * login using basic HTTP auth.
 *
 * @param CakeRequest $request The request to authenticate with.
 * @param CakeResponse $response The response to add headers to.
 * @return mixed Either false on failure, or an array of user data on success.
 */
	public function authenticate(CakeRequest $request, CakeResponse $response) {
    
        $userModel = $this->settings['userModel'];
    
        App::import('Vendor', 'utils/class-phpass');
        $hasher = new PasswordHash(8, TRUE);
        
        $user = ClassRegistry::init($userModel)->findByUserLogin($request->data['User']['user_login']);
        
        if(empty($user)){
            return false;
        }
        
        CakeLog::write('longben', $hasher->CheckPassword($request->data['User']['user_pass'], $user['User']['user_pass']));
        
        
        if($hasher->CheckPassword($request->data['User']['user_pass'], $user['User']['user_pass'])){
            return $user;
        }
        
        return false;
	}
    
/**
 * Creates an auth digest password hash to store
 *
 * @param string $username The username to use in the digest hash.
 * @param string $password The unhashed password to make a digest hash for.
 * @param string $realm The realm the password is for.
 * @return string the hashed password that can later be used with Digest authentication.
 */
	public static function password($password) {
       
        App::import('Vendor', 'utils/class-phpass');
        $hasher = new PasswordHash(8, TRUE);
        
        return $hasher->HashPassword($password);

	}
}

?>
