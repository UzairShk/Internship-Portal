<?php include "Top.php"; ?>
<form method='post' id="app-content">
    <div class="app-content-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="mb-5">
                        <h3 class="mb-0">Intern Master</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <table>
                                        <tr>
                                            <th>FullName</th>
                                            <th>Address</th>
                                            <th>Course</th>
                                            <th>College</th>
                                            <th></th>
                                        </tr>
                                        <?php
                                            $Query = "select * from internmaster as a join colleges as b on a.CollegeId = b.CollegeId join coursemaster as c on a.CourseId = c.CourseId";
                                            $res = mysqli_query($Con, $Query);
                                            while ($row = mysqli_fetch_assoc($res))
                                            {
                                        ?>
                                                <tr>
                                                    <td><?php echo $row["FullName"]; ?></td>
                                                    <td>
                                                        <?php echo $row["Address"]; ?><br>
                                                        <?php echo $row["ContactNo"]; ?><br>
                                                        <?php echo $row["Email"]; ?>
                                                    </td>
                                                    <td><?php echo $row["CourseName"]; ?></td>
                                                    <td><?php echo $row["CollegeName"]; ?></td>
                                                    <td>
                                                        <a href="CandidateProfile.php?Id=<?php echo $row["InternId"]; ?>"><i class='fas fa-list'></i></a>
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
</form>
<?php include "Bottom.php"; ?>