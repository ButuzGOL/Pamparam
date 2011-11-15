<!-- post -->
<div class="post">
    <h2 class="title">
        <?php if($model->category): ?>
            <span class="titlecategory">
                <?php echo CHtml::link(CHtml::encode($model->category->name),array('category/show','slug'=>$model->category->slug)); ?>
            </span> &rarr;
        <?php endif; ?>
        <?php if(!$model->titleLink): ?>
            <?php echo CHtml::link(CHtml::encode($model->title),array('post/show','slug'=>$model->slug)); ?>
        <?php else: ?>
            <span class="titlelink">
                <?php echo CHtml::link(CHtml::encode($model->title),$model->titleLink); ?>
            </span>
        <?php endif; ?>
    </h2>
    <div class="entry">
        <?php echo $model->contentshort; ?>
        <?php if($model->contentbig): ?>
            <span class="readmore">
                <?php echo CHtml::link(Yii::t('lan','Read more'),array('post/show','slug'=>$model->slug,'#'=>'post-more')); ?>
            </span>
        <?php endif; ?>
    </div>
    <div class="postmetadata">
        <span class="post_tag"><?php echo Post::getTagLinks($model); ?></span>
        <br />
        <span class="post_comment">
            <?php echo CHtml::link(Yii::t('lan','Comments')." ({$model->commentCount})",array('post/show','slug'=>$model->slug,'#'=>'comments')); ?>
        </span>
         <?php if(!Yii::app()->user->isGuest): ?>
            <span class="post_bookmark">
                <?php echo CHtml::ajaxLink((($model->bookmarks)?Yii::t('lan','Delete'):Yii::t('lan','Add')).' '.Yii::t('lan','Bookmark'),
                        $this->createUrl('post/ajaxBookmark',array('id'=>$model->id)),
                        array('success'=>'function(msg){ pThis.html(msg+" '.Yii::t('lan','Bookmark').'") }'),
                        array('onclick'=>'var pThis=$(this);')); ?>
            </span>
        <?php endif; ?>
        <span class="post_date"><? echo Yii::t('lan',date('F',$model->createTime)).date(' j, Y H:i',$model->createTime); ?></span> 
        <span class="post_author">
            <?php echo (($model->author->username) ? $model->author->username:$model->authorName); ?>
        </span>
        <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/in_twitter.png',Yii::t('lan','In Twitter')),'http://twitter.com/home/?status='.$this->createAbsoluteUrl('post/show',array('slug'=>$model->slug)).' '.$model->title.' %23pamparam'); ?>
        <?php if(Yii::app()->user->status==User::STATUS_ADMIN || Yii::app()->user->status==User::STATUS_WRITER): ?>
            <br />
            <?php echo CHtml::link(Yii::t('lan','Update'),array('post/update','id'=>$model->id)); ?> |
            <?php echo CHtml::linkButton(Yii::t('lan','Delete'),array(
                'submit'=>array('post/delete','id'=>$model->id),
                'confirm'=>Yii::t('lan','Are you sure to delete this post ?'),
            )); ?>
        <?php endif; ?>
    </div>
</div>
<!-- /post -->
