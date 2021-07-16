<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>
<body style="text-align:center">
	<div style="min-width:600px;min-height:600px;position:absolute;background:url('http://bmusewebsites.s3.amazonaws.com/test/background.jpg'); ?>);background-size: 600px 600px;">
	
	</div>
	<div style="position:absolute;z-index:999;width:500px;hight:500px;background:#ffffff;margin:0px 50px 50px 50px">
		<div style="">
			<img src="http://bmusewebsites.s3.amazonaws.com/test/logo.gif" alt="">
		</div>
		<hr>
		<div style="margin:50px;0px;min-height:100px">
			<?php 
				echo $content??'';
			?>
		</div>
		<hr>
	</div>
</body>
</html>