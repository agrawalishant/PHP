<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<div style="width:500px;margin-left:10px;">
	<div>Post Your Comments:</div>
	<form method="post" action="<?php echo base_url('commentSubmit');?>" style="display:flex;">
		<?php 
			$user = $this->session->userdata('userDetails');
			$userId = $user['id'];
		?>
		<input type="hidden" name="userid" value="<?php echo $userId;?>">
		<input type="hidden" name="jobid" value="<?php echo $result[0]->id;?>">
		<textarea name="comments" style="width:100%;height:75px;"></textarea>
		<button class="btn btn-warning" id="post" style="height: 50px;width: 75px;margin: 10px;">Post</button>
		<button class="btn btn-primary btn-lg" style="height: 50px;width: 75px;margin: 10px;" onclick="history.back()">Back</button>
	</form>
</div>

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
				<?php 
					$user = $this->session->userdata('userDetails');
					$userId = $user['id'];
				?>
			</tr>
	<?php } ?>
</table>
<div>See All Comments:</div>
<table style="border:1px solid;margin-top: 5px;">
	<tr style="border:1px solid;">
		<td style="border:1px solid;">Name</td>
		<td style="border:1px solid;">Comments</td>
	</tr>
<?php foreach($comment as $res){ ?>
		<tr style="border:1px solid;">
			<td style="border:1px solid;"><?php echo $res->first_name; ?></td>
			<td style="border:1px solid;"><?php echo $res->message; ?></td>
		</tr>
	<?php } ?>
</table>