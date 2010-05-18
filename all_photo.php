<?php 
require('base.php');
$data = glob(bu::config('rc/uploadPath').'/*/*/*');
$filteredData = array();
foreach ($data as $v)
    $filteredData[] = str_replace(bu::config('rc/uploadPath'),
                                '',
                                $v);

$content = bu::view('all_photo',array('data'=>$filteredData));
echo bu::view('index',
              array('title'=>bu::lang('indexTitle'),
                    'content'=>$content));
