<?php 
require('base.php');

$content = bu::view('form');
echo bu::view('index',
              array('title'=>'Image uploader',
                    'content'=>$content));
