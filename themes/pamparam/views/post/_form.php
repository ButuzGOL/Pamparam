<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/thickbox/thickbox.js', CClientScript::POS_HEAD); ?>
<?php Yii::app()->clientScript->registerCSSFile(Yii::app()->request->baseUrl.'/js/thickbox/thickbox.css'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/ckeditor/ckeditor.js', CClientScript::POS_HEAD); ?>

<?php if(isset($_POST['previewPost']) && !$model->hasErrors()): ?>
<h3><?php echo Yii::t('lan','Preview'); ?></h3>
<!-- post -->
<div class="post">
    <h2 class="title">
        <?php if(!$model->titleLink): ?>
            <?php echo CHtml::encode($model->title); ?>
        <?php else: ?>
            <span class="titlelink">
                <?php echo CHtml::link(CHtml::encode($model->title),$model->titleLink); ?>
            </span>
        <?php endif; ?>
    </h2>
    <div class="entry" id="prevshort"><?php echo $model->contentshort; ?></div>
    <div class="entry" id="prevbig" style="display:none;"><?php echo $model->contentbig; ?></div>
    <?php if($model->contentbig): ?>
    <div class="entry" style="margin-top:-20px;">
        <span class="readmore">
            <?php echo CHtml::link(Yii::t('lan','Read more'),'#preview-post',array('id'=>'prevread')); ?>
        </span>
    </div>
    <?php endif; ?>
    <div class="postmetadata">
        <?php if($model->categoryId): ?>
            <span class="post_category">
                <?php echo Yii::t('lan','Category'); ?>: 
                <?php echo CHtml::encode(Category::model()->findByPK($model->categoryId)->name); ?>
            </span>
        <?php endif; ?>
        <span class="post_tag"><?php echo $model->tags; ?></span>
        <br />
        <span class="post_author">
            <?php echo Yii::app()->user->username; ?>
        </span>
        <span class="post_date"><? echo Yii::t('lan',date('F',$model->createTime)).date(' j, Y H:i',$model->createTime); ?></span>
    </div>
</div>
<!-- /post -->
<?php endif; ?>

<div class="form">

<?php echo CHtml::beginForm('#preview-post'); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="row">
    <?php echo CHtml::activeLabel($model,'title'); ?>
    <?php echo CHtml::activeTextField($model,'title',array('size'=>60,'maxlength'=>128,'id'=>'title')); ?>
</div>
<div class="row">
    <?php echo CHtml::activeLabel($model,'titleLink'); ?>
    <?php echo CHtml::activeTextField($model,'titleLink',array('size'=>60,'maxlength'=>128)); ?>
</div>
<div class="row">
    <?php echo CHtml::activeLabel($model,'categoryId'); ?>
    <?php echo CHtml::activeDropDownList($model,'categoryId',CHtml::listData(Category::model()->findAll(array('select'=>'id, name')),'id','name'),array('prompt'=>'')); ?>
</div>
<div class="row">
    <?php echo CHtml::activeLabel($model,'content'); ?>
    <?php echo CHtml::activeTextArea($model,'content',array('rows'=>6, 'cols'=>70,'id'=>'go')); ?>
    
</div>
<div class="row">
    <?php echo CHtml::activeLabel($model,'tags'); ?>
    <?php echo CHtml::activeTextField($model,'tags',array('size'=>60)); ?>
    <p class="hint">
        <?php echo Yii::t('lan','Separate different tags with commas.'); ?>
    </p>
</div>

<?php if(Yii::app()->user->status==User::STATUS_ADMIN || Yii::app()->user->status==User::STATUS_WRITER): ?>
    <div class="row">
        <?php echo CHtml::activeLabel($model,'status'); ?>
        <?php echo CHtml::activeDropDownList($model,'status',Post::model()->statusOptions); ?>
    </div>
<?php endif; ?>

<div class="action">
    <?php echo CHtml::submitButton($update ? Yii::t('lan','Save') : Yii::t('lan','Create'),array('name'=>'submitPost')); ?>
    <?php echo CHtml::submitButton(Yii::t('lan','Preview'),array('name'=>'previewPost')); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div>

<script type="text/javascript">
/*<![CDATA[*/
var bs=false;
$(document).ready(function(){
    $('#prevread').click(function() {
        if(bs==true) {
            $(this).html("<?php echo Yii::t('lan','Read more'); ?>"); 
            $('#prevbig').attr('style', 'display:none'); 
            $('#prevshort').attr('style', 'display:');
        }
        else {
            $(this).html("<?php echo Yii::t('lan','Read less'); ?>"); 
            $('#prevshort').attr('style', 'display:none'); 
            $('#prevbig').attr('style', 'display:');
        }
        bs=!bs;
    });
});
/*]]>*/
</script>
<script type="text/javascript">
/*<![CDATA[*/

CKEDITOR.config.resize_minWidth = 570;
CKEDITOR.config.language = '<?php echo Yii::t('lan','en'); ?>';
var insertimageorfile="<?php echo $this->createUrl('filem/admin', array('TB_iframe'=>true,'height'=>350)); ?>"
CKEDITOR.config.uiColor = '#b8d6e5'

/*CKEDITOR.config.toolbar=
    [
        ['TagMore'],['Maximize'],['Source'],['Bold','Italic','Underline','Strike'],
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
*/
<?php if(Yii::app()->user->status==User::STATUS_ADMIN || Yii::app()->user->status==User::STATUS_WRITER): ?>
CKEDITOR.config.toolbar=[['TagMore'],['Source','-','-','Templates'],
    ['Print', 'SpellChecker', 'Scayt'],
    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Link','Unlink','Anchor'],
    ['Image','Flash','Table','SpecialChar','PageBreak'],
    '/',
    ['Format','Font','FontSize'],
    ['TextColor','BGColor'],
    ['Maximize', 'ShowBlocks'],['InsertImageOrFile']];
<?php else: ?>
CKEDITOR.config.toolbar=[['TagMore'],['Maximize'],['Source'],['Bold','Italic','Underline','Strike'],
        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['Link','Unlink'],
        '/',
        ['PasteText','PasteFromWord'],['Undo','Redo'],
        ['Format'],
        ['TextColor','BGColor'],
        ['Image','Flash','Table','SpecialChar']];
<?php endif; ?>
editor = CKEDITOR.replace('Post[content]');
/*]]>*/
</script>
