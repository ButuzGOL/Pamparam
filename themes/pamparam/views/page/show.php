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
            <?php echo (($model->author->username) ? CHtml::link($model->author->username,array('user/show', 'id'=>$model->authorId)):$model->authorName); ?>
        </span>
        <span class="page_date">
            <? echo Yii::t('lan',date('F',$model->createTime)).date(' j, Y H:i',$model->createTime); ?>
        </span>
        <span class="page_dateupdate">
            <?php echo Yii::t('lan','Last updated on'); ?> <?php echo Yii::t('lan',date('F',$model->updateTime)).date(' j, Y H:i',$model->updateTime); ?>
        </span>
         <?php if(Yii::app()->user->status==User::STATUS_ADMIN || Yii::app()->user->status==User::STATUS_WRITER): ?>
            <br />
            [<?php echo CHtml::ajaxLink($model->statusText,
                    $this->createUrl('page/ajaxStatus',array('id'=>$model->id)),
                    array('success'=>'function(msg){ pThis.html(msg); }'),
                    array('onclick'=>'var pThis=$(this);')); ?>]
        <?php endif; ?>
        <?php if(Yii::app()->user->status==User::STATUS_ADMIN || Yii::app()->user->status==User::STATUS_WRITER): ?>
            <?php echo CHtml::link(Yii::t('lan','Update'),array('page/update','id'=>$model->id)); ?> |
            <?php echo CHtml::linkButton(Yii::t('lan','Delete'),array(
               'submit'=>array('page/delete','id'=>$model->id),
               'confirm'=>Yii::t('lan','Are you sure to delete this page ?'),
            )); ?>
        <?php endif; ?>
    </div>
</div>
<!-- /page -->
