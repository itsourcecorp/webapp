<ul class="thumbnails">
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model,
    'itemView'=>'_feed',
)); ?>
</ul>
<?php var_dump($model->data) ?>