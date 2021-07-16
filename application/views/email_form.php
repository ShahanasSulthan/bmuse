<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Email Form</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('/assets/js/jquery.validate.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/ckeditor/ckeditor.js'); ?>"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.9/adapters/jquery.js"></script>
</head>
<body>
	<div class="container-fluid">
        <div class="row" style="margin-top:25px">			
			<div class="col-lg-12" style="text-align:center">  
				<h3>Send Notification</h3>          
			</div>			
			<div class="col-lg-12">
				<form method="post" id="form_notification" name="form_notification" action="<?php echo base_url('/admin/sendNotification'); ?>">
					<div class="row">	
						<div class="col-lg-12" style="margin:25px 0px;text-align:center">
							<input type="button" id="btn" value="Send Notification" class="btn btn-success btn-xs">
						</div>
					</div>		
					<div class="row">
						<div class="col-lg-2">							
						</div>
						<div class="col-lg-8">
							
							<div class="row">								
								<div class="col-lg-12">
								<textarea name="editor1" id="editor1" rows="10" cols="80">
									
								</textarea>
									
								</div>
								
							</div>
							
						</div>
						<div class="col-lg-2">							
						</div>
					</div>
					
				</form>
			</div>         
		</div>
	</div>	
</body>

<script>
	CKEDITOR.replace( 'editor1' );
	$(document).ready(function(){
		$('textarea[name="DSC"]').ckeditor();
		$('#btn').on('click', function(e) {
			var editorData= CKEDITOR.instances['editor1'].getData();
            if(editorData==''){
				alert("Please add notification text");
				return false;
			}
			$('#form_notification').submit();
		})
	});
	
	
	
</script>
<style>
	.error {
		color: red;
	}
</style>
</html>