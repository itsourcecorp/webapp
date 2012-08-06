<?php
class OuathController extends Controller
{
    

    public function init(){
        if(!Yii::app()->user->hasState('token'))
            $this->redirect( $this->createUrl('site/login') );
    }   
    
}