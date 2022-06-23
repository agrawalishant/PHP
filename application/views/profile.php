
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<body> 
	<div style="display:flex;width:500px;">
		<?php if(!empty($result)){ ?>
		<select class="form-control" name="title" id="title">
			<option value="0">Title</option>
			<?php foreach($title as $res){ ?>
				<option value="<?php echo $res->title;?>"><?php echo $res->title;?></option>	
			<?php } ?>
		</select>
		<select class="form-control" name="location" id="location">
			<option value="0">Locations</option>
			<?php foreach($location as $res){ ?>
				<option value="<?php echo $res->job_location;?>"><?php echo $res->job_location;?></option>	
			<?php } ?>
		</select>
		<button class="btn btn-warning" id="search">Search</button>
		<?php } ?>
	</div>
	<?php  
		$user = $this->session->userdata('userDetails');
		if(!empty($user['first_name']) && !empty($user['last_name'])){
			echo 'Welcome '.$user['first_name'].' '.$user['last_name'].'<br>';
		}
	?>	
	<a href="<?php echo base_url('logout');?>"><button class="btn btn-primary">Logout</button></a>
	<a href="<?php echo base_url('addjob');?>"><button class="btn btn-primary">Post Job</button></a>
	<div id='hide'>
		<?php if(!empty($result)){ ?>
		<table style="border:1px solid;text-align: center;">
			<tr style="border:1px solid;">
				<td style="border:1px solid;">Title</td>
				<td style="border:1px solid;">Job Description</td>
				<td style="border:1px solid;">Industry Type</td>
				<td style="border:1px solid;">Role</td>
				<td style="border:1px solid;">Salary Offered</td>
				<td style="border:1px solid;">Job Location</td>
				<td style="border:1px solid;">Education</td>
				<td style="border:1px solid;">Experience</td>
				<td style="border:1px solid;">Last Application Date</td>
				<td style="border:1px solid;">Action</td>
			</tr>
			<?php 
				foreach($result as $res){ ?>
					<tr>
						<td style="border:1px solid;"><?php echo $res->title;?></td>
						<td style="border:1px solid;"><?php echo $res->job_description;?></td>
						<td style="border:1px solid;"><?php echo $res->industry_type;?></td>
						<td style="border:1px solid;"><?php echo $res->role;?></td>
						<td style="border:1px solid;"><?php echo $res->salary_offered;?></td>
						<td style="border:1px solid;"><?php echo $res->job_location;?></td>
						<td style="border:1px solid;"><?php echo $res->education;?></td>
						<td style="border:1px solid;"><?php echo $res->exp;?></td>
						<td style="border:1px solid;"><?php echo $res->last_application_date;?></td>
						<td style="border:1px solid;">
							<?php 
							$user = $this->session->userdata('userDetails');
							$userId = $user['id'];
							if($res->user_id!=$userId){ ?>
								<button class="btn btn-primary" style="width:120px;"><a href="<?php echo base_url('comment/'.$res->id);?>" style="color:white;">Comment</a></button>
							<?php }else{ ?>
								<button class="btn btn-warning"><a href="<?php echo base_url('edit/'.$res->id);?>" style="color:white;">Edit</a></button>
								<button class="btn btn-danger"><a href="<?php echo base_url('delete/'.$res->id);?>" style="color:white;">Delete</a></button>
							<?php } ?>
						</td>
					</tr>
			<?php } ?>
		</table>
		<?php } ?>
	</div><div id='show'></div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
	$("#search").click(function(){
		var title = $('#title').val();
		var location = $('#location').val();

		$.ajax({
	        type: "POST",
	        url: "<?php echo site_url('welcome/search'); ?>",
	        data: {title:title,location:location},
	        dataType: "JSON",
	        success: function(res){
	        	$('#hide').hide();
	        	$('#show').empty();
	        	$('#show').html(res.data);
	        }
	   	});
	});
</script>