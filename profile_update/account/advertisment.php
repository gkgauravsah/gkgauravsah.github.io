<?php
            //session check start
            $welcome_Message = '';
            session_start();
            if($_SESSION['sid']==session_id())
            {
                $welcome_Message = 'Welcome User' ;
            }
            else
            {
                header("location:login");
            }
            //session check end

            include 'connection.php';

            $id = '';
            $ads_title = '';
            $ads_cat = '';
            $ads_desc = '';
            $ads_price = '';
            $ads_area = '';
            $ads_user_name = '';
            $ads_user_phone = '';
            $ads_state = '';
            $ads_district = '';
            $ads_block = '';
            $ads_grampanchayat = '';
            $ads_user_address = '';
            $ads_pincode = '';
            $ads_findus = '';
            $ads_findus_phone = '';
            $ads_featured = '';
            $ads_status = '';
            $web_link = '';
            $error_Message = '';

    function getPosts()
    {
        $posts = array();
        $posts[1] = $_POST['id'];
        $posts[3] = $_POST['ads_title'];
        $posts[4] = $_POST['ads_cat'];
        $posts[5] = $_POST['ads_desc'];
        $posts[6] = $_POST['ads_price'];
        $posts[9] = $_POST['ads_area'];
        $posts[10] = $_POST['ads_user_name'];
        $posts[11] = $_POST['ads_user_phone'];
        $posts[12] = $_POST['ads_state'];
        $posts[13] = $_POST['ads_district'];
        $posts[14] = $_POST['ads_block'];
        $posts[15] = $_POST['ads_grampanchayat'];
        $posts[16] = $_POST['ads_user_address'];
        $posts[22] = $_POST['ads_pincode'];
        $posts[23] = $_POST['ads_findus'];
        $posts[24] = $_POST['ads_findus_phone'];
        $posts[25] = $_POST['ads_featured'];
        $posts[26] = $_POST['ads_status'];
        $posts[27] = $_POST['web_link'];
        return $posts;
    }
    //search data
    if(isset($_POST['search']))
    {
        $data = getPosts();
        if(empty($data[1]))
        {
             $error_Message = '<div class="alert alert-danger fade in alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
                                    <strong>Error!</strong> Please Enter the User ID to Search...
                                 </div>';

        }else{
            $searchStmt = $con->prepare('SELECT * FROM ads_registration where id =:id');
            $searchStmt->execute(array(
                    ':id'=> $data[1]
                    ));
                    if($searchStmt)
                    {
                        $use = $searchStmt->fetch();
                         if(empty($use))
                        {
                             $error_Message = '<div class="alert alert-danger fade in alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
                                    <strong>Error!</strong> No data found for this ID.
                                 </div>';

                        }
                            $id = $use[1];
                            $ads_title = $use[3];
                            $ads_cat = $use[4];
                            $ads_desc = $use[5];
                            $ads_price = $use[6];
                            $ads_area = $use[9];
                            $ads_user_name = $use[10];
                            $ads_user_phone = $use[11];
                            $ads_state =$use[12];
                            $ads_district = $use[13];
                            $ads_block = $use[14];
                            $ads_grampanchayat = $use[15];
                            $ads_user_address = $use[16];
                            $ads_pincode = $use[22];
                            $ads_findus =$use[23];
                            $ads_findus_phone =$use[24];
                            $ads_featured =$use[25];
                            $ads_status =$use[26];
                            $web_link =$use[27];
    }}}
    if(isset($_POST['update']))
    {
        $data = getPosts();
        if(empty($data[3]) || empty($data[4]) || empty($data[5]))
        {
            $error_Message = '<div class="alert alert-danger fade in alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
                                    <strong>Error!</strong> Enter the User Data to Update...
                                 </div>';

        }else{
            $updateStmt = $con->prepare('UPDATE ads_registration set ads_title = :ads_title,ads_cat = :ads_cat,ads_desc = :ads_desc,ads_price = :ads_price,ads_area = :ads_area,ads_user_name = :ads_user_name,ads_user_phone = :ads_user_phone,ads_state = :ads_state,ads_district = :ads_district,ads_block = :ads_block,
                                        ads_grampanchayat = :ads_grampanchayat,ads_user_address = :ads_user_address,ads_pincode = :ads_pincode,ads_findus = :ads_findus,ads_findus_phone = :ads_findus_phone,ads_featured = :ads_featured,ads_status = :ads_status,web_link = :web_link WHERE id= :id');
            $updateStmt->execute(array(
                    ':id' => $data[1],
                    ':ads_title'=> $data[3],
                    ':ads_cat'=> $data[4],
                    ':ads_desc'=> $data[5],
                    ':ads_price'=> $data[6],
                    ':ads_area'=> $data[9],
                    ':ads_user_name'=> $data[10],
                    ':ads_user_phone'=> $data[11],
                    ':ads_state'=> $data[12],
                    ':ads_district'=> $data[13],
                    ':ads_block'=> $data[14],
                    ':ads_grampanchayat'=> $data[15],
                    ':ads_user_address'=> $data[16],
                    ':ads_pincode'=> $data[22],
                    ':ads_findus'=> $data[23],
                    ':ads_findus_phone'=> $data[24],
                    ':ads_featured'=> $data[25],
                    ':ads_status'=> $data[26],
                    ':web_link'=> $data[27]));
            if($updateStmt)
                {
                    $error_Message = '<div class="alert alert-success fade in alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
                                    <strong>Success!</strong> Data has been Updated.
                                 </div>';

                }
            }
        }
    // Delete Data
    if(isset($_POST['delete']))
        {
            $data = getPosts();
            if(empty($data[1]))
            {
                $error_Message = '<div class="alert alert-danger fade in alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
                                    <strong>Error!</strong> Enter the User Id to Delete...
                                 </div>';

            }else{

                $deleteStmt = $con->prepare('delete from ads_registration where id=:id');
                $deleteStmt->execute(array(
                    ':id'=> $data[1]
                ));
                if($deleteStmt)
                {
                    $error_Message = '<div class="alert alert-success fade in alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
                                        <strong>Success!</strong> Data has been Deleted.
                                     </div>';

                }
            }
        }
?>
<!DOCTYPE html>
<html  lang="en" xml:lang="en" >
    <!-- Include head -->
    <?php include 'include/head.php';?>
    <body >
        <?php include 'include/header.php';?>

        <main clss="main">

<div class="container home">
    <div class="row" >
        <div class="col-md-12">
            <div class="adRegBox">
                <h1 class="page-header">Advertisment</h1>

                <form class="form-horizontal" id="adsRegister" name="adsRegister"  action="" method="POST">
                 <div class="form-group">
                        <div class="col-sm-12">
                                <?php echo $error_Message; ?>
                        </div>
                    </div>
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="glyphicon glyphicon-bookmark"></i> Search Advertisment
                    </div>
                    <div class="panel-body">



                        <div class="form-group">
                            <label for="adID" class="col-sm-2 control-label">Ad ID<span class="redStar">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="adID" name="id" placeholder="Ad ID" required value= "<?php echo $id;?>" >

                            </div>
                            <div class="col-md-4">
                                <input type="submit"class="btn btn-primary" name="search" value="Search">
                                <!--<button type="button" class="btn btn-primary" title="Search" id="adsearch" name="adsearch" > Search</button>-->
                            </div>
                        </div>



                    </div>
                    </div>


               <!--form data-->
                                            <h2>Edit Details</h2>
                                            <hr>


                                            <div class="form-group">
                                                <label for="adtitle" class="col-sm-2 control-label">Ad Title<span class="redStar">*</span></label>
                                                <div class="col-sm-10" >
                                                    <input type="text" class="form-control" id="adtitle" name="ads_title" placeholder="Title" value= "<?php echo $ads_title;?>" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="adCategory" class="col-sm-2 control-label">Ad Category<span class="redStar">*</span></label>
                                                <div class="col-sm-10" >
                                                    <input type="text" class="form-control" id="adCategory" name="ads_cat" placeholder="ad Category" value= "<?php echo $ads_cat;?>" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="adDescription" class="col-sm-2 control-label">Ad Description<span class="redStar">*</span></label>
                                                <div class="col-sm-10" >
                                                   <textarea  class="form-control"  id="adDescription" name="ads_desc" placeholder="Ad Description"><?php echo $ads_desc;?></textarea>


                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="web_link" class="col-sm-2 control-label">Website Address</label>
                                                <div class="col-sm-10">
                                                    <input type="url" class="form-control" id="web_link" name="web_link" placeholder="http://www.example.com"value= "<?php echo $web_link;?>" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="itemPrice" class="col-sm-2 control-label">Price<span class="redStar"></span></label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="itemPrice" name="ads_price" placeholder="Price" value= "<?php echo $ads_price;?>" >
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="form-group">
                                                <label for="fileUpload" class="col-sm-2 control-label">Upload Photos</label>
                                                <div class="col-sm-10">
                                                    <input id="fileUpload"  type="file"/>
                                                    <div id="image-holder"></div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="form-group">
                                                <label for="adArea" class="col-sm-2 control-label">Area</label>
                                                <div class="col-sm-10" >
                                                    <input type="text" class="form-control" id="adArea" name="ads_area" placeholder="Area" value= "<?php echo $ads_area;?>" >
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="cFullName" class="col-sm-2 control-label">Full Name<span class="redStar">*</span></label>
                                                <div class="col-sm-4" >
                                                    <input type="text" class="form-control" id="cFullName" name="ads_user_name" placeholder="Full Name" value= "<?php echo $ads_user_name;?>" >
                                                </div>

                                                <label for="cPhone" class="col-sm-2 control-label mobile-marginTop15">Phone Number<span class="redStar">*</span></label>
                                                <div class="col-sm-4" >
                                                    <input type="number" class="form-control" id="cPhone" name="ads_user_phone" placeholder="Enter 0 before Mobile Number" value= "<?php echo $ads_user_phone;?>" >

                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="cState" class="col-sm-2 control-label">State<span class="redStar">*</span></label>
                                                <div class="col-sm-4" >
                                                    <input type="text" class="form-control" id="cState" name="ads_state" placeholder="Enter State" value= "<?php echo $ads_state;?>" >
                                                </div>

                                                <label for="cDistrict" class="col-sm-2 control-label mobile-marginTop15">District<span class="redStar">*</span></label>
                                                <div class="col-sm-4" >
                                                    <input type="text" class="form-control" id="cDistrict" name="ads_district" placeholder="District" value= "<?php echo $ads_district;?>" >
                                                </div>

                                            </div>


                                            <div class="form-group">

                                                <label for="cBlock" class="col-sm-2 control-label">Block<span class="redStar">*</span></label>
                                                <div class="col-sm-4" >
                                                    <input type="text" class="form-control" id="cBlock" name="ads_block" placeholder="Block" value= "<?php echo $ads_block;?>" >
                                                </div>

                                                <label for="cGramPanchyat"  class="col-sm-2 control-label mobile-marginTop15">Gram Panchyat<span class="redStar">*</span></label>
                                                <div class="col-sm-4" >
                                                    <input type="text" class="form-control" id="cGramPanchyat" name="ads_grampanchayat" placeholder="Gram Panchyat" value= "<?php echo $ads_grampanchayat;?>" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="cAddress" class="col-sm-2 control-label">Address</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="cAddress" name="ads_user_address" placeholder="Address, Village, City" value= "<?php echo $ads_user_address;?>" >
                                                </div>
                                                <label for="cPincode" class="col-sm-2 control-label mobile-marginTop15">Pin Code<span class="redStar"></span></label>
                                                <div class="col-sm-4" >
                                                    <input type="number" class="form-control" id="cPincode" name="ads_pincode" placeholder="Pin code" value= "<?php echo $ads_pincode;?>" >
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="form-group">
                                                <label for="findUs" class="col-sm-2 control-label">How Find Us</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="findUs" name="ads_findus" placeholder="Volunteer" value= "<?php echo $ads_findus;?>" >
                                                </div>

                                                <label for="personName" class="col-sm-2 control-label">Mobile<span class="redStar"></span></label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" id="personName" name="ads_findus_phone" placeholder="Mobile Number" value= "<?php echo $ads_findus_phone;?>" >
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label for="ads_featured" class="col-sm-2 control-label">Ad Feature<span class="redStar"></span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="ads_featured" name="ads_featured" placeholder="Featured Status" value= "<?php echo $ads_featured;?>" >
                                                </div>
                                                <label for="ads_status" class="col-sm-2 control-label">Ad Status</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="ads_status" name="ads_status" placeholder="Ad Status" value= "<?php echo $ads_status;?>" >
                                                </div>
                                                </div>


                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <p>By clicking 'Submit' you agree to our <a href="#" title="Terms of use">Terms of Use</a> &amp; <a href="#" title="Posting Rules">Posting Rules</a>.</p>
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
