<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<body>
	<div class="container" style="padding: 20px;width:75%;margin-top: 50px;">
		<a href="<?php echo base_url('register');?>"><button class="btn btn-primary btn-lg">Add</button></a><br><br>
		<table class="table" id="myTable">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Address</th>
		      <th scope="col">Email</th>
		      <th scope="col">Phone</th>
		      <th scope="col">DOB</th>
		      <th scope="col">Image</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		if(!empty($val)){
		  			$i=1;
		  			foreach($val as $values){ ?>
		  				<tr>
					      <th scope="row"><?php echo $i;?></th>
					      <td><?php echo $values->emp_name;?></td>
					      <td><?php echo $values->address;?></td>
					      <td><?php echo $values->email;?></td>
					      <td><?php echo $values->phone;?></td>
					      <td><?php echo $values->dob;?></td>
					      <td>
					      	<?php if(!isset($values->photo)){?>
					      		<img src="<?php echo base_url('uploads/');?><?php echo $values->image;?>" style="width: 50px;">
					      	<?php }else{ echo 'No Image';} ?>
					      </td>
					      <td>
					      	<a href="<?php echo base_url('edit/');?><?php echo $values->id;?>">Edit</a>
					      	<a href="<?php echo base_url('');?>delete/<?php echo $values->id;?>">Delete</a>
					      </td>
					    </tr>
		  			<?php $i++; }
		  		}else{ ?>
		  			<tr>
				      No Data Found.....
				    </tr>
		  		<?php }	?>
		    
		  </tbody>
		</table>


	</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
	    $('#myTable').DataTable();
	} );
</script>