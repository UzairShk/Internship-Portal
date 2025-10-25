<?php
    include "Top.php";

    if (!isset($_SESSION["InternId"]))
    {
?>
        <script>
            window.location.href = "index.php";
        </script>
<?php
    }

    $Query = "select * from internmaster where InternId = ".$_SESSION['InternId'];
    if (!$res = mysqli_query($Con, $Query))
    {
        echo mysqli_error($Con);
    }
    $internDetail = mysqli_fetch_assoc($res);
?>
<form enctype='multipart/form-data' method='post'>
    <div class="page-title">
        <div class="container">
            <div class="page-caption">
                <h2>Resume Builder</h2>
                <p><a href="index.php" title="Home">Home</a> <i class="ti-angle-double-right"></i> Resume Builder</p>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $("#txtCourse").change(function() {
            var id = $("#txtCourse").val();
            $("#txtCollege").load("getData.php?Choice=getColleges&CourseId=" + id);
        });


        $("#btnSubmit").click(function() {
            var Cnt = 0;
            Cnt = IsEmpty("txtFullname", "lblFullName", Cnt);
            //do validation

            if (Cnt == 0) {
                return true;
            } else {
                return false;
            }
        });

    });
    </script>


    <div class="container" style='margin-top: 20px;'>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Full Name</label>
                    <span id='lblFullName'></span>
                    <input type="text" oninput="this.value = this.value.toUpperCase()" value='<?php echo $internDetail["FullName"] ?>' name='txtFullname'
                        id='txtFullname' class="form-control" placeholder="Full Name">
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
                    <label>College </label>
                    <span id='lblCollege'></span>
                    <select name='txtCollege' id='txtCollege' class='form-control'>
                        <option value="">Select College</option>
                        <?php
                        $Query = "select * from colleges as a where b.CourseId = ".$internDetail["CourseId"];
                        if (!$res = mysqli_query($Con, $Query))
                        {
                            echo mysqli_error($Con);
                        }
                        echo '<option value="">Select College</option>';
                        while ($row = mysqli_fetch_assoc($res))
                        {
                            $Id = $row["CollegeId"];
                            $Name = $row["CollegeName"];
                            echo "<option value='$Id'>$Name</option>";    
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Address</label>
                    <span id='lblAddress'></span>
                    <input value='<?php echo $internDetail["Address"] ?>' type="text" id='txtAddress' oninput="this.value = this.value.toUpperCase()" name='txtAddress'
                        class="form-control" placeholder="Address">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>DOB</label>
                    <span id='lblDoB'></span>
                    <input type="date" id='txtDoB' name='txtDoB' value='<?php echo $internDetail["DOB"] ?>'
                        class="form-control" placeholder="DOB">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Gender </label>
                    <span id='lblGender'></span>
                    <select name='txtGender' id='txtGender' class='form-control'>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Contact No</label>
                    <input type="text" name='txtContactNo' value='<?php echo $internDetail["ContactNo"] ?>'
                        id='txtContactNo' class="form-control" placeholder="Contact No">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" id='txtEmail' name='txtEmail' value='<?php echo $internDetail["Email"] ?>'
                        class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group mrg-top-15">
                    <button type="submit" style='width: 200px;' name='btnSubmit' id='btnSubmit' class="btn btn-primary">Save
                        Profile</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container" style='margin-top: 20px;'>
        <div class="row">
            <div class="col-md-12">
                <button type="button" style='width: 200px;' class="btn btn-primary" data-toggle="modal"
                    data-target="#CertificationModal">Certification &emsp; <i class='fas fa-plus-square'></i></button>
            </div>

            <div class="col-md-12">
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Organization</th>
                            <th>Issue Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $Query = "Select * from certification where InternId=".$_SESSION["InternId"];
                            $res= mysqli_query($Con, $Query);
                            while ($Certirow = mysqli_fetch_assoc($res))
                            {
                        ?>
                        <tr>
                            <td><?php echo $Certirow["CourseName"]; ?></td>
                            <td><?php echo $Certirow["Organization"]; ?></td>
                            <td><?php echo $Certirow["IssuerDate"]; ?></td>
                            <td class='text-center' style='width: 100px'>
                                <a target='_blank' href="Content/Certification/<?php echo $Certirow["Entra"]; ?>"><i
                                        class='fas fa-download'></i></a>&emsp;
                                <a href="#" onclick="deleteData(<?php echo $Certirow["CertificationId"]; ?>)"><i
                                        class='fas fa-trash'></i></a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
        include "CertificationPopup.php";
    ?>

    <div class="container" style='margin-top: 20px;'>
        <div class="row">
            <div class="col-md-12">
                <button type="button" style='width: 200px;' class="btn btn-primary" data-toggle="modal"
                    data-target="#EducationModal">Education &emsp; <i class='fas fa-plus-square'></i> </button>
            </div>

            <div class="col-md-12">
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Percentage</th>
                            <th>Exam Name</th>
                            <th>Semester</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $Query = "Select * from educationmaster where InternId=".$_SESSION["InternId"];
                            $res= mysqli_query($Con, $Query);
                            while ($Certirow = mysqli_fetch_assoc($res))
                            {
                        ?>
                        <tr>
                            <td><?php echo $Certirow["CourseName"]; ?></td>
                            <td><?php echo $Certirow["Percentage"]; ?></td>
                            <td><?php echo $Certirow["ExamName"]; ?></td>
                            <td><?php echo $Certirow["Semester"]; ?></td>
                            <td class='text-center' style='width: 100px'>
                                <a href="#" onclick="deleteCourseData(<?php echo $Certirow["EducationId"]; ?>)"><i
                                        class='fas fa-trash'></i></a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
        include "EducationPopup.php";
    ?>

    <div class="container" style='margin-top: 20px;'>
        <div class="row">
            <div class="col-md-12">
                <button type="button" style='width: 200px;' class="btn btn-primary" data-toggle="modal"
                    data-target="#PersonalModal">Personal Details &emsp; <i class='fas fa-plus-square'></i></button>
            </div>

            <div class="col-md-12">
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Father</th>
                            <th>Mother</th>
                            <th>Language Known</th>
                            <th>Natianility</th>
                            <th>Religion</th>
                            <th>Cast</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $Query = "Select * from personaldatail where InternId=".$_SESSION["InternId"];
                            $res= mysqli_query($Con, $Query);
                            while ($Certirow = mysqli_fetch_assoc($res))
                            {
                        ?>
                        <tr>
                            <td><?php echo $Certirow["FatherName"]; ?></td>
                            <td><?php echo $Certirow["MotherName"]; ?></td>
                            <td><?php echo $Certirow["LanguageKnown"]; ?></td>
                            <td><?php echo $Certirow["Natianility"]; ?></td>
                            <td><?php echo $Certirow["Religion"]; ?></td>
                            <td><?php echo $Certirow["Cast"]; ?></td>
                            <td class='text-center' style='width: 100px'>
                                <a href="#" onclick="deleteCourseData(<?php echo $Certirow["PId"]; ?>)"><i
                                        class='fas fa-trash'></i></a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include "PersonalPopup.php"; ?>
    <?php
    if (isset($_POST["btnSubmit"]))
    {
        $Fullname = $_POST["txtFullname"];
        $CourseId = $_POST["txtCourse"];
        $Address = $_POST["txtAddress"];
        $Gender = $_POST["txtGender"];
        $DOB = $_POST["txtDoB"];
        $CollegeId = $_POST["txtCollege"];
        $ContactNo = $_POST["txtContactNo"];
        $Email = $_POST["txtEmail"];
        $InternId = $_SESSION["InternId"];
        $Query="UPDATE `ip`.`internmaster`  SET `FullName`= '$Fullname', `CourseId`='$CourseId', `Address`='$Address', `Gender`='$Gender',
                                                `DOB`='$DOB', `CollegeId`='$CollegeId',
                                                `ContactNo`='$ContactNo', `Email`='$Email'
                                            WHERE `internmaster`.`InternId` =$InternId";
        mysqli_query($Con, $Query);
?>
    <script>
    alert("Successfully Updated");
    window.location.href = "";
    </script>
    <?php
    }
?>
    <script>
    $(document).ready(function() {
        $("#txtCourse").val(<?php echo $internDetail["CourseId"]; ?>);
        setTimeout(() => {
            var id = $("#txtCourse").val();
            $("#txtCollege").load("getData.php?Choice=getColleges&CourseId=" + id);
            setTimeout(() => {
                $("#txtCollege").val(<?php echo  $internDetail["CollegeId"];  ?>);
            }, 1000);
        }, 1000);

    });
    </script>
</form>
<?php 
    include "Bottom.php";
?>