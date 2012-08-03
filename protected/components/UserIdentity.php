<?php
class UserIdentity extends CUserIdentity
{
    private $_id;
    
    // override the base class constructor 
    public function __construct($username,$id)
    {
        $this->username=$username;
        $this->_id = $id;
    }
        
    public function authenticate(){
        $record=User::model()->findByAttributes(array('id'=>$this->id));
        return ($record) ? 1 : 0; 
    }
    
    
     public function getId()
    {
        return $this->_id;
    }    
}