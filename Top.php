<!DOCTYPE html>
<html class="" lang="zxx">
<?php
    $Con = mysqli_connect("localhost", "root", "", "ip");
    date_default_timezone_set("Asia/Kolkata");
    session_start();
?>

<head>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>:: Escort - Job Portal HTML Template ::</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="Content/assets/img/favicon.png" />

    <!-- CSS -->
    <link rel="stylesheet" href="Content/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Content/assets/plugins/bootstrap/css/bootstrap-select.min.css">
    <link href="Content/assets/plugins/icons/css/icons.css" rel="stylesheet">
    <link href="Content/assets/plugins/animate/animate.css" rel="stylesheet">
    <link href="Content/assets/plugins/bootstrap/css/bootsnav.css" rel="stylesheet">
    <link rel="stylesheet" href="Content/assets/plugins/nice-select/css/nice-select.css">
    <link href="Content/assets/plugins/aos-master/aos.css" rel="stylesheet">
    <link href="Content/assets/css/style.css" rel="stylesheet">
    <link href="Content/assets/css/responsive.css" rel="stylesheet">
    <script src="Content/Admin_Assets/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="Content/Validation.js"></script>
    <link rel="stylesheet" href="Content/fontawesome/css/all.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&amp;display=swap" rel="stylesheet">
</head>

<body class="utf_skin_area">
    <div class="page_preloader"></div>
    <!-- ======================= Start Navigation ===================== -->
    <nav class="navbar navbar-default navbar-mobile navbar-fixed white no-background bootsnav">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i
                        class="fa fa-bars"></i> </button>
                <a style='margin-top: 10px;' class="navbar-brand" href="index.php">
                   <strong style='color: #24d671;font-size: 35px;'> Internship Portal</strong>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="dropdown active"> <a href="index.php">Home</a> </li>
                    

                    <?php
                        if (isset($_SESSION["InternId"]))
                        {
                    ?>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Apply Job</a>
                        <ul class="dropdown-menu animated fadeOutUp">
                            <li><a href="AppliedJob.php">Applied Job</a></li>
                            <li><a href="ShortListing.php">Short List</a></li>
                        </ul>
                    </li>
                    <li class="dropdown active"> <a data-toggle='modal' data-target='#feedbackModal' href="#">Feedback</a> </li>
                    <li class="dropdown active"> <a href="Notification.php">Notification</a> </li>
                    <li class="dropdown"> <a href="ResumeBuilder.php" class="dropdown-toggle" data-toggle="dropdown">Welcome,
                    <?php echo $_SESSION["FullName"]; ?></a>
                        <ul class="dropdown-menu animated fadeOutUp">
                            <li><a href="ResumeBuilder.php">Profile</a></li>
                            <li><a data-toggle='modal' data-target='#ChangePassword' href="#">Change Password</a></li>
                            <li><a onclick='confirmLogout()' href="#">Logout</a></li>
                        </ul>
                    </li>
                    <?php
                        }
                        else
                        {
                    ?>
                        <li class="dropdown"><a href="#sectionCategory">Job Categories</a> </li>
                        <li class="dropdown"><a href="#AboutUsPanel">About Us</a> </li>
                    <?php
                        }
                    ?>
                    
                    
                </ul>
                <?php
                        if (!isset($_SESSION["InternId"]))
                        {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="br-right"><a class="btn-signup red-btn" href="javascript:void(0)" data-toggle="modal"
                            data-target="#LoginModal"><i class="login-icon ti-user"></i>Login</a></li>
                    <li class="sign-up"><a class="btn-signup red-btn" href="Registration.php"><span
                                class="ti-briefcase"></span>Register</a></li>
                </ul>
                <?php
                        }
                ?>

            </div>
        </div>
    </nav>


    <script>
    function confirmLogout() {
        if (confirm("Are you sure want to logout..!!!")) {
            window.location.href = "Logout.php";
        }
    }
    </script>


