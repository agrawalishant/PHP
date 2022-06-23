
<?php
//$page_name="dashboard";
//$loginType="admin";

$loginType = $this->session->userdata('admintype');
$session = $this->session->userdata('adminemail');
$sess_name = $this->session->userdata('adminname');
$id = $this->session->userdata('adminid');
$adminlevel = $this->session->userdata('adminlevel');

$getdata = $this->db->get_where('admin', array('id' => $id))->row();
$level = $getdata->level;
$name=$getdata->name;
$email = $getdata->email;

if ($session == '') {
    redirect(base_url(), 'login_page', 'refresh');
}

?>

<?php include "admininclude/header.php"?>

  <!-- Main Sidebar Container -->
 <!-- sidemunu -->
 <?php include "admininclude/sidemenu.php"?>


  <!-- Content Wrapper. Contains page content -->
  

<!-- dashboard middle content -->
<?php include $loginType . '/' . $page_name . '.php';?>

  <!-- /.content-wrapper -->
  
  <!-- footer -->
  <?php include "admininclude/footer.php"?>
  
  <!-- for form contact mobile no -->
<script type="text/javascript">
   $("#contact_mobilenumber").on("input", function() {
  var nonNumReg = /[^0-9]/g
  $(this).val($(this).val().replace(nonNumReg, ''));
});
    </script>

  