<?php
    include "Top.php";
?>
<div class="page-title">
    <div class="container">
        <div class="page-caption">
            <h2>Company Registration</h2>
            <p><a href="index.php" title="Home">Home</a> <i class="ti-angle-double-right"></i> Company Registration</p>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#txtCourse").change(function(){
            var id =  $("#txtCourse").val();
            $("#txtCollege").load("getData.php?Choice=getColleges&CourseId=" + id);
        });


        $("#btnSubmit").click(function(){
            var Cnt = 0;
            Cnt  = IsEmpty("txtFullname", "lblFullName", Cnt);
            Cnt  = IsEmpty("txtCourse", "lblCourse", Cnt);
            Cnt  = IsEmpty("txtCollege", "lblCollege", Cnt);
            Cnt  = IsEmpty("txtAddress", "lblAddress", Cnt);
            Cnt  = IsEmpty("txtDoB", "lblDoB", Cnt);
            Cnt  = IsEmpty("txtGender", "lblGender", Cnt);
            Cnt  = IsEmpty("txtUsername", "lblUsername", Cnt);
            Cnt  = IsEmpty("txtPasswd", "lblPasswd", Cnt);
            Cnt  = IsEmpty("txtConfirm", "lblConfirm", Cnt);
            Cnt  = IsEmpty("txtContactNo", "lblContactNo", Cnt);
            Cnt  = IsEmpty("txtEmail", "lblEmail", Cnt);

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

<section class="padd-top-80">
    <div class="container">
        <div class="log-box">
            <form enctype='multipart/form-data' method='post' class="log-form">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Company Name</label>
                        <span id='lblCompany'></span>
                        <input type="text" oninput="this.value = this.value.toUpperCase()" name='txtCompany' id='txtCompany' class="form-control" placeholder="Company Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Founded Date</label>
                        <span id='lblFoundedDate'></span>
                        <input type="date" name='txtFoundedDate' id='txtFoundedDate' class="form-control" placeholder="Founded Date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Revenue</label>
                        <span id='lblRevenue'></span>
                        <input type="text" name='txtRevenue' id='txtRevenue' class="form-control" placeholder="Revenue">
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label>About Company</label>
                        <span id='lblAboutus'></span>
                        <input type="text" id='txtAboutus' name='txtAboutus' class="form-control" placeholder="About Company">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>CEO</label>
                        <span id='lblCEO'></span>
                        <input type="text" name='txtCEO' id='txtCEO' class="form-control" placeholder="CEO">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Owner</label>
                        <span id='lblOwner'></span>
                        <input type="text" name='txtOwner' id='txtOwner' class="form-control" placeholder="Owner">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Address</label>
                        <span id='lblAddress'></span>
                        <input type="text" id='txtAddress' name='txtAddress' class="form-control" placeholder="Address">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Contact No</label>
                        <span id='lblContactNo'></span>
                        <input type="text" name='txtContactNo' id='txtContactNo' class="form-control" placeholder="Contact No">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Email</label>
                        <span id='lblEmail'></span>
                        <input type="text" id='txtEmail' name='txtEmail' class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>UserName</label>
                        <span id='lblUsername'></span>
                        <input type="text" oninput="this.value = this.value.toUpperCase()" id='txtUsername' name='txtUsername' class="form-control" placeholder="UserName">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Password</label>
                        <span id='lblPasswd'></span>
                        <input type="password" id='txtPasswd' name='txtPasswd' class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <span id='lblConfirm'></span>
                        <input type="password" id='txtConfirm' name='txtConfirm' class="form-control" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Company Logo</label>
                        <span id='lblPhoto'></span>
                        <input type="file" id='txtFile' name='txtFile' class="form-control" placeholder="file">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group text-center mrg-top-15">
                        <button type="submit" name='btnSubmit' id='btnSubmit' class="btn theme-btn btn-m full-width">Sign Up</button>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <p class="message">Already have an account? <a href="Company/Authentication.php">Sign In</a></p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</section>

<?php
    if (isset($_POST["btnSubmit"]))
    {
        $CompanyName = $_POST["txtCompany"];
        $FoundedDate = $_POST["txtFoundedDate"];
        $Revenue = $_POST["txtRevenue"];
        $AboutCompany = $_POST["txtAboutus"];
        $CEO = $_POST["txtCEO"];
        $OwnerName = $_POST["txtOwner"];
        $Address = $_POST["txtAddress"];
        $ContactNo = $_POST["txtContactNo"];
        $Email = $_POST["txtEmail"];
        $UserName = $_POST["txtUsername"];
        $Password = $_POST["txtPasswd"];
        $Photo = $_FILES["txtFile"]["name"];

        move_uploaded_file($_FILES["txtFile"]["tmp_name"], "CompanyPhoto/$Photo");      

        $Query="INSERT INTO `ip`.`companymaster` (`CompanyId`, `CompanyName`, `FoundedDate`, `Revenue`, `AboutCompany`, `CEO`, `OwnerName`, `Address`, `ContactNo`, `Email`, `UserName`, `Password`, `Photo`) VALUES 
                (NULL, '$CompanyName', '$FoundedDate', '$Revenue', '$AboutCompany', '$CEO', '$OwnerName', '$Address', 
                       '$ContactNo', '$Email', '$UserName', '$Password', '$Photo');";
        if (!mysqli_query($Con, $Query))
        {
            echo mysqli_error($Con);
        }
?>
    <script>
        alert("Successfully Registered");
        window.location.href  = "Company/Authentication.php";
    </script>
<?php
    }
?>  

<?php 
    include "Bottom.php";
?>