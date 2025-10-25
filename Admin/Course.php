<?php include "Top.php"; ?>
<form method='post' id="app-content">
    <div class="app-content-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="mb-5">
                        <h3 class="mb-0">Course</h3>
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
                                        data-bs-target="#CourseModal">Add Course</button>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <table class='dt' class='table table-bordered'>
                                        <thead>
                                            <tr>
                                                <th>Course</th>
                                                <th>Stream</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $Query = "Select * from coursemaster";
                                                $res = mysqli_query($Con, $Query);
                                                while ($row = mysqli_fetch_assoc($res))
                                                {
                                            ?>
                                            <tr>
                                                <td><?php echo $row["CourseName"]; ?></td>
                                                <td><?php echo $row["Stream"]; ?></td>
                                                <td>
                                                    <span><i onclick="fetchData('<?php echo $row["CourseId"]; ?>', '<?php echo $row["CourseName"]; ?>', '<?php echo $row["Stream"]; ?>')" class='fas fa-edit'></i></span>
                                                </td>
                                                <td>
                                                    <span onclick="deleteData(<?php echo $row["CourseId"]; ?>)"><i class='fas fa-trash'></i></span>
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
                                            $Course = $_POST["txtCourse"];
                                            $Stream = $_POST["txtStream"];
                                            $Id = $_POST["txtId"];
                                            if ( $Id == 0)
                                            {   
                                                $Query = "INSERT INTO `ip`.`coursemaster` (`CourseId`, `CourseName`, `Stream`) VALUES (NULL, '$Course', '$Stream');";
                                            }
                                            else
                                            {
                                                $Query = "Update `ip`.`coursemaster` set  `CourseName`= '$Course', `Stream`='$Stream' where `CourseId`=$Id";
                                            }
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
            $Query = "Delete from coursemaster where CourseId=$Id";
            mysqli_query($Con, $Query);
    ?>
            <script>
                alert("Deleted Successfully");
                window.location.href = "Course.php";
            </script>
    <?php
        }
    ?>
    <input type="hidden" id='txtId' name='txtId' value='0'>
    <script>
        function cancel()
        {
            $("#txtId").val("0");
            $("#txtCourse").val("");
            $("#txtStream").val("");
            $("#CourseModal").modal("hide");
        }

        function fetchData(Id, Course, Stream)
        {
            $("#txtId").val(Id);
            $("#txtCourse").val(Course);
            $("#txtStream").val(Stream);
            $("#CourseModal").modal("show");
        }

        function deleteData(Id)
        {
            if (confirm("Are you sure want to delete..?"))
            {
                window.location.href = "Course.php?DelId=" + Id;
            }
        }
    </script>


    <div id="CourseModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Course</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <b>Course</b>
                            <span id='lblCourse'>*</span>
                            <input type="text" oninput="this.value = this.value.toUpperCase()" name='txtCourse' id='txtCourse' class='form-control' />
                        </div>
                        <div class="col-md-12 mb-2">
                            <b>Stream</b>
                            <span id='lblStream'>*</span>
                            <select name='txtStream' id='txtStream' class='form-select'>
                                <option value="">Select Stream</option>
                                <option value="Computer Science">Computer Science</option>
                                <option value="Science">Science</option>
                                <option value="Commerce">Commerce</option>
                                <option value="Arts">Arts</option>
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
        Cnt = IsEmpty("txtCourse", "lblCourse", Cnt);
        Cnt = IsEmpty("txtStream", "lblStream", Cnt);
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