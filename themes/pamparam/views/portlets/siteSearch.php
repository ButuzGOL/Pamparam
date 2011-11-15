<?php echo CHtml::beginForm($this->getController()->createUrl('post/search')); ?>
    <?php echo CHtml::activeTextField($form,'keyword',array('encode'=>false,'value'=>Yii::t('lan','Site Search').'...','class'=>'search','onclick'=>"this.value=''",'onblur'=>"if(this.value=='') this.value='".Yii::t('lan','Site Search')."'+'...';")); ?>
    <?php echo CHtml::imageButton(Yii::app()->theme->baseUrl.'/images/site_search.png',array('style'=>'margin:0px 0px -3px -15px;')); ?>
<?php echo CHtml::endForm(); ?>
