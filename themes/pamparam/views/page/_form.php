<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/thickbox/thickbox.js', CClientScript::POS_HEAD); ?>
<?php Yii::app()->clientScript->registerCSSFile(Yii::app()->request->baseUrl.'/js/thickbox/thickbox.css'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/ckeditor/ckeditor.js', CClientScript::POS_HEAD); ?>

<?php if(isset($_POST['previewPage']) && !$model->hasErrors()): ?>
<h3><?php echo Yii::t('lan','Preview'); ?></h3>
<!-- page -->
<div class="page">
    <h2 class="title">
        <?php echo CHtml::encode($model->title); ?>
    </h2>
    <div class="entry">
        <?php echo $model->content; ?>
    </div>
    <div class="pagemetadata">
        <span class="page_author">
            <?php echo Yii::app()->user->username; ?>
        </span>
        <span class="page_date">
            <? echo Yii::t('lan',date('F',$model->createTime)).date(' j, Y H:i',$model->createTime); ?>
        </span>
        <span class="page_dateupdate">
            <?php echo Yii::t('lan','Last updated on'); ?> <?php echo Yii::t('lan',date('F',$model->updateTime)).date(' j, Y H:i',$model->updateTime); ?>
        </span>
    </div>
</div>
<!-- /page -->
<?php endif; ?>

<div class="form">

<?php echo CHtml::beginForm('#preview-page'); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="row">
    <?php echo CHtml::activeLabel($model,'title'); ?>
    <?php echo CHtml::activeTextField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
</div>
<div class="row">
    <?php echo CHtml::activeLabel($model,'content'); ?>
    <?php echo CHtml::activeTextArea($model,'content',array('rows'=>6, 'cols'=>70)); ?>
</div>
<div class="row">
    <?php echo CHtml::activeLabel($model,'status'); ?>
    <?php echo CHtml::activeDropDownList($model,'status',Page::model()->statusOptions); ?>
</div>

<div class="action">
    <?php echo CHtml::submitButton($update ? Yii::t('lan','Save') : Yii::t('lan','Create'),array('name'=>'submitPage')); ?>
    <?php echo CHtml::submitButton(Yii::t('lan','Preview'),array('name'=>'previewPage')); ?>
</div>

<?php echo CHtml::endForm(); ?>
</div>

<script type="text/javascript">
/*<![CDATA[*/

CKEDITOR.config.resize_minWidth = 570;
CKEDITOR.config.language = '<?php echo Yii::t('lan','en'); ?>';
var insertimageorfile="<?php echo $this->createUrl('filem/admin', array('TB_iframe'=>true,'height'=>350)); ?>"
CKEDITOR.config.uiColor = '#b8d6e5'

CKEDITOR.config.toolbar=
    [
        ['Maximize'],['Source'],['Bold','Italic','Underline','Strike'],
        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['Link','Unlink'],
        '/',
        ['PasteText','PasteFromWord'],['Undo','Redo'],
        ['Format'],
        ['TextColor','BGColor'],
        ['Image','Flash','Table','SpecialChar'],
        ['InsertImageOrFile']
    ];

editor = CKEDITOR.replace('Page[content]');
/*]]>*/
</script>
