<?php
class InstagramComponent extends CApplicationComponent
{
    protected $_model;
    public $config=array();

    public function init() {
        $token = ( !Yii::app()->user->isGuest && Yii::app()->user->hasState('token') ) ? Yii::app()->user->getState('token') : null;
        $this->_model = new Instagram($this->config, $token);
    }
    
    public function getModel(){
        return $this->_model;
    }
    public function setModel($model){
        $this->_model =  $model;   
    }
}
?>
