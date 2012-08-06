<div class="row">
    <div class="span3">
        <h2>Users</h2>
        <ul class="thumbnails">
        <?php $this->widget('zii.widgets.CListView', array(
            'summaryText'=> '',
            'dataProvider'=>$userProvider,
            'itemView'=>'_search_usr',
        )); ?>
        </ul>
    </div>
    <div class="span3">
        <h2>Tags</h2>
        <ul class="thumbnails">
        <?php $this->widget('zii.widgets.CListView', array(
            'summaryText'=> '',
            'dataProvider'=>$tagProvider,
            'itemView'=>'_search_tags',
        )); ?>
        </ul>
    </div>
</div>