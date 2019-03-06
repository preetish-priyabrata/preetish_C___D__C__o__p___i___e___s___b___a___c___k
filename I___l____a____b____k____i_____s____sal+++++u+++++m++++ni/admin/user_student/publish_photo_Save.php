<?php

session_start();
ob_start();
if($_SESSION['email']){
require 'FlashMessages.php';
include '../config.php';
//$sl_no=$_GET['user_id'];
$msg = new \Preetish\FlashMessages\FlashMessages();




$imgSrc = "image.jpg";

//getting the image dimensions
list($width, $height) = getimagesize($imgSrc);

//saving the image into memory (for manipulation with GD Library)
$myImage = imagecreatefromjpeg($imgSrc);

// calculating the part of the image to use for thumbnail
if ($width > $height) {
  $y = 0;
  $x = ($width - $height) / 2;
  $smallestSide = $height;
} else {
  $x = 0;
  $y = ($height - $width) / 2;
  $smallestSide = $width;
}

// copying the part into thumbnail
$thumbSize = 100;
$thumb = imagecreatetruecolor($thumbSize, $thumbSize);
imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSize, $thumbSize, $smallestSide, $smallestSide);

}

//final output
header('Content-type: image/jpeg');
imagejpeg($thumb);
?>