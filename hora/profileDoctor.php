<?php include ('head.php');
include('session.php'); 
include('dbconnection.php');
$updrec=$qualification=$specialistin=$contactno=$biodata=$emailid=$name[0]=$name[1]=$name[2]=$doctorid="";
	if(isset($_POST["submit"]))
		{
			//$dname = $_POST[fname] ." ". $_POST[mname] ." ". $_POST[lname];
			if(isset($_SESSION["docid"]))
				{
					$resrec= mysql_query("UPDATE doctor SET 
						doctorname='$_POST[fname] $_POST[mname] $_POST[lname]', quali='$_POST[quali]',specialistin='$_POST[special]',contactno ='$_POST[contact]',emailid='$_POST[email]',biodata='$_POST[description]' WHERE docid = '$_SESSION[docid]' ");
				}
			else
				{
					$resrec= mysql_query("UPDATE doctor SET 
						doctorname='$_POST[fname] $_POST[mname] $_POST[lname]', quali='$_POST[quali]',specialistin='$_POST[special]',contactno ='$_POST[contact]',emailid='$_POST[email]',biodata='$_POST[description]' WHERE docid = '$_SESSION[docid]' ");
				}
			$updrec = "Record Updated Successfully...";
		}
	$doctorid=(isset($_SESSION['docid'])) ? $_SESSION['docid'] : '';
	//if(isset($_SESSION["docid"])){
	$resultpatientrec = mysql_query("SELECT * FROM doctor WHERE docid ='$doctorid'");
	
	while($row = mysql_fetch_array($resultpatientrec))
		{
			$wordChunks = explode(" ", $row['doctorname']);
			for($i = 0; $i < count($wordChunks); $i++)
				{
					$name[$i] = $wordChunks[$i] ;
				}

			//$doctorname2 =  array($doctorname1);
			$qualification = $row["quali"];
			$specialistin = $row["specialistin"];
			$contactno = $row["contactno"];
			$emailid = $row["emailid"];
			$biodata = $row["biodata"];
		}
	//}
?>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
<?php include("headerDoctor.php");?>
      <!--header end-->

      <!--sidebar start-->
<?php include ("sidebarDoctor.php");?>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Doctor Panel</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="indexDoctor.php"> Home</a></li>
						<li><i class="icon_profile"></i>Profile</li>
						<li><i class="icon_pencil-edit"></i> Edit Profile</li>
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-10">
                      <section class="panel">
                          <header class="panel-heading">
                             Update Your Profile
                          </header>
                          <div class="panel-body">
<?php 
//if(isset($_SESSION["docid"]))
include("dbconnection.php"); ?>
                              <div class="form">
                                  <form class="form-validate form-horizontal " id="register_form" method="post" action="">
									  <div class="form-group " style="color:green;">
                                          <label for="updatemess" class="control-label col-lg-8"><b><?php echo  $updrec; ?></b></label>
                                      </div>
									  <div class="form-group ">
                                          <label for="fname" class="control-label col-lg-2">First Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="fname" name="fname" type="text" value="<?php echo $name[0]; ?>" />
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="mname" class="control-label col-lg-2">Middle Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="mname" name="mname" type="text" value="<?php echo $name[1]; ?>" />
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="lname" class="control-label col-lg-2">Last Name <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="lname" name="lname" type="text" value="<?php echo $name[2]; ?>" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="quali" class="control-label col-lg-2">Qualification <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="quali" name="quali" type="text" value="<?php echo $qualification; ?>"/>
                                          </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="contact" class="control-label col-lg-2">Contact No. <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="contact" name="contact" type="text" value="<?php echo $contactno; ?>" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">E-Mail <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control " id="email" name="email" type="email" value="<?php echo $emailid; ?>" />
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="special" class="control-label col-lg-2">Specialization <span class="required">*</span></label>
                                          <div class="col-lg-8">
                                              <input class="form-control " id="special" name="special" type="text" value="<?php echo $specialistin; ?>" />
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Description</label>
                                          <div class="col-lg-8">
                                              <textarea class="form-control " id="ccomment" name="description"><?php echo $biodata; ?></textarea>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-8">
                                              <button class="btn btn-primary" type="submit" name="submit">Save Changes</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery validate js -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>

    <!-- custom form validation script for this page-->
    <script src="js/form-validate.js"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>    

  </body>
</html>