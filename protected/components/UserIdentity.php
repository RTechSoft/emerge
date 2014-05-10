<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;

	public function authenticate()
	{
		$checker = Users::usernameChecker($this->username);
		if($checker == 'mobile') {
			$userRecord = Users::model()->findByAttributes(array('primary_username'=>$this->username));
		} else if($checker == 'username') {
			$userRecord = Users::model()->findByAttributes(array('secondary_username'=>$this->username));
		} else if($checker == 'agency') {
			$userRecord = Agencies::model()->findByAttributes(array('agency_username'=>$this->username));
		}

		if($userRecord===null) {
			return $this->errorCode = self::ERROR_USERNAME_INVALID;
		}

		$this->_id = $userRecord->id;
		$this->setState('userId', $userRecord->id);
		if($checker == 'mobile' || $checker == 'username') {
			$this->setState('username', $userRecord->secondary_username);
			$this->setState('name', $userRecord->user_firstname . ' ' . $userRecord->user_lastname);
			$this->setState('userType', 1);
		} else if($checker === 'agency') {
			$this->setState('username', $userRecord->agency_username);
			$this->setState('name', $userRecord->agency_name);
			$this->setState('userType', 2);
		}

		return $this->errorCode=self::ERROR_NONE;
	}

	public function getId() {
		return $this->_id;
	}
}