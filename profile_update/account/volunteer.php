<?php

 include 'connection.php';
$id = '';
	$vGender = '';
	$vFullName = '';
	$vFather = '';
	$vDOB = '';
	$vQualification = '';
	$vPhone = '';
	$vMOTP = '';
	$vEmail = '';
	//$vImage = '';
	$vArea = '';
	$vState = '';
	$vDistrict = '';
	$vBlock = '';
	$vGramPanchayat = '';
	$vAddress = '';
	$vPincode = '';
	$voFindUs = '';
	$voFindUsOption = '';
	$error_Message = '';
	
	
//if(isset($_GET['search']) && !empty($_GET['vPhone']))
	if(isset($_POST['search']))
	{
		//$data = getPosts();
		$number = $_POST['vPhone'];
		if(!empty($number))
	{
		$searchStmt = $con->prepare('SELECT * FROM vo_registration where vPhone=:vPhone');
				$searchStmt->execute(array(':vPhone'=> $number));
				
				$edit_row = $searchStmt->fetch(PDO::FETCH_ASSOC);
				extract($edit_row);
				$image = $edit_row['vImage'];
	}
	else
	{
		$errMSG = "Sorry, Something is wrong";
	}
	}
	
	
	
	if(isset($_POST['update']))
	{
		
		$id = $_POST['id'];
	$vGender = $_POST['vGender'];
	$vFullName = $_POST['vFullName'];
	$vFather = $_POST['vFather'];
	$vDOB = $_POST['vDOB'];
	$vQualification = $_POST['vQualification'];
	$vPhone = $_POST['vPhone'];
	//$vMOTP = $_POST['vMOTP'];
	$vEmail = $_POST['vEmail'];
	//$vImage = $_POST['vImage'];
	$vArea = $_POST['vArea'];
	$vState = $_POST['vState'];
	$vDistrict = $_POST['vDistrict'];
	$vBlock = $_POST['vBlock'];
	$vGramPanchayat = $_POST['vGramPanchayat'];
	$vAddress = $_POST['vAddress'];
	$vPincode = $_POST['vPincode'];
	$voFindUs =$_POST['voFindUs'];
	$voFindUsOption = $_POST['voFindUsOption'];
			
		$imgFile = $_FILES['vImage']['name'];
		$tmp_dir = $_FILES['vImage']['tmp_name'];
		$imgSize = $_FILES['vImage']['size'];
					
		if($imgFile)
		{
			$upload_dir = 'vImage/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$vImage = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$vImage);
					move_uploaded_file($tmp_dir,$upload_dir.$vImage);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$vImage = $image; // old image from database
		}	
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $con->prepare('UPDATE vo_registration set vGender = :vGender,vFullName = :vFullName,vFather = :vFather,vDOB =
					:vDOB,vQualification = :vQualification,vPhone = :vPhone,vEmail = :vEmail,vImage = :vImage,vArea = :vArea,vState = :vState,vDistrict = :vDistrict,vBlock =
					:vBlock,vGramPanchayat = :vGramPanchayat,vAddress = :vAddress,vPincode = :vPincode,voFindUs = :voFindUs,voFindUsOption = :voFindUsOption WHERE vPhone= :vPhone');
			$stmt->bindParam(':vGender',$vGender);
			$stmt->bindParam(':vFullName',$vFullName);
			$stmt->bindParam(':vFather',$vFather);
			$stmt->bindParam(':vDOB',$vDOB);
			$stmt->bindParam(':vQualification',$vQualification);
			$stmt->bindParam(':vPhone',$vPhone);
			$stmt->bindParam(':vEmail',$vEmail);
			$stmt->bindParam(':vImage',$vImage);
			$stmt->bindParam(':vArea',$vArea);
			$stmt->bindParam(':vState',$vState);
			$stmt->bindParam(':vDistrict',$vDistrict);
			$stmt->bindParam(':vBlock',$vBlock);
			$stmt->bindParam(':vGramPanchayat',$vGramPanchayat);
			$stmt->bindParam(':vAddress',$vAddress);
			$stmt->bindParam(':vPincode',$vPincode);
			$stmt->bindParam(':voFindUs',$voFindUs);
			$stmt->bindParam(':voFindUsOption',$voFindUsOption);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				//window.location.href='index.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
?>



<!DOCTYPE html>
<html lang="en" xml:lang="en" >
    <!-- Include head -->
    <?php include 'include/head.php';?>
    <body >
        <?php include 'include/header.php';?>

        <main clss="main">
            <d<!--adRegistartion.html-->

		<div class="container volunteer">
			<div class="row">
				<div class="col-md-12">
					<div class="adRegBox">
					<h1 class="page-header">Volunteer</h1>
                   <form class="form-horizontal" name="voRegister" id="voRegister" action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="col-sm-12">
                                <?php echo $error_Message; ?>
                        </div>
                    </div>
                    <div class="panel panel-default">
						<div class="panel-heading">
							<i class="glyphicon glyphicon-bookmark"></i>Search Volunteer
						</div>
						<div class="panel-body">
							<div class="form-group">
									<label for="vPhone" class="col-sm-2 control-label">Mobile Number<span class="redStar">*</span></label>
								<div class="col-sm-6">
									<input type="number" class="form-control" id="vPhone" name="vPhone" placeholder="Enter the Volunteer Mobile Number to Search "  value="<?php echo $vPhone;?>" >
								</div>
								<div class="col-md-4">
									<input type="submit"class="btn btn-primary" name="search" value="Search">
								</div>
							</div>
							
						</div>
					</div>
                       <!--
					   <div class="panel panel-default">
                           <div class="panel-heading">
                               <i class="glyphicon glyphicon-bookmark"></i> Search Result
                           </div>
                           <div class="panel-body">
                               <div class="table-responsive">
                                   <table class="table table-bordered table-striped">

                                       <thead>
                                           <tr>
                                               <th>SN</th>
                                               <th>Add ID</th>
                                               <th>Date</th>
                                               <th>Edit</th>
                                               <th>Delete</th>


                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>
                                               <td>1</td>
                                               <td><a href="http://beta.gaybhais.com/en/#/productsDetails/201607311949" title="View">20161208123405</a></td>
                                               <td>30/08/2016</td>
                                               <td><a href="editAdd.html" title="Edit" target="_blank"><i class="glyphicon glyphicon-edit"></i></a></td>
                                               <td><a href="#" title="delete"><i class="glyphicon glyphicon-remove"></i></a></td>

                                           </tr>
                                           <tr>
                                               <td>2</td>
                                               <td><a href="http://beta.gaybhais.com/en/#/productsDetails/201607311949">20161208123405</a></td>
                                               <td>30/08/2016</td>
                                               <td><a href="editAdd.html" title="Edit" target="_blank"><i class="glyphicon glyphicon-edit"></i></a></td>
                                               <td><a href="#" title="delete"><i class="glyphicon glyphicon-remove"></i></a></td>

                                           </tr>
                                           <tr>
                                               <td>3</td>
                                               <td><a href="#">20161208123405</a></td>
                                               <td>30/08/2016</td>
                                               <td><a href="editAdd.html" title="Edit"><i class="glyphicon glyphicon-edit"></i></a></td>
                                               <td><a href="#" title="delete"><i class="glyphicon glyphicon-remove"></i></a></td>

                                           </tr>
                                           <tr>
                                               <td>4</td>
                                               <td><a href="#">20161208123405</a></td>
                                               <td>30/08/2016</td>
                                               <td><a href="#" title="Edit"><i class="glyphicon glyphicon-edit"></i></a></td>
                                               <td><a href="#" title="delete"><i class="glyphicon glyphicon-remove"></i></a></td>

                                           </tr>
                                           <tr>
                                               <td>5</td>
                                               <td><a href="#">20161208123405</a></td>
                                               <td>30/08/2016</td>
                                               <td><a href="#" title="Edit"><i class="glyphicon glyphicon-edit"></i></a></td>
                                               <td><a href="#" title="delete"><i class="glyphicon glyphicon-remove"></i></a></td>

                                           </tr>

                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div> -->
                       <!--form data-->

                       <h2>Edit Details</h2>
                       <hr>
						<div class="form-group">
                            <label for="adID" class="col-sm-2 control-label">Volunteer ID<span class="redStar">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="voID" name="id" placeholder="Volunteer ID" value= "<?php echo $id;?>" >
                            </div>                
                                               
                            <label for="vGender" class="col-sm-2 control-label">Gender<span class="redStar">*</span> </label>
                            <div class="col-sm-4" >                                
							<input type="text" class="form-control" id="vGender" name="vGender" placeholder="Gender" value= "<?php echo $vGender;?>" >
                            </div>
                        </div>
						
                        <div class="form-group">
                            <label for="vFullName" class="col-sm-2 control-label">Full Name<span class="redStar">*</span></label>
                            <div class="col-sm-4" >
                                <input type="text"class="form-control" id="vFullName" name="vFullName" placeholder="Full Name"value= "<?php echo $vFullName;?>" >
                            </div>
                            <label for="vFather" class="col-sm-2 control-label mobile-marginTop15">Father's Name<spanclass="redStar">*</span></label>
                            <div class="col-sm-4" >
                                <input type="text"class="form-control" id="vFather" name="vFather" placeholder="Father's Name" value= "<?php echo $vFather;?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="vDOB" class="col-sm-2 control-label">Birthday<span class="redStar">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="vDOB" name="vDOB" placeholder="DD/MM/YYYY" value= "<?php echo $vDOB;?>">
                            </div>
                            <label for="vQualification" class="col-sm-2 control-label mobile-marginTop15">Qualification<span class="redStar">*</span></label>
                            <div class="col-sm-4" >
								<input type="text" class="form-control"id="vQualification" name="vQualification" placeholder="Highest Qualification"  value= "<?php echo $vQualification;?>" >
                            </div>
                        </div>
                       <!--
					   <div class="col-md-1">
                            <button type="button" class="btn btn-info buttonBox pull-right" id="sendMobileOTP" </button> 
                        
                        <label for="vMOTP" class="col-sm-2 control-label mobile-marginTop15" style="display:none;">Enter OTP<span class="redStar" >*</span></label>
                        <div class="col-sm-3"  style="display:none;">
                            <input type="number" class="form-control" id="vMOTP" name="vMOTP" placeholder="Enter OTP" maxlength="6" >
                        </div>

                        <div class="col-md-1" style="display:none;">
                            <button type="button" class="btn btn-info buttonBox pull-right" id="verifycontact" >Right</button>
                        </div>
                    </div> -->
					
                    <div class="form-group">
                        <label for="vEmail" class="col-sm-2 control-label">Email<span class="redStar">*</span></label>
                        <div class="col-sm-4" >
                            <input type="text" class="form-control"id="vEmail" name="vEmail" placeholder="Email" value= "<?php echo $vEmail;?>" >
                        </div>
                        <label for="vArea" class="col-sm-2 control-label mobile-marginTop15">Area<span class="redStar">*</span></label>
                        <div class="col-sm-4" >
                        <input type="text" class="form-control" id="vArea" name="vArea" placeholder="Area" value= "<?php echo$vArea;?>"  >
						</div>
					</div>
					
					<div class="form-group">
						<label for="vImage" class="col-sm-2 control-label">Photo<span class="redStar">*</span></label>
						<div class="col-sm-4">                    
							
							<input class="input-group" type="file"  id="vImage" name="vImage" accept="image/*" value= "<?php echo $vImage;?>"/>
						</div>
						<div class="col-sm-6" >Photograph must be a recent passport size colour picture.</div>
						<div class="form-group">
							<label for="vImage" class="col-sm-2 control-label"> <span class="redStar"></span> </label>
						<div class="col-sm-2" >
							<img  src="<?php echo $vImage;?>" >
							
						</div>
						</div>
					</div>
					<!--
					<hr>
					<div class="form-group">
                        <label for="uploadImage" class="col-sm-2 control-label">Photo<span class="redStar">*</span></label>
                        <div class="col-sm-4">
                              <input id="uploadImage" type="file"/>
                              <input name="uploadImage" type="hidden"/>
                              <div id="image-holder-image" class="imageUpload" style="width:100px;"></div>
                        </div>
                        <div class="col-sm-6">Photograph must be a recent passport size colour picture.</div>
                    </div>
					<hr/>
                   <!--
				   <hr/>

                    <div class="form-group">
                        <label for="uploadImage" class="col-sm-2 control-label">Photo<span class="redStar">*</span></label>
                        <div class="col-sm-4">
                              <input id="uploadImage" type="file"/>
                              <input name="uploadImage" type="hidden"/>
                              <div id="image-holder-image" class="imageUpload" style="width:100px;"></div>
                        </div>
                        <div class="col-sm-6">Photograph must be a recent passport size colour picture.</div>
                    </div>
					
                    <!--<div class="form-group">
                        <label for="uploadDocImage" class="col-sm-2 control-label">Document 1<span class="redStar">*</span></label>
                        <div class="col-sm-4">
                            <input id="uploadDocImage1" type="file"/>
                            <input name="uploadDocImage1" type="hidden"/>
                            <div id="image-holder-doc-image1" class="imageUpload" style="width:100px;"></div>
                        </div>
                        <div class="col-sm-6">ID & Address Proof (Aadhar Card) front image.</div>
                    </div>

                   
					<div class="form-group">
                        <label for="uploadDocImage" class="col-sm-2 control-label">Document 2<span class="redStar">*</span></label>
                        <div class="col-sm-4">
                            <input id="uploadDocImage2" type="file"/>
                            <input name="uploadDocImage2" type="hidden"/>
                            <div id="image-holder-doc-image2" class="imageUpload" style="width:100px;"></div>
                        </div>
                        <div class="col-sm-6">ID & Address Proof (Aadhar Card) back image.</div>
                    </div>                  
                    					
                <label for="vArea" class="col-sm-2 control-label" style="visibility:hidden">Area</label>
                    <div class="col-sm-10" >
                            <label class="radio-inline">
                                <input type="radio" id="vArea1" name="vArea"  value="Rural"> Rural
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="vArea2" name="vArea"  value="Urban"> Urban
                            </label>
                    </div>-->

                   <div class="form-group">
                    <label for="vState" class="col-sm-2 control-label">State<span class="redStar">*</span></label>
                    <div class="col-sm-4" >
                    <input type="text" class="form-control" id="vState" name="vState" placeholder="State"value= "<?php echo $vState;?>">    
                    </div>

                    <label for="vDistrict" class="col-sm-2 control-label mobile-marginTop15">District<span class="redStar">*</span></label>
                    <div class="col-sm-4" >
                        <input type="text" class="form-control" id="vDistrict" name="vDistrict" placeholder="District"value= "<?php echo $vDistrict;?>">
                    </div>
                    </div>
                  <div class="form-group">
                    <label for="vBlock" class="col-sm-2 control-label">Block<span class="redStar">*</span></label>
                    <div class="col-sm-4" >
                        <input type="text" class="form-control" id="vBlock" name="vBlock" placeholder="Block" value= "<?php echo $vBlock;?>" >
                    </div>
                    <label for="vGramPanchayat"  class="col-sm-2 control-label mobile-marginTop15">Gram Panchyat<span class="redStar">*</span></label>
                    <div class="col-sm-4" >
                        <input type="text" class="form-control" id="vGramPanchayat" name="vGramPanchayat" placeholder="Gram Panchyat"value= "<?php echo $vGramPanchayat;?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="vAddress" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="vAddress" name="vAddress" placeholder="Address, Village, City"value= "<?php echo $vAddress;?>" >
                    </div>
                    <label for="vPincode" class="col-sm-2 control-label mobile-marginTop15">Pin Code<span class="redStar"></span></label>
                    <div class="col-sm-4" >
                      <input type="number" class="form-control" id="vPincode" name="vPincode" placeholder="Pin code"  value= "<?php echo $vPincode;?>" >
                    </div>
                 </div>

                <hr/>

                <div class="form-group">
                    <label for="voFindUs" class="col-sm-2 control-label">How Find Us</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="voFindUs" name="voFindUs" placeholder="Volunteer/Friend Name" value= "<?php echo $voFindUs;?>" >
                    </div>

                    <label for="voFindUsOption" class="col-sm-2 control-label">Mobile<span class="redStar"></span></label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="voFindUsOption" name="voFindUsOption" placeholder="Mobile Number" maxlength="10" value= "<?php echo $voFindUsOption;?>" >
                    </div>
                </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <p>By clicking 'Submit' you agree to our <a href="#" title="Terms of use">Terms of Use</a> &amp; <a href="#" title="Volunteer Rules">Volunteer Rules</a>.</p>
                    </div>
                  </div>
					<div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
						<input type="submit"class="btn btn-primary" name="delete" value="Delete">
						<input type="submit"class="btn btn-primary" name="update" value="Update">
                    </div>
                  </div>
			</form>

                <!--loader start-->
                <div class="loader"></div>
                <!--loader end-->

                </div>
            </div>
			</div>
		</div>
        </main>
		<?php include 'include/footer.php';?>
    </body>
</html>