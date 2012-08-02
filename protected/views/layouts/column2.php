<?php $this->beginContent('//layouts/main'); ?>

<div class="container">
    <div class="row">
        <div class="span3">
            <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title'=>'Operations',
                ));
                $this->widget('zii.widgets.CMenu', array(
                    'items'=>$this->menu,
                    'htmlOptions'=>array('class'=>'operations'),
                ));
                $this->endWidget();
            ?>
        </div>
        <div class="span9">
            <?php echo $content; ?>
        </div>
    </div>
</div>

<?php $this->endContent(); ?>
