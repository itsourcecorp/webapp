<?php
class InstagramComponent extends CApplicationComponent
{
    protected $_model;
    public $config=array();

    public function init() {
        // Init this component
        // $this->someconfig is already available
        $this->_model = new Instagram($this->config);
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
