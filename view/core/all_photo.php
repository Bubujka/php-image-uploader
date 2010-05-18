<div id='previewBlock'>
    <?php $count = count($data); 
          for($i=0;$i<$count; $i++):
              $v = $data[$i];
              ?>
        <a href='/links.php?img=<?php echo $v?>' class='previewImage'>
            <img src='/small<?php echo $v;?>'>
        </a><br>
        <?php if($i != $count-1):?>
            <div class='hr'></div>
        <?php endif;?>
    <?php endfor;?>
</div>
