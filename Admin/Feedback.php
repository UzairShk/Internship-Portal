<?php include "Top.php"; ?>
<form method='post' id="app-content">
    <div class="app-content-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="mb-5">
                        <h3 class="mb-0">Feedback</h3>
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
                                            <th>College</th>
                                            <th>Feedback</th>
								            <th>Feedback Date</th>
                                        </tr>
                                        <?php
                                            $Query = "select * from internmaster as a join colleges as b on a.CollegeId = b.CollegeId join coursemaster as c on a.CourseId = c.CourseId
								    					join feedback as d on a.InternId = d.InternId";
                                            if (!$res = mysqli_query($Con, $Query))
                                            {
                                                echo mysqli_error($Con);
                                            }
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
                                                    <td><?php echo $row["CollegeName"]; ?></td>
										  <td><?php echo $row["Comment"]; ?></td>
                                                    <td><?php echo $row["FeedbackDate"]; ?></td>
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