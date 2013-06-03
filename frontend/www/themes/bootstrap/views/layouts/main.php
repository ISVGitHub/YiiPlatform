<?php
	Yii::app()->clientscript
		->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap.css' )
		->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap-responsive.css' )
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $this->pageTitle; ?></title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Le styles -->
<style>
	body {
		padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
	}

	@media (max-width: 980px) {
		body{
			padding-top: 0px;
		}
	}
</style>

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
<!--Uncomment when required-->
<!--<link rel="apple-touch-icon" href="images/apple-touch-icon.png">-->
<!--<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">-->
<!--<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">-->
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'type' => 'inverse', // null or 'inverse'
    'brand' => Yii::app()->name,
    'brandUrl' => '#',
    'collapse' => true, // requires bootstrap-responsive.css
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbMenu',
            'items' => array(
                array('label' => 'Home', 'url' => array('/site/index')),
                array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                array('label' => 'Contact', 'url' => array('/site/contact')),
                array('label' => 'Login', 'url' => array('/user/login'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
            ),
        ),

        (!Yii::app()->user->isGuest) ?

            '<p class="navbar-text pull-right">'

            .Yii::app()->getModule('user')->user()->profile->firstname.
            ' '
            .Yii::app()->getModule('user')->user()->profile->lastname.

            '</p>' : '',

        array(
            'class' => 'bootstrap.widgets.TbMenu',
            'htmlOptions' => array('class' => 'pull-right'),
            'items' => array(
                array('label' => 'Test', 'url' => array('/test'), 'visible'=>Yii::app()->getModule('user')->isAdmin()),
                '---',
                array('label' => 'Links', 'url' => '#', 'items' => array(
                    array('label' => 'List Users', 'url' => array('/user'), 'visible'=>Yii::app()->getModule('user')->isAdmin()),
                    array('label' => 'Old Login', 'url' => array('/site/login')),
                    array('label' => 'Something else here', 'url' => '#'),
                    '---',
                    array('label' => 'Separated link', 'url' => '#'),
                )),
            ),
        ),
    ),
)); ?>

	<div class="container">
		<?php echo $content ?>
	</div> <!-- /container -->
</body>
</html>
