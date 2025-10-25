<?php 
    include "Top.php"; 
    $IPId = $_REQUEST["Id"];
    $Query = "select *, (select count(*) from candidatemaster as b where b.IpId = a.IpId) as 'InternCount' from internprogram as a where a.IpId =$IPId";
    $res = mysqli_query($Con, $Query);
    $row = mysqli_fetch_assoc($res);
?>
<form method='post' id="app-content">
    <div class="app-content-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="mb-5">
                        <h3 class="mb-0"><?php echo $row["Title"];  ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <b>Description</b><br>
                                            <?php echo $row["JobDescription"];  ?>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <b>Salary</b><br>
                                            <?php echo $row["Salary"];  ?>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <b>Requirement</b><br>
                                            <?php echo $row["Requirement"];  ?>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-12 form-group" style='margin-top: 10px;'>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Course</th>
                                                <th>Gender</th>
                                                <th>Contact No</th>
                                                <th>Email</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $CompanyId = $_SESSION["CompanyId"];
                                            $Query = "select *  from candidatemaster as a join internmaster as b on a.InternId = b.InternId join coursemaster as c on b.CourseId = c.CourseId
                                                                where a.IpId=".$_REQUEST["Id"];
                                            $res = mysqli_query($Con, $Query);
                                            while ($row = mysqli_fetch_assoc($res))
                                            {
                                        ?>
                                        <tr>
                                            <td><?php echo $row["FullName"]; ?></td>
                                            <td><?php echo $row["CourseName"]; ?></td>
                                            <td><?php echo $row["Gender"]; ?></td>
                                            <td><?php echo $row["ContactNo"]; ?></td>
                                            <td><?php echo $row["Email"]; ?></td>
                                            <td class='text-center' style='width: 100px'>
                                                <a target="_blank" href="CandidateProfile.php?Id=<?php echo $row["InternId"]; ?>&IPId=<?php echo $_REQUEST["Id"]; ?>"><i class='fas fa-list'></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        $(document).ready(function(){
            $("#btnSave").click(function(){
                var candidats = [];
                $("input[type='checkbox']:checked").each(function(){
                    candidats.push({
                        "CandidateId" : $(this).val()
                    });
                });
                $("#txtCandidates").val(JSON.stringify(candidats));
            });
        });
    </script>

    <?php
        if (isset($_REQUEST["DelId"]))
        {
            $Query = "Delete from  internprogram where IpId=".$_REQUEST["DelId"];
            mysqli_query($Con, $Query);
    ?>
        <script>
            alert("Remove Successfully");
            window.location.href = "PostJob.php";
        </script>
    <?php
        }
    ?>

    <script>
    function deleteCourseData(Id) {
        if (confirm("Are you sure want to delete..?")) {
            window.location.href = "PostJob.php?DelId=" + Id;
        }
    }
    </script>

    <div id="IPModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Inter Program</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <b>Title</b>
                            <span id='lblTitle'>*</span>
                            <input type="text" name='txtTitle' id='txtTitle' class='form-control' />
                        </div>
                        <div class="col-md-12 mb-2">
                            <b>Job Description</b>
                            <span id='lblJobDescription'>*</span>
                            <textarea name='txtJobDescription' id='txtJobDescription' class='form-control'>
                            </textarea>
                        </div>

                        <div class="col-md-12 mb-2">
                            <b>Requirement</b>
                            <span id='lblRequirement'>*</span>
                            <input type="text" name='txtRequirement' id='txtRequirement' class='form-control' />
                        </div>
                        <div class="col-md-6 mb-2">
                            <b>Salary</b>
                            <span id='lblSalary'>*</span>
                            <input type="text" name='txtSalary' id='txtSalary' class='form-control' />
                        </div>
                        <div class="col-md-6 mb-2">
                            <b>Last Date</b>
                            <span id='lblLastDate'>*</span>
                            <input type="date" name='txtLastDate' id='txtLastDate' class='form-control' />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id='btnSave' name='btnSave' class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" onclick='cancel()'>Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php
        if (isset($_POST["btnSave"]))
        {

            $CompanyId =  $_SESSION["CompanyId"];
            $Title = $_POST["txtTitle"];
            $JobDescription = $_POST["txtJobDescription"];
            $Salary = $_POST["txtSalary"];
            $Requirement = $_POST["txtRequirement"];
            $LastDate = $_POST["txtLastDate"];

            $Query="INSERT INTO `ip`.`internprogram` (`IpId`, `CompanyId`, `Title`, `JobDescription`, `Salary`, `Requirement`, `LastDate`) VALUES 
                                                     (NULL, '$CompanyId', '$Title', '$JobDescription', '$Salary', '$Requirement', '$LastDate');";

            if (mysqli_query($Con, $Query))
            {
    ?>
    <script>
    alert("Successfully Saved");
    window.location.href = "";
    </script>
    <?php
            }
            else
            {
                echo mysqli_error($Con);
            }
        }
    ?>
</form>
<?php include "Bottom.php"; ?>