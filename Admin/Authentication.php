<!DOCTYPE html>
<html lang="en">

<?php
    $Con = mysqli_connect("localhost", "root", "", "ip");
    session_start();
    include "../PHPMailer/Mail.php";
    
?>

<head>
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


    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon"
        href="https://dashui.codescandy.com/dashuipro/assets/images/favicon/favicon.ico">


    <!-- Libs CSS -->
    <link href="../Content/Admin_Assets/assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../Content/Admin_Assets/assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="../Content/Admin_Assets/assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">

    <script src="../Content/Admin_Assets/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../Content/Validation.js"></script>
    <!-- Theme CSS -->
    <link rel="stylesheet" href="../Content/Admin_Assets/assets/css/theme.min.css">
    <title>Sign In</title>
</head>

<body>
    <!-- container -->
    <main class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center g-0
        min-vh-100">
            <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
                <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle d-none ">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>

                </a>
                <!-- Card -->
                <div class="card smooth-shadow-md">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <strong style='color: blue;font-size: 30px;'>Internship Portal</strong>
                            <p class="mb-6">Admin Please enter your user information.</p>
                        </div>
                        <!-- Form -->
                        <form method='post'>
                            <!-- Username -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Username</label>
                                <span id='lblEmail'></span>
                                <input type="text" id="txtEmail" class="form-control" name="txtEmail"
                                    placeholder="Username" required="">
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <span id='lblPasswd'></span>
                                <input type="password" id="txtPasswd" class="form-control" name="txtPasswd"
                                    placeholder="Password" required="">
                            </div>

                            <!-- Button -->
                            <div class="d-grid">
                                <button type="submit" name='btnLogin' id='btnLogin' class="btn btn-primary">Sign
                                    In</button>

                                    <a data-bs-target='#ForgotPasswordModal' data-bs-toggle='modal' href="#">Forgot Password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    if (isset($_POST["btnLogin"]))
    {
        $Username = $_POST["txtEmail"];
        $Passwd = $_POST["txtPasswd"];

        $Query = "Select * from  adminmaster where UserName='$Username' and Password='$Passwd'";
        $res = mysqli_query($Con, $Query);
        if ($row = mysqli_fetch_assoc($res))
        {

            $_SESSION["AdminId"] = $row["AdminId"];
            $_SESSION["FullName"] = $row["FullName"];
?>
    <script>
    window.location.href = "Home.php";
    </script>
    <?php
        }
        else
        {
?>
    <script>
    alert("Wrong Username or Password");
    </script>
    <?php
        }
    }
?>


<div id="ForgotPasswordModal" class="modal fade" role="dialog">
    <form id="ForgotForm" method='post' class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Forgot Password</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <b>User Name</b><span style="color: red;" id="lblForgotUserName"></span>
                        <input type="text" name="txtForgotUser" placeholder="Write your username to recover password" id="txtForgotUser" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="btnForgot" id="btnForgot" class="btn btn-primary">Recover Password</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <?php
                    if (isset($_POST["btnForgot"]))
                    {
                        $Email = $_POST["txtForgotUser"];
                        $Query = "Select * from adminmaster where Email='$Email'";
                        if (!$res = mysqli_query($Con, $Query))
                        {
                            echo mysqli_error($Con);
                        }

                        if ($row = mysqli_fetch_assoc($res))
                        {
                            $Message = "Dear ".$row["FullName"]." your login details are Username: ".$row["UserName"]." and Password: ".$row["Password"];
                            sendMail($row["Email"], "Forgot Password", $Message);
                ?>
                    <script>
                            alert("Successfully Sent");
                        </script>  
                <?php
                        }
                        else
                        {
                ?>
                        <script>
                            alert("Mail not Found");
                        </script>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </form>
</div>


    


    <!-- Scripts -->
    <!-- Libs JS -->
    <script>
    $(document).ready(function() {
        $("#btnLogin").click(function() {
            var Cnt = 0;
            Cnt = IsEmpty("txtEmail", "lblEmail", Cnt);
            Cnt = IsEmpty("txtPasswd", "lblPasswd", Cnt);

            if (Cnt == 0) {
                return true;
            } else {
                return false;
            }
        });
    });
    </script>
    <script src="../Content/Admin_Assets/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Content/Admin_Assets/assets/libs/feather-icons/dist/feather.min.js"></script>
    <script src="../Content/Admin_Assets/assets/libs/simplebar/dist/simplebar.min.js"></script>




    <!-- Theme JS -->
    <script src="../Content/Admin_Assets/assets/js/theme.min.js"></script>
</body>


<!-- Mirrored from dashui.codescandy.com/dashuipro/pages/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2024 14:15:06 GMT -->

</html>