<?php
    include "Top.php";
?>
<div class="page-title">
    <div class="container">
        <div class="page-caption">
            <h2>Registration</h2>
            <p><a href="index.php" title="Home">Home</a> <i class="ti-angle-double-right"></i> Registration</p>
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
            <form method='post' class="log-form">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Full Name</label>
                        <span id='lblFullName'></span>
                        <input type="text" oninput="this.value = this.value.toUpperCase()" name='txtFullname' id='txtFullname' class="form-control" placeholder="Full Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Course</label>
                        <span id='lblCourse'></span>
                        <select name='txtCourse' id='txtCourse' class='form-control'>
                            <option value="">Select Course</option>
                            <?php
                                $Query = "Select * from coursemaster";
                                $res = mysqli_query($Con, $Query);
                                while ($row = mysqli_fetch_assoc($res))
                                {
                                    $Id = $row["CourseId"];
                                    $Name = $row["CourseName"];
                                    echo "<option value='$Id'>$Name</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Colleges </label>
                        <span id='lblCollege'></span>
                        <select name='txtCollege' id='txtCollege' class='form-control'>
                            <option value="">Select College</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Address</label>
                        <span id='lblAddress'></span>
                        <input type="text" oninput="this.value = this.value.toUpperCase()" id='txtAddress' name='txtAddress' class="form-control" placeholder="Address">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>DOB</label>
                        <span id='lblDoB'></span>
                        <input type="date" id='txtDoB' name='txtDoB' class="form-control" placeholder="DOB">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Gender </label>
                        <span id='lblGender'></span>
                        <select name='txtGender' id='txtGender' class='form-control'>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
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
                <div class="col-md-12">
                    <div class="form-group text-center mrg-top-15">
                        <button type="submit" name='btnSubmit' id='btnSubmit' class="btn theme-btn btn-m full-width">Sign Up</button>
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
        $Fullname = $_POST["txtFullname"];
        $CourseId = $_POST["txtCourse"];
        $Address = $_POST["txtAddress"];
        $Gender = $_POST["txtGender"];
        $DOB = $_POST["txtDoB"];
        $CollegeId = $_POST["txtCollege"];
        $UserName = $_POST["txtUsername"];
        $Password = $_POST["txtPasswd"];
        $ContactNo = $_POST["txtContactNo"];
        $Email = $_POST["txtEmail"];
        $Query="INSERT INTO `ip`.`internmaster` (`InternId`, `FullName`, `CourseId`, `Address`, `Gender`,  `DOB`, `CollegeId`, `UserName`, `Password`, `ContactNo`, `Email`) VALUES 
                                                (NULL, '$Fullname', '$CourseId', '$Address', '$Gender',  '$DOB', '$CollegeId', '$UserName', '$Password', '$ContactNo', '$Email');";
        mysqli_query($Con, $Query);
?>
    <script>
        alert("Successfully Registered");
        window.location.href  = "";
    </script>
<?php
    }
?>  

<?php 
    include "Bottom.php";
?>