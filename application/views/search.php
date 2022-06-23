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
