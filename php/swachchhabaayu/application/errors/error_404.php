<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title>BOKL |404 Error</title>
  <link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet"> 
  <link href="<?php echo base_url('assets/front/css/pages/404-page.css')?>" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <figure class="error">
        <img src="<?php echo base_url('assets/front/images/broken_piggybank_blue.png')?>">
    </figure>
    <aside class="side">
        Sorry,You have encountered....
        <h4>404 error!</h4>
        You seem lost!
        <a href="<?php echo isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:base_url()?>">Back to home</a>
    </aside>
</div>

</body>

</html>
