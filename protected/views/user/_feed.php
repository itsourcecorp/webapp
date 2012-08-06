<li class="span2">
    <div class="thumbnail">
        <div class="meta">
            <h3><?php echo $data['user']['username'] ?></h3>
            <div class="created-time"><?php echo date('m/d/y h:m:s', $data['created_time'] ) ?></div>
        </div>
        <img src="<?php echo $data['images']['thumbnail']['url']; ?>" />
    </div>
</li>
<!-- <span><?php  var_dump( $data['caption'] ) ?> </span>   -->
