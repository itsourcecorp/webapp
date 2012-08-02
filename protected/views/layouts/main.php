<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"/>
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo Yii::app()->request->baseUrl; ?>/img/ico/apple-touch-icon-57-precomposed.png">
  </head>
  <body>
      <header>
        <nav class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'htmlOptions'=>array('class'=>'nav'),
                        'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
                        'items'=>array(
                            array('label'=>'Home', 'url'=>array('site/index')),                            
                            array(
                                'label'=>'Products',
                                'url'=>array('#'),
                                'itemOptions'=>array('class'=>'dropdown'),
                                'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>'dropdown'),
                                'items'=>array(
                                    array('label'=>'New Arrivals', 'url'=>array('product/new', 'tag'=>'new')),
                                    array('label'=>'Most Popular', 'url'=>array('product/index', 'tag'=>'popular')),
                                )
                            ),
                            array('label'=>'Contact', 'url'=>array('site/contact')),
                            array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                        ),
                    ));
                    ?>
                </div>
            </div>
        </nav>
      </header>
      <div role="main"><?php echo $content; ?></div>
      <footer>
        <nav></nav>
      </footer>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js"></script>
      <script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
      </script>
  </body>
</html>
  