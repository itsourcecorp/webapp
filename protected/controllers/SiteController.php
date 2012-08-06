<?php

class SiteController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model=new ContactForm;
        if(isset($_POST['ContactForm']))
        {
            $model->attributes=$_POST['ContactForm'];
            if($model->validate())
            {
                $name='=?UTF-8?B?'.base64_encode($model->name).'?=';
                $subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
                $headers="From: $name <{$model->email}>\r\n".
                    "Reply-To: {$model->email}\r\n".
                    "MIME-Version: 1.0\r\n".
                    "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
                Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact',array('model'=>$model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {

        if( !Yii::app()->user->isGuest && Yii::app()->user->hasState('token') ){
            $this->redirect($this->createUrl('user/view', array('id'=>Yii::app()->user->id)));
        }elseif(isset($_GET['code'])){
            $accessToken = Yii::app()->instagram->model->getAccessToken();
            $user = Yii::app()->instagram->model->getCurrentUser();
            $identity=new UserIdentity($user->username,$user->id);
            if(!$identity->authenticate()){
                $U = new User;
                $U->id = $user->id;
                $U->username = $user->username;
                $U->save();
            }
            $duration= 3600*24*30; // 30 days
            Yii::app()->user->login($identity,$duration);
            Yii::app()->user->setState('token', $accessToken);
            Yii::app()->user->setState('IgUser', $user);
            Yii::app()->user->setState('IgUser', $user);
            $this->redirect($this->createUrl('user/view', array('id'=>Yii::app()->user->id)));             
        }else{
            Yii::app()->instagram->model->openAuthorizationUrl();     
        }
           
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
    
    public function actionSearch($s){
    
        if(!$s)
            die("Please enter search term");
        
        //user search    
        $response = json_decode(Yii::app()->instagram->model->searchUser($s),true);
        $data = $response['data']; 
        $userProvider=new CArrayDataProvider($data, array('id'=>'id', 'pagination'=>false));
        //tag search
        $response = json_decode(Yii::app()->instagram->model->searchTags($s),true);
        $data = $response['data']; 
        $tagProvider=new CArrayDataProvider($data, array('keyField'=>'media_count', 'pagination'=>false));
                    
        $this->render('search',array(
                                'userProvider'=>$userProvider,
                                'tagProvider'=>$tagProvider,
        ));
    }
    
    
}