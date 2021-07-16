<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>News Letter Subscription</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('/assets/js/jquery.validate.js'); ?>"></script>
</head>
<body>
	<div class="container-fluid">
        <div class="row" style="margin-top:100px">			
			<div class="col-lg-12" style="text-align:center">  
				<h3>News Letter Subscription</h3>          
			</div>			
			<div class="col-lg-12">
				<form method="post" id="subscription_form" name="subscription_form" action="<?php echo base_url('/subscription/subscribe'); ?>">
					<div class="row">
						<div class="col-lg-4">							
						</div>
						<div class="col-lg-4">
							<?php
								if($this->session->flashdata('failure_msg')){
									echo '<div class="row"><div class="col-lg-12"><div class="alert alert-danger" role="alert">
									'.$this->session->flashdata('failure_msg').'
									</div></div></div>'; 
								}
								if($this->session->flashdata('success_msg')){
									echo '<div class="row"><div class="col-lg-12"><div class="alert alert-success" role="alert">
									'.$this->session->flashdata('success_msg').'
									</div></div></div>'; 
								}
							?>
							
							<div class="row">
								<div class="form-group col-lg-12">						
									<label for="first_name">Name</label>
									<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" >
									<?php echo form_error('first_name', '<div class="error">', '</div>'); ?>						
								</div>
								<div class="form-group col-lg-12">						
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" >
									<?php echo form_error('email', '<div class="error">', '</div>'); ?>						
								</div>
								<div class="form-group col-lg-12" >						
									<input class="btn btn-primary submit" type="submit" value="Subscribe" style="width:100%">					
								</div>								
							</div>
						</div>
						<div class="col-lg-4">							
						</div>
					</div>
					
				</form>
			</div>         
		</div>
	</div>	
</body>
<script>
	$(document).ready(function(){   
		$("#subscription_form").validate({
			rules: {
				name: "required",          
				email: {    
					required: true,
					email: true
				},
			},
			messages: {
				name: "Please enter your name",         
				email: "Please enter a valid email address",
			}
		});
	});
</script>
<style>
	.error {
		color: red;
	}
</style>
</html>