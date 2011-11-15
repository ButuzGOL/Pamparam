<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<?php echo CHtml::cssFile(Yii::app()->theme->baseUrl.'/css/style.css'); ?>
<?php echo CHtml::cssFile(Yii::app()->baseUrl.'/js/highslide/highslide.css'); ?>
<title><?php echo $this->pageTitle; ?></title>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/highslide/highslide.js', CClientScript::POS_HEAD); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/highslide/highslide_eh.js', CClientScript::POS_HEAD); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/highslide/highslide_eh.js', CClientScript::POS_HEAD); ?>
</head>
<body>
<!-- content_thickbox -->
<div class="content_thickbox" id="content">
    <?php echo $content; ?>
</div>
<!-- /content_thickbox -->
<script type="text/javascript">
/*<![CDATA[*/
    hs.graphicsDir = '<?php echo Yii::app()->request->baseUrl; ?>/js/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.showCredits = false;
    hs.captionEval = 'this.thumb.alt';
    hs.wrapperClassName = 'draggable-header';
    addHighSlideAttribute();
/*]]>*/
</script>
</body>

</html>
