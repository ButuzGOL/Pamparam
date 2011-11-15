<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<?php echo CHtml::cssFile(Yii::app()->theme->baseUrl.'/css/style.css'); ?>
<title><?php echo Yii::t('lan','Error'); ?> <?php echo $data['code']; ?></title>
</head>
<body>
<!-- wrapper -->
<div class="wrapper">
    <!-- mainmenu -->
    <div id="mainmenu">
        <ul>
            <li class="first"><?php echo CHtml::link('Перейти на Главную',Yii::app()->homeUrl); ?></li>
        </ul>
    </div>
    <!-- /mainmenu -->
    <!-- header -->
    <div id="header">
        <div id="header_description">
            <h2><?php echo Yii::t('lan','Error'); ?> <?php echo $data['code']; ?></h2>
            <p>
                <?php echo nl2br(CHtml::encode($data['message'])); ?>
            </p>
            <p>
                <?php echo Yii::t('lan','The above error occurred when the Web server was processing your request.'); ?>
            </p>
            <p>
                <?php echo Yii::t('lan','If you think this is a server error, please contact'); ?>
                <?php echo CHtml::mailto(Yii::app()->params['adminEmail']); ?>.
            </p>
            <p>
                <?php echo CHtml::link(Yii::t('lan','Return to homepage'),Yii::app()->homeUrl); ?>
            </p>
        </div>
        <!-- header_logo -->
        <div id="header_logo">
            <?php echo CHtml::link(Yii::app()->params['title'],Yii::app()->homeUrl,array('id'=>'logo')); ?>
            <div class="description"><?php echo CHtml::encode(Yii::app()->params['description']); ?></div>
        </div>
        <!-- /header_logo -->
    </div>
    <!-- /header -->
</div>
<!-- /wrapper -->
</body>
</html>
