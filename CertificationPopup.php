<div id="CertificationModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Certification</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Course</label>
                        <span id='lblCourseName'></span>
                        <input type="text" oninput="this.value = this.value.toUpperCase()" name='txtCourseName' id='txtCourseName' class="form-control"
                            placeholder="Course Name">
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Organization</label>
                        <span id='lblOrganization'></span>
                        <input type="text" oninput="this.value = this.value.toUpperCase()" name='txtOrganization' id='txtOrganization' class="form-control"
                            placeholder="Organization">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Issuer Date</label>
                        <span id='lblIssuerDate'></span>
                        <input type="date" name='txtIssuerDate' id='txtIssuerDate' class="form-control"
                            placeholder="Course Name">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Photo</label>
                        <span id='lblPhoto'></span>
                        <input type="file" name='fupInternPhoto' id='fupInternPhoto' class="form-control"
                            placeholder="Course Name">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id='btnCertificateSave' name='btnCertificateSave' style='width: 150px'
                    class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-primary" style='width: 150px; background-color: red;'
                    data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script>
function deleteData(Id) {
    if (confirm("Are you sure want to delete..?")) {
        window.location.href = "ResumeBuilder.php?DelId=" + Id;
    }
}
</script>

<?php
        if (isset($_REQUEST["DelId"]))
        {
            $Query = "Delete from certification where CertificationId=".$_REQUEST["DelId"];
            mysqli_query($Con, $Query);
    ?>
<script>
alert("Remove Successfully");
window.location.href = "ResumeBuilder.php";
</script>
<?php
        }


        if (isset($_POST["btnCertificateSave"]))
        {
            $Course = $_POST["txtCourseName"];
            $IssuerDate = $_POST["txtIssuerDate"];
            $Organization = $_POST["txtOrganization"];
            $File = $_FILES["fupInternPhoto"]["name"];
            $InternId = $_SESSION["InternId"];
            move_uploaded_file($_FILES["fupInternPhoto"]["tmp_name"], "Content/Certification/$File");

            $Query="INSERT INTO `ip`.`certification` (`CertificationId`, `InternId`, `CourseName`, `IssuerDate`, `Organization` , `Entra`) VALUES 
                                                    (NULL, '$InternId', '$Course', '$IssuerDate', '$Organization', '$File');";
            
            mysqli_query($Con, $Query);
    ?>
<script>
alert("Save Successfully");
window.location.href = "ResumeBuilder.php";
</script>
<?php
        }
    ?>

<script>
$(document).ready(function() {
    $("#btnCertificateSave").click(function() {
        var Cnt = 0;
        Cnt = IsEmpty("txtCourseName", "lblCourseName", Cnt);
        Cnt = IsEmpty("txtOrganization", "lblOrganization", Cnt);
        Cnt = IsEmpty("txtIssuerDate", "lblIssuerDate", Cnt);
        Cnt = FileValidtion("fupInternPhoto", "lblPhoto", Cnt);
        if (Cnt == 0) {
            return true;
        } else {
            return false;
        }
    });
});
</script>