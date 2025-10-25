<div id="PersonalModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Personal Detail</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Father</label>
                        <span id='lblFather'></span>
                        <input type="text" oninput="this.value = this.value.toUpperCase()" name='txtFather' id='txtFather'
                            class="form-control" placeholder="Father Name">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Mother</label>
                        <span id='lblMother'></span>
                        <input type="text" oninput="this.value = this.value.toUpperCase()" name='txtMother' id='txtMother' class="form-control"
                            placeholder="Mother">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Language</label>
                        <span id='lblLanguage'></span>
                        <input type="text" oninput="this.value = this.value.toUpperCase()" name='txtLanguage' id='txtLanguage' class="form-control"
                            placeholder="Language For e.g Hindi, English">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Nationality</label>
                        <span id='lblNationality'></span>
                        <input type="text" oninput="this.value = this.value.toUpperCase()" name='txtNationality' id='txtNationality' class="form-control"
                            placeholder="Nationality">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Religion</label>
                        <span id='lblReligion'></span>
                        <input type="text" oninput="this.value = this.value.toUpperCase()" name='txtReligion' id='txtReligion' class="form-control"
                            placeholder="Religion">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Cast</label>
                        <span id='lblCast'></span>
                        <input type="text" oninput="this.value = this.value.toUpperCase()" name='txtCast' id='txtCast' class="form-control"
                            placeholder="Cast">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id='btnPersonalSave' name='btnPersonalSave' style='width: 150px'
                    class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-primary" style='width: 150px; background-color: red;'
                    data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<?php
    if (isset($_REQUEST["PersonalDelId"]))
    {
        $Query = "Delete from  personaldatail where PId=".$_REQUEST["PersonalDelId"];
        mysqli_query($Con, $Query);
?>
<script>
alert("Remove Successfully");
window.location.href = "ResumeBuilder.php";
</script>
<?php
    }

    if (isset($_POST["btnPersonalSave"]))
    {
        $InternId = $_SESSION["InternId"];
        $FatherName = $_POST["txtFather"];
        $MotherName = $_POST["txtMother"];
        $LanguageKnown = $_POST["txtLanguage"];
        $Natianility = $_POST["txtNationality"];
        $Religion = $_POST["txtReligion"];
        $Cast = $_POST["txtCast"];

        $Query = "Delete from personaldatail where InternId=$InternId";
        mysqli_query($Con, $Query);

        $Query="INSERT INTO `ip`.`personaldatail` (`PId`, `InternId`, `FatherName`, `MotherName`, `LanguageKnown`, `Natianility`, `Religion`, `Cast`) VALUES 
                                                  (NULL, '$InternId', '$FatherName', '$MotherName', '$LanguageKnown', '$Natianility', '$Religion', '$Cast');";

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
        window.location.href = "ResumeBuilder.php?PersonalDelId=" + Id;
    }
}
</script>