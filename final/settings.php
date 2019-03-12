<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="profile.css">
<!------ Include the above in your HEAD tag ---------->
</head>
<?php include_once 'admin-lib.php';?>
<body>
        
 <?php $EmployeeList[]= $adminDao->EmployeeById($_REQUEST['id']);
        
        if ($EmployeeList) {
            $count=1;
            
        foreach ($EmployeeList as $list){
              $eg = $list->id;    
                $details = $adminDao->PhoneByEg($eg); ?>

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="<?php echo $imageUrl2.$list->pic;?>" style="width:100px;height:150px;" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file">
								
                            </div>
							<p></p>
							<div>
							<p></p>
							</div>
						<div>
							
                        </div>
							<div class="span" style="margin-top=10%">
							<a href="changep.php">
							<input type="button" class="btn btn-secondary" value="Save"></button>
							</a>
                        </div></div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $list->name;?>
                                    </h5>
                                    <h6>
                                        <?php echo $list->designation;?>
                                    </h6>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <a href="<?php echo $siteUrl;?>changep-<?php echo $list->id;?>">
                    <div class="col-md-2">
                        <button type="button" class="btn btn-secondary">Change Password</button>
                    </div>
                </a>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list->id;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list->name;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list->email;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $details->p1;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Department</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list->department;?></p>
                                            </div>
                                        </div>
                            </div>
                            </div>
                    </div>
                </div>
            </form>           
        </div>
    </body>
    <?php $count++;}}else{echo "<tr><td colspan='9'>No details..</td></tr>";}?>
    
    </html>
