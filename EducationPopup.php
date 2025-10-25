<div id="EducationModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Education</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Course</label>
                        <span id='lblEducationCourseName'></span>
                    <input type="text" oninput="this.value = this.value.toUpperCase()" name='txtEducationCourseName' id='txtEducationCourseName' class="form-control"
                            placeholder="Course Name">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Exam Name</label>
                        <span id='lblExamName'></span>
                        <input type="text" oninput="this.value = this.value.toUpperCase()" name='txtExamName' id='txtExamName' class="form-control"
                            placeholder="Exam Name">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Percantage</label>
                        <span id='lblPercantage'></span>
                        <input type="text" name='txtPercantage' id='txtPercantage' class="form-control"
                            placeholder="Percentage">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Semester</label>
                        <span id='lblSemester'></span>
                        <input type="text" oninput="this.value = this.value.toUpperCase()" name='txtSemester' id='txtSemester' class="form-control"
                            placeholder="Semester">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id='btnEducationSave' name='btnEducationSave' style='width: 150px'
                    class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-primary" style='width: 150px; background-color: red;'
                    data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<?php
    if (isset($_REQUEST["EducationDelId"]))
    {
        $Query = "Delete from  educationmaster where EducationId=".$_REQUEST["EducationDelId"];
        mysqli_query($Con, $Query);
?>
<script>
alert("Remove Successfully");
window.location.href = "ResumeBuilder.php";
</script>
<?php
    }

    if (isset($_POST["btnEducationSave"]))
    {
        $InternId = $_SESSION["InternId"];
        $CourseName = $_POST["txtEducationCourseName"];
        $Percentage = $_POST["txtPercantage"];
        $ExamName = $_POST["txtExamName"];
        $Semester = $_POST["txtSemester"];

        $Query="INSERT INTO `ip`.`educationmaster` (`EducationId`, `InternId`, `CourseName`, `Percentage`, `ExamName`, `Semester`) VALUES 
                                                   (NULL, '$InternId', '$CourseName', '$Percentage', '$ExamName', '$Semester');";

        if (mysqli_query($Con, $Query))
        {
?>
<script>
alert("Save Successfully");
window.location.href = "";
</script>
<?php
        }
        else
        {
            echo mysqli_error($this->Con);
        }
    }
?>


<script>
$(document).ready(function() {
    $("#btnEducationSave").click(function() {
        var Cnt = 0;
        Cnt = IsEmpty("txtSemester", "lblSemester", Cnt);
        Cnt = IsEmpty("txtPercantage", "lblPercantage", Cnt);
        Cnt = IsEmpty("txtExamName", "lblExamName", Cnt);
        Cnt = IsEmpty("txtEducationCourseName", "lblEducationCourseName", Cnt);
        if (Cnt == 0) {
            return true;
        } else {
            return false;
        }
    });
});
</script>

<script>
function deleteCourseData(Id) {
    if (confirm("Are you sure want to delete..?")) {
        window.location.href = "ResumeBuilder.php?EducationDelId=" + Id;
    }
}
</script>