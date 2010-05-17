<?php 
require('base.php');
$fileType = $_FILES['img']['type'];
$tmpName = $_FILES['img']['tmp_name'];
$allowedExtension = bu::config('rc/allowedExtension');

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
    return $f.'/'.$s;
}
function getUrlForString($string, $fileType){
    $f = substr($string,0,1);
    $s = substr($string,1,1);
    return '/'.$f.'/'.$s.'/'.$string.'.'.mimeTypeToExtension($fileType);
}
function getMimeType_ExtensionTable(){
    return array('image/gif'=>'gif',
                 'image/jpeg'=>'jpg',
                 'image/png'=>'png');
}
function mimeTypeToExtension($mimeType){
    $data = getMimeType_ExtensionTable();
    if(isset($data[$mimeType]))
        return $data[$mimeType];
    else
        return '';
}
function extensionToMimeType($extension){
    $data = array_flip(getMimeType_ExtensionTable());
    if(isset($data[$extension]))
        return $data[$extension];
    else
        return '';
}

function getUniqueName($fileType){
    $imgNameLangth = bu::config('rc/imgNameLangth');
    $name = rand_str($imgNameLangth);
    while(file_exists(makePathForString($name,$fileType)))
        $name = rand_str($imgNameLangth);
    return $name;
}
function getExtensionFromPath($path){
    $path_parts = pathinfo($path);
    return $path_parts['extension'];
}
function resizeImage($origName, $destName, $maxWidth=false,$maxHeight=false,$quality=false){
    //http://php.net/manual/en/function.imagecopyresampled.php

    if(!$maxWidth)
        $maxWidth = bu::config('rc/maxWidth');
    if(!$maxHeight)
        $maxHeight = bu::config('rc/maxHeight');
    if(!$quality)
        $quality = bu::config('rc/quality');
    $width = $maxWidth;
    $height = $maxHeight;

    list($width_orig, $height_orig) = getimagesize($origName);

    $ratio_orig = $width_orig/$height_orig;
    if(($width_orig < $width) and ($height_orig < $height)){
        $width = $width_orig;
        $height = $height_orig;
    }elseif($width/$height > $ratio_orig) {
        $width = $height*$ratio_orig;
    }else{
        $height = $width/$ratio_orig;
    }

    $image_p = imagecreatetruecolor($width, $height);
    $extension = getExtensionFromPath($origName);
    if($extension == 'jpg')
        $image = imagecreatefromjpeg($origName);
    elseif($extension == 'gif')
        $image = imagecreatefromgif($origName);
    elseif($extension == 'png')
        $image = imagecreatefrompng($origName);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
    imagejpeg($image_p, $destName, $quality);
}

$name = getUniqueName($fileType);
$finalDir = bu::config('rc/uploadPath').'/'.getDirForString($name);
$finalSmallDir = bu::config('rc/smallImgPath').'/'.getDirForString($name);
if(!file_exists($finalDir)){
    mkdir($finalDir,0775,true);
    mkdir($finalSmallDir,0775,true);
    
}
$finalPath = bu::config('rc/uploadPath').'/'.makePathForString($name,$fileType);
$finalSmallPath = bu::config('rc/smallImgPath').'/'.makePathForString($name,$fileType);
move_uploaded_file($tmpName, $finalPath);
resizeImage($finalPath, $finalSmallPath);

bu::redirect('/links.php?img='.getUrlForString($name,$fileType));

#$path = makePathForString($name, $fileType);
