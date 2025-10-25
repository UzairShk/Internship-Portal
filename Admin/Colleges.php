<?php include "Top.php"; ?>
<form method='post' id="app-content">
    <div class="app-content-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="mb-5">
                        <h3 class="mb-0">College</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#CollegeModal">Add College</button>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <table class='dt' class='table table-bordered'>
                                        <thead>
                                            <tr>
                                                <th>College</th>
                                                <th>University</th>
                                                <th>Course</th>
                                                <th>Stream</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $Query = "select * from colleges as a join coursemaster as b on a.CourseId = b.CourseId";
                                                $res = mysqli_query($Con, $Query);
                                                while ($row = mysqli_fetch_assoc($res))
                                                {
                                            ?>
                                            <tr>
                                                <td><?php echo $row["CollegeName"]; ?></td>
                                                <td><?php echo $row["Affilieted"]; ?></td>
                                                <td><?php echo $row["CourseName"]; ?></td>
                                                <td><?php echo $row["Stream"]; ?></td>
                                                <td>
                                                    <span><i onclick="fetchData('<?php echo $row["CollegeId"]; ?>', '<?php echo $row["CollegeName"]; ?>', '<?php echo $row["Affilieted"]; ?>', '<?php echo $row["CourseId"]; ?>')" class='fas fa-edit'></i></span>
                                                </td>
                                                <td>
                                                    <span onclick="deleteData(<?php echo $row["CollegeId"]; ?>)"><i class='fas fa-trash'></i></span>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                        if (isset($_POST["btnSave"]))
                                        {
                                            $Course = strtoupper($_POST["txtCourse"]);
                                            $University = strtoupper($_POST["txtUniversity"]);
                                            $College  =  strtoupper($_POST["txtCollege"]);
                                            $Id = $_POST["txtId"];
                                            $Query = "select * from colleges where CollegeName='$College' and CourseId=$Course";
                                            if (!existsData($Query))
                                            {
                                                if ( $Id == 0)
                                                {   
                                                    $Query="INSERT INTO `ip`.`colleges` (`CollegeId`, `CollegeName`, `CourseId`, `Affilieted`) VALUES 
                                                                                        (NULL, '$College', '$Course', '$University');";
                                                }
                                                else
                                                {
                                                    $Query="UPDATE `ip`.`colleges` SET `CollegeName`= '$College', `CourseId`='$Course', `Affilieted`='$University'
                                                                                WHERE `colleges`.`CollegeId` =$Id";

                                                }
                                                if (mysqli_query($Con, $Query))
                                                {
                                        ?>
                                            <script>
                                                alert("Successfully Saved");
                                                //window.location.href = "";
                                            </script>
                                        <?php
                                                }
                                                else
                                                {
                                                    echo mysqli_error($Con);
                                                }
                                            }
                                            else
                                            {
                                                alert("College Already Exists");
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        if (isset($_REQUEST["DelId"]))
        {
            $Id = $_REQUEST["DelId"];
            $Query = "Delete from colleges where CollegeId=$Id";
            mysqli_query($Con, $Query);
    ?>
            <script>
                alert("Deleted Successfully");
                window.location.href = "Colleges.php";
            </script>
    <?php
        }
    ?>
    <input type="hidden" id='txtId' name='txtId' value='0'>
    <script>
        function cancel()
        {
            $("#txtId").val("0");
            $("#txtCollege").val("");
            $("#txtUniversity").val("");
            $("#CollegeModal").modal("hide");
        }

        function fetchData(Id, College, University, Course)
        {
            $("#txtId").val(Id);
            $("#txtCourse").val(Course);
            $("#txtUniversity").val(University);
            $("#txtCollege").val(College);
            $("#CollegeModal").modal("show");
        }

        function deleteData(Id)
        {
            if (confirm("Are you sure want to delete..?"))
            {
                window.location.href = "Colleges.php?DelId=" + Id;
            }
        }
    </script>


    <div id="CollegeModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">College</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <b>College</b>
                            <span id='lblCollege'>*</span>
                            <input type='text' oninput="this.value = this.value.toUpperCase()"  name='txtCollege' id='txtCollege' class='form-control'/>
                        </div>
                        <div class="col-md-12 mb-2">
                            <b>University</b>
                            <span id='lblUniversity'>*</span>
                            <input type='text' name='txtUniversity' oninput="this.value = this.value.toUpperCase()"  id='txtUniversity' class='form-control'/>
                        </div>
                        <div class="col-md-12 mb-2">
                            <b>Course</b>
                            <span id='lblCourse'>*</span>
                            <select name='txtCourse' id='txtCourse' class='form-select'>
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
                </div>
                <div class="modal-footer">
                    <button type="submit" id='btnSave' name='btnSave' class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" onclick='cancel()'>Close</button>
                </div>
            </div>
        </div>
    </div>
</form>





<script>
$(document).ready(function() {

    $("#btnSave").click(function() {
        var Cnt = 0;
        Cnt = IsEmpty("txtCollege", "lblCollege", Cnt);
        Cnt = IsEmpty("txtUniversity", "lblUniversity", Cnt);
        if (Cnt == 0) {
            return true;
        }
        else
        {
            return false;
        }
    });
});
</script>

<?php include "Bottom.php"; ?>