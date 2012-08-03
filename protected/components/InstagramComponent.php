<?php
class InstagramComponent extends CApplicationComponent
{
    protected $_model;
    public $config=array();

    public function init() {
        // Init this component
        // $this->someconfig is already available
        $token = ( !Yii::app()->user->isGuest && Yii::app()->user->hasState('token') ) ? Yii::app()->user->getState('token') : null;
        $this->_model = new Instagram($this->config, $token);
    }
    
    public function getModel(){
        return $this->_model;
    }
    
    public function setModel($model){
        $this->_model =  $model;   
    }

    public function myblabla() {
        var_dump($this->_model);    
    }
}
?>
