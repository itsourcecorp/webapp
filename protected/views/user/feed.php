
<ul class="thumbnails">
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model,
    'itemView'=>'_feed',
)); ?>
</ul>