<?php
require('base.php');

$content = bu::view('preview',array('name'=>$_GET['img']));

echo bu::view('index',
              array('title'=>bu::lang('linksTitle'),
                    'content'=>$content));