<div class="modal fade" id="feedbackModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-white">Feedback</h4>
                </div>
                <div class="modal-body">
                    <form method='post' id="ChangePasswordForm">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <b>Feedback</b>
                                <span id='lblFeedback'></span>
                                <textarea name="txtFeedback" id="txtFeedback" class='form-control'></textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <button style='width: 200px;' type="submit" class="btn btn-primary" id="btnFeedback"
                                    name="btnFeedback">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#btnFeedback").click(function(){
                var Cnt  = 0;
                Cnt = IsEmpty("txtFeedback", "lblFeedback", Cnt);

                if (Cnt  == 0)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            });
        });
    </script>

    <?php
        if (isset($_POST["btnFeedback"]))
        {
            $Feedback = $_POST["txtFeedback"];
            $InternId = $_SESSION["InternId"];
            $dt = date("Y-m-d H:i:s");
            $Query = "INSERT INTO `feedback` (`FeedbackId`, `InternId`, `Comment`, `FeedbackDate`) VALUES 
                                             (NULL, '$InternId', '$Feedback', '$dt');";
            mysqli_query($Con, $Query);
    ?>
        <script>
            alert("Thank you for feedback");
        </script>
    <?php
        }
    ?>

    <div class="modal fade" id="ChangePassword" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #343a40;">
                    <h4 class="modal-title text-white">Change Password</h4>
                </div>
                <div class="modal-body">
                    <form method='post' id="ChangePasswordForm">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <b>Old Password</b><span id="lblOldPass" style="color:red">*</span>
                                <input type="password" name="txtOldPass" class="form-control" id="txtOldPass"
                                    placeholder="Old Password" />
                            </div>
                            <div class="col-md-12 form-group">
                                <b>New Password</b><span id="lblNewPass" style="color:red">*</span>
                                <input type="password" name="txtNewPass" id="txtNewPass" class="form-control"
                                    placeholder="New Password" />
                            </div>
                            <div class="col-md-12 form-group">
                                <b>Confirm Password</b><span id="lblConfirmPass" style="color:red">*</span>
                                <input type="password" name="txtConfirmPass" id="txtConfirmPass" class="form-control"
                                    placeholder="Confirm Password" />
                            </div>
                            <div class="col-md-12 form-group">
                                <button style='width: 200px;' type="submit" class="btn btn-primary" id="btnChangePass"
                                    name="btnChangePass">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
        if (isset($_POST["btnChangePass"]))
        {
            $oldPasswd = $_POST["txtOldPass"];
            $newPasswd = $_POST["txtNewPass"];
            $Id = $_SESSION["InternId"];
            $Query = "select * from  internmaster where InternId=$Id and Password='$oldPasswd'";
            $res = mysqli_query($Con, $Query);
            if ($row = mysqli_fetch_assoc($res))
            {
                $Query  = "Update internmaster set Password = '$newPasswd' where InternId=$Id";
                mysqli_query($Con, $Query);
    ?>
            <script>
                alert("Succssfully Changed");
                window.location.href = "";
            </script>
    <?php
            }
        }
    ?>


    <script>
        $(document).ready(function () {

            $("#btnChangePass").click(function () {

                var Cnt = 0;

                Cnt = IsEmpty("txtOldPass", "lblOldPass", Cnt);
                Cnt = IsEmpty("txtNewPass", "lblNewPass", Cnt);
                Cnt = IsEmpty("txtConfirmPass", "lblConfirmPass", Cnt);

                var New = $("#txtNewPass").val();
                var Confirm = $("#txtConfirmPass").val();

                if (New != "" && Confirm != "") {
                    if (New == Confirm) {
                        $("#lblConfirmPass").text("*");
                    }
                    else {
                        Cnt++;
                        $("#lblConfirmPass").text("*Password are not Match");
                    }
                }

                if (Cnt == 0) 
                {
                    return true;
                }
                else
                {
                    return false;
                }
            });
        });
    </script>
