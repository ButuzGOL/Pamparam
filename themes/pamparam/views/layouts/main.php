<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo (($this->pageTitle)?$this->pageTitle.' - ':''); ?> <?php echo Yii::app()->params['title']; ?></title>
<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl.'/images/ico_site.ico'; ?>" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo CHtml::encode(Yii::app()->params['description']); ?>" />
<meta name="keywords" content="<?php echo CHtml::encode(Yii::app()->params['keywords']); ?>" />
<?php echo CHtml::cssFile(Yii::app()->theme->baseUrl.'/css/style.css'); ?>
<?php echo CHtml::cssFile(Yii::app()->baseUrl.'/js/highslide/highslide.css'); ?>
<?php Yii::app()->clientScript->registerLinkTag('alternate','application/rss+xml',$this->createUrl('site/postFeed')); ?>
<?php Yii::app()->clientScript->registerLinkTag('alternate','application/rss+xml',$this->createUrl('site/commentFeed')); ?>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/highslide/highslide.js', CClientScript::POS_HEAD); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/highslide/highslide_eh.js', CClientScript::POS_HEAD); ?>
</head>

<body>
<!-- wrapper -->
<div class="wrapper">
    <!-- mainmenu -->
    <div id="mainmenu">
        <ul>
            <li class="first"><?php echo CHtml::link('Главная',Yii::app()->homeUrl); ?></li>
            <li><?php echo CHtml::link('Категории',$this->createUrl('category/list')); ?></li>
            <li><?php echo CHtml::link('Мои проекты',$this->createUrl('category/show',array('slug'=>'moi-proekti'))); ?></li>
            <li><?php echo CHtml::link('Про меня',$this->createUrl('page/show',array('slug'=>'pro-menya'))); ?></li>
        </ul>
    </div>
    <!-- /mainmenu -->
    <!-- header -->
    <div id="header">
        <div id="header_description">
            <ul>
                <li>
            <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/download_yiiblog.png','Скачать Yii blog new'),'http://www.pamparam.net/uploads/file/yiiblognew.zip',array('title'=>'Скачать Yii blog new')); ?>
                </li><li>
            <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/download_ole.png','Скачать OpenLampEngine'),'http://www.pamparam.net/uploads/file/ole.zip',array('title'=>'Скачать OpenLampEngine')); ?>
                </li><li>
            <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/facebook.png','Я в Facebook'),'http://www.facebook.com/profile.php?id=1451332451',array('title'=>'Я в Facebook')); ?>
                </li><li>
            <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/twitter.png','Я в Twitter'),'http://twitter.com/ButuzGOL',array('title'=>'Я в Twitter')); ?>
                </li><li>
            <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/feed.png','Подписка на статьи RSS'),$this->createUrl('site/postFeed'),array('title'=>'Подписка на статьи RSS')); ?>
                </li>
            </ul>
        </div>
        <!-- header_logo -->
        <div id="header_logo">
            <?php echo CHtml::link(Yii::app()->params['title'],Yii::app()->homeUrl,array('id'=>'logo')); ?>
        </div>
        <!-- /header_logo -->
    </div>
    <!-- /header -->
    <!-- body -->
    <div id="body">
        <!-- body_top -->
        <div>
            <!-- body_end -->
            <div>
                <!-- content -->
                <div id="content">
                    <?php if(Yii::app()->user->hasFlash('message')): ?>
                        <br />
                        <div class="message">
                            <?php echo Yii::app()->user->getFlash('message'); ?>
                        </div>
                    <?php endif; ?>
                    <?php echo $content; ?>
                </div>
                <!-- /content -->
               <div id="sidebar">
               		<!--<script type="text/javascript" src="http://www.ubuntu.com/files/countdown/display1.js"></script>-->
<a href="http://www.ubuntu.com/"><img src="http://www.ubuntu.com/countdown/banner1.png" border="0" width="180" height="150" alt="The next version of Ubuntu is coming soon"></a>
                    <?php if(Yii::app()->user->isGuest): ?>
                        <div class="login">
                            <?php echo CHtml::link('Вход',$this->createUrl('user/login')); ?>
                            <?php echo CHtml::link('Регистрация',$this->createUrl('user/registration')); ?>
                        </div>
                    <?php endif; ?>
                    <?php $this->widget('SiteSearch'); ?>
                    <?php $this->widget('UserMenu',array('visible'=>!Yii::app()->user->isGuest)); ?>
                    <?php $this->widget('TagCloud'); ?>
                    <?php $this->widget('PopularPosts'); ?>
                    <?php $this->widget('Categories'); ?>
                </div>
                <!-- /sidebar -->
            </div>
            <!-- /body_end -->
        </div>
        <!-- /body_top -->
    </div>
    <!-- /body -->
</div>
<!-- /wrapper -->
<!-- footer_sidebar_wrapper -->
<div id="footer_sidebar_wrapper">
<!-- footer_sidebar_inner -->
    <div id="footer_sidebar_inner">
    <!-- footer_sidebar -->
        <div id="footer_sidebar">
                    <?php $this->widget('MonthlyArchives'); ?>
                    <?php $this->widget('RecentPosts'); ?>
            <?php $this->widget('RecentComments'); ?>
                    <div class="copyrights">
                        <?php echo CHtml::link('Главная',Yii::app()->homeUrl); ?> | <?php echo CHtml::link('Категории',$this->createUrl('category/list')); ?> | <?php echo CHtml::link('Мои проекты',$this->createUrl('category/show',array('slug'=>'moi-proekti'))); ?> | <?php echo CHtml::link('Про меня',$this->createUrl('page/show',array('slug'=>'pro-menya'))); ?><br />
                        <p>
                        <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/footer_logo.png',Yii::app()->params['title']),Yii::app()->homeUrl,array('style'=>'float:left; margin-right:5px;')); ?>
                        <?php echo Yii::app()->params['copyrightInfo']; ?><br/>
                        All Rights Reserved.<br/>
                        <?php echo Yii::powered(); ?></p>
                        Время генерации страницы: <?php echo round(CLogger::getExecutionTime(),4); ?> сек.
                    </div>
            <!-- /copyrights -->
        </div>
        <!-- /footer_sidebar -->
    </div>
    <!-- footer_sidebar_inner -->
</div>
<!-- footer_sidebar_wrapper -->

<script type="text/javascript">
/* <![CDATA[ */
    hs.graphicsDir = '<?php echo Yii::app()->request->baseUrl; ?>/js/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.showCredits = false;
    hs.captionEval = 'this.thumb.alt';
    hs.wrapperClassName = 'draggable-header';
    addHighSlideAttribute();
/* ]]> */
</script>
<script type="text/javascript">
/* <![CDATA[ */
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
/* ]]> */
</script>
<script type="text/javascript">
/* <![CDATA[ */
try{
var pageTracker = _gat._getTracker("UA-8477041-1");
pageTracker._trackPageview();
} catch(err) {}
/* ]]> */
</script>
</body>
</html>

