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
        <div class="row" style="margin-top:25px">			
			<div class="col-lg-12" style="text-align:center">  
				<h3>Admin</h3>          
			</div>			
			<div class="col-lg-12">
				<form method="post" id="email_form" name="email_form" action="<?php echo base_url('/admin/emailform'); ?>">
					<div class="row">
						<div class="col-lg-2">							
						</div>
						<div class="col-lg-8">	
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
								<div class="col-lg-6" style="margin:25px 0px;text-align:center">
									<input type="button" value="Send Email" class="btn btn-success btn-xs" onclick="showEmailModalWindow();">
								</div>
								<div class="col-lg-6" style="margin:25px 0px;text-align:center">
									<input type="button" value="Delete Subscribers" class="btn btn-danger btn-xs" onclick="deleteSubscriber()">
								</div>
								<div class="col-lg-12">
									<table class="table">
										<thead>
											<tr>
											<th scope="col">#</th>
											<th scope="col">Id</th>
											<th scope="col">Name</th>
											<th scope="col">Email</th>
											</tr>
										</thead>
										<tbody>
											<?php
												if(isset($subscribers) && sizeof($subscribers)>0){
													foreach($subscribers as $subscriber){
														echo '<tr>
															<th scope="row"><input type="checkbox" data-id="'.$subscriber['id'].'" class="select-subscriber" style="cursor:pointer"></th>
															<td>'.$subscriber['id'].'</td>
															<td>'.$subscriber['name'].'</td>
															<td>'.$subscriber['email'].'</td>
														</tr>';
													}
												}else{
													echo 'No Subscribers found';
												}

											?>
											
											
										</tbody>
									</table>
									<input type="hidden" name="ids" id="ids">
									<input type="hidden" name="action" id="action">
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
	
	function showEmailModalWindow(){
		var searchIDs = $(".select-subscriber:checked").map(function(){
			return $(this).data('id');
		}).get();
		if(searchIDs.length>0){
			$('#ids').val(searchIDs.join());
			$('#email_form').submit();
		}else{
			alert("Please select subscribers");
			return false;
		}
	}
	function deleteSubscriber(){
		var searchIDs = $(".select-subscriber:checked").map(function(){
			return $(this).data('id');
		}).get();
		
		if(searchIDs.length>0){
			$('#ids').val(searchIDs.join());
			$('#action').val('delete');
			$('#email_form').submit();
		}else{
			alert("Please select subscribers");
			return false;
		}
	}
	
	
</script>
<style>
	.error {
		color: red;
	}
</style>
</html>