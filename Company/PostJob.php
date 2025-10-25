<?php include "Top.php"; ?>
<form method='post' id="app-content">
    <div class="app-content-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <h3 class="mb-0">Intern Progarm</h3>
                    </div>
                </div>
                <div class="col-lg-4 text-right" style='text-align: right;'>
                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#IPModal'>Intern Program</button>
                </div>
            </div>
            <div class="row">
            <?php
                $CompanyId = $_SESSION["CompanyId"];
                $Query = "select *, (select count(*) from candidatemaster as b where b.IpId = a.IpId) as 'InternCount' from internprogram as a where a.CompanyId=$CompanyId";
                $res = mysqli_query($Con, $Query);
                while ($row = mysqli_fetch_assoc($res))
                {
            ?>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                           <div class="card-header">
                               <strong><?php echo $row["Title"]; ?></strong>
                           </div> 
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <strong>Salary</strong><br>
                                        <?php echo $row["Salary"]; ?>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <strong>Requirement</strong><br>
                                        <?php echo $row["Requirement"]; ?>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <strong>Last Date</strong><br>
                                        <?php echo $row["LastDate"]; ?>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <strong>Candidates</strong><br>
                                        <?php echo $row["InternCount"]; ?>
                                    </div>
                                    <div class="col-md-12 mb-2" style='text-align: right;'>
                                        <a href="#" onclick="deleteCourseData(<?php echo $row["IpId"]; ?>)"><i
                                                class='fas fa-trash'></i></a>&nbsp;
                                        <a href="Candidates.php?Id=<?php echo $row["IpId"]; ?>"><i class='fas fa-list'></i> Candidate</a>&nbsp;
                                        <a href="ShortList.php?Id=<?php echo $row["IpId"]; ?>"><i class='fas fa-check-circle'></i> Short List</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
                
            </div>
        </div>
    </div>


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
                    <h4 class="modal-title">Intern Program</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <b>Category</b>
                            <span id='lblCategory'>*</span>
                            <select name='txtCategory' id='txtCategory' class='form-select'>
                                <option value="Web & Software Dev">Web & Software Dev</option>
                                <option value="Data Science & Analitycs">Data Science & Analitycs</option>
                                <option value="Accounting & Consulting">Accounting & Consulting</option>
                                <option value="Writing & Translations">Writing & Translations</option>
                                <option value="Sales & Marketing">Sales & Marketing</option>
                                <option value="Graphics & Design">Graphics & Design</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                                <option value="Education & Training">Education & Training</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2">
                            <b>Title</b>
                            <span id='lblTitle'>*</span>
                            <input type="text" name='txtTitle' id='txtTitle' class='form-control' />
                        </div>
                        <div class="col-md-12 mb-2">
                            <b>Job Description</b>
                            <span id='lblJobDescription'>*</span>
                            <input type="text" name='txtJobDescription' id='txtJobDescription' class='form-control' />
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
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
            $Category = $_POST["txtCategory"];

            $Query="INSERT INTO `ip`.`internprogram` (`IpId`, `CompanyId`, `Title`, `JobDescription`, `Salary`, `Requirement`, `LastDate`, `Category`) VALUES 
                                                     (NULL, '$CompanyId', '$Title', '$JobDescription', '$Salary', '$Requirement', '$LastDate', '$Category');";

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