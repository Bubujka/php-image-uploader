<?php 
require('base.php');
$fileType = $_FILES['img']['type'];
$tmpName = $_FILES['img']['tmp_name'];
$allowedExtension = array('gif','jpg','png');

if(!in_array(mimeTypeToExtension($fileType),$allowedExtension))
    throw new Exception('Wrong image type!');

function rand_str($length = 32, $chars = 'abcdefghijklmnopqrstuvwxyz') {
    //kyle dot florence [@t] gmail dot com
    //http://php.net/manual/en/function.rand.php
    $chars_length = (strlen($chars) - 1);
    $string = $chars{rand(0, $chars_length)};
    for ($i = 1; $i < $length; $i = strlen($string)) {
        $r = $chars{rand(0, $chars_length)};
        if ($r != $string{$i - 1}) $string .=  $r;
    }
    return $string;
}

function makePathForString($string, $fileType){
    return getDirForString($string).'/'.$string.'.'.mimeTypeToExtension($fileType);
}

function getDirForString($string){
    $f = substr($string,0,1);
    $s = substr($string,1,1);
    return UPLOAD_PATH.'/'.$f.'/'.$s;
}
function getMimeType_ExtensionTable(){
    return array('image/gif'=>'gif',
                 'image/jpeg'=>'jpg',
                 'image/png'=>'png');
}
function mimeTypeToExtension($mimeType){
    $data = getMimeType_ExtensionTable();
    return $data[$mimeType];
}
function extensionToMimeType($extension){
    $data = array_flip(getMimeType_ExtensionTable());
    return $data[$extension];
}

function getUniqueName($fileType){
    $name = rand_str(10);
    while(file_exists(makePathForString($name,$fileType)))
        $name = rand_str(10);
    return $name;
}

$name = getUniqueName($fileType);
$finalDir = getDirForString($name);
if(!file_exists($finalDir))
    mkdir($finalDir,0775,true);
move_uploaded_file($tmpName, makePathForString($name,$fileType));

bu::redirect('/links.php?img='.$name);

#$path = makePathForString($name, $fileType);
