<!DOCTYPE html>
<html lang="en">
<?php
    $Con = mysqli_connect("localhost", "root", "", "ip");
    date_default_timezone_set("Asia/Kolkata");
    session_start();
    if (!isset($_SESSION["CompanyId"]))
    {
?>
<script>
window.location.href = "Authentication.php";
</script>
<?php
    }
?>

<head>
    <style>
    table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Codescandy">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-M8S4MT3EYG');
    </script>

    <link rel="stylesheet" href="../Content/fontawesome/css/all.css">
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon"
        href="https://dashui.codescandy.com/dashuipro/assets/images/favicon/favicon.ico">


    <!-- Libs CSS -->
    <link href="../Content/Admin_Assets/assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../Content/Admin_Assets/assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="../Content/Admin_Assets/assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">



    <!-- Theme CSS -->
    <link rel="stylesheet" href="../Content/Admin_Assets/assets/css/theme.min.css">
    <!-- tns slider -->
    <link href="../Content/Admin_Assets/assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
    <script src="../Content/Admin_Assets/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../Content/Validation.js"></script>
    <link rel="stylesheet" href="../Content/fontawesome/css/all.css">
    <title>Internship</title>
</head>

<body>
    <!-- Wrapper -->
    <main id="main-wrapper" class="main-wrapper">
        <div class="header">
            <!-- navbar -->
            <div class="navbar-custom navbar navbar-expand-lg">
                <div class="container-fluid px-0">
                    <a class="navbar-brand d-block d-md-none" href="https://dashui.codescandy.com/dashuipro/index.html">
                        <img src="https://dashui.codescandy.com/dashuipro/assets/images/brand/logo/logo-2.svg"
                            alt="Image">
                    </a>



                    <a id="nav-toggle" href="#!" class="ms-auto ms-md-0 me-0 me-lg-3 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                            class="bi bi-text-indent-left text-muted" viewBox="0 0 16 16">
                            <path
                                d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                        </svg></a>

                    <!--Navbar nav -->
                    <ul
                        class="navbar-nav navbar-right-wrap ms-lg-auto d-flex nav-top-wrap align-items-center ms-4 ms-lg-0">
                        <a href="#"
                            class="form-check form-switch theme-switch btn btn-ghost btn-icon rounded-circle mb-0 ">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                        </a>
                        </li>
                        <li class="dropdown ms-2">
                            <a class="rounded-circle" href="#!" role="button" id="dropdownUser"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    <img alt="avatar" src="../Content/Admin_Assets/assets/images/avatar/avatar-11.jpg"
                                        class="rounded-circle">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                                <div class="px-4 pb-0 pt-2">
                                    <div class="lh-1 ">
                                        <h5 class="mb-1"> <?php echo $_SESSION["CompanyName"]; ?></h5>
                                        <a href="Profile.php" class="text-inherit fs-6">View my profile</a>
                                    </div>
                                    <div class=" dropdown-divider mt-3 mb-2"></div>
                                </div>
                                <ul class="list-unstyled">
                                    <li>
                                        <a data-bs-toggle='modal' data-bs-target='#ChangePassword'
                                            class="dropdown-item d-flex align-items-center" href="#">
                                            <i class="me-2 icon-xxs dropdown-item-icon"
                                                data-feather="settings"></i>Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a onclick="confirmLogout()" class="dropdown-item" href="#">
                                            <i class="me-2 icon-xxs dropdown-item-icon" data-feather="power"></i>Sign
                                            Out
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <script>
        function confirmLogout() {
            if (confirm("Are you sure want to logout..!!!")) {
                window.location.href = "Logout.php";
            }
        }
        </script>
        <!-- navbar vertical -->
        <!-- Sidebar -->

        <div class="navbar-vertical navbar nav-dashboard">
            <div class="h-100" data-simplebar>
                <!-- Brand logo -->
                <a class="navbar-brand" href="#">
                    <strong style='font-size: 25px;'>Internship Portal</strong>
                </a>
                <!-- Navbar nav -->
                <ul class="navbar-nav flex-column" id="sideNavbar">
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link has-arrow " href="Profile.php">
                            <i class='fa fa-home'></i>&nbsp;&nbsp;Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link has-arrow " href="PostJob.php">
                            <i class='fa fa-bullhorn'></i>&nbsp;&nbsp;Post Job
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link has-arrow " href="Inquiry.php">
                            <i class='fa fa-phone-square'></i>&nbsp;&nbsp;Inquiry
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link has-arrow " href="Review.php">
                            <i class='fa fa-star'></i>&nbsp;&nbsp;Review
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link has-arrow " data-bs-toggle='modal' data-bs-target='#ChangePassword' href="#">
                            <i class='fa fa-cogs'></i>&nbsp;&nbsp;Change Password
                        </a>
                    </li>
                    <li class="nav-item">
                        <a onclick="confirmLogout()" class="nav-link has-arrow " href="#">
                            <i class='fa fa-sign-out'></i>&nbsp;&nbsp;Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>


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
                                <div class="col-md-12 mb-2">
                                    <b>Old Password</b><span id="lblOldPass" style="color:red">*</span>
                                    <input type="password" name="txtOldPass" class="form-control" id="txtOldPass"
                                        placeholder="Old Password" />
                                </div>
                                <div class="col-md-12 mb-2">
                                    <b>New Password</b><span id="lblNewPass" style="color:red">*</span>
                                    <input type="password" name="txtNewPass" id="txtNewPass" class="form-control"
                                        placeholder="New Password" />
                                </div>
                                <div class="col-md-12 mb-2">
                                    <b>Confirm Password</b><span id="lblConfirmPass" style="color:red">*</span>
                                    <input type="password" name="txtConfirmPass" id="txtConfirmPass"
                                        class="form-control" placeholder="Confirm Password" />
                                </div>
                                <div class="col-md-12 mb-2">
                                    <button style='width: 200px;' type="submit" class="btn btn-primary"
                                        id="btnChangePass" name="btnChangePass">Save</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
        $(document).ready(function() {

            $("#btnChangePass").click(function() {

                var Cnt = 0;

                Cnt = IsEmpty("txtOldPass", "lblOldPass", Cnt);
                Cnt = IsEmpty("txtNewPass", "lblNewPass", Cnt);
                Cnt = IsEmpty("txtConfirmPass", "lblConfirmPass", Cnt);

                var New = $("#txtNewPass").val();
                var Confirm = $("#txtConfirmPass").val();

                if (New != "" && Confirm != "") {
                    if (New == Confirm) {
                        $("#lblConfirmPass").text("*");
                    } else {
                        Cnt++;
                        $("#lblConfirmPass").text("*Password are not Match");
                    }
                }

                if (Cnt == 0) {
                    return true;
                } else {
                    return false;
                }
            });
        });
        </script>