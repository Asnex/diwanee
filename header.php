<?php
require_once './class.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php $instance->setTitle();?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
      rel="stylesheet" 
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
      crossorigin="anonymous">
        <link rel="stylesheet" href="./css/diwanee.css">
        <link rel="icon" href="./images/diwanee.ico" type="image/x-icon" />

    </head>
    <div class="col-md-12">
    <div class="col-md-5"></div>  
    <div class="col-md-2"><?php $instance->coverPhoto();?></div> 
    <div class="col-md-5"></div> 
    </div>
   