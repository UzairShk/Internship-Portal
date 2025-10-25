<?php 
    include "Top.php"; 
?>
<form method='post' id="app-content">
    <div class="app-content-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="mb-5">
                        <h3 class="mb-0">Reviews</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-md-12 form-group" style='margin-top: 10px;'>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Gender</th>
                                                <th>Contact No</th>
                                                <th>Email</th>
									            <th>Message</th>
									            <th>Date</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $CompanyId = $_SESSION["CompanyId"];
                                            $Query = "select * from companyreview as a join internmaster as b on a.InternId = b.InternId and a.CompanyId=$CompanyId";
                                            $res = mysqli_query($Con, $Query);
                                            while ($row = mysqli_fetch_assoc($res))
                                            {
                                        ?>
                                        <tr>
                                            <td><?php echo $row["FullName"]; ?></td>
                                            <td><?php echo $row["Gender"]; ?></td>
                                            <td><?php echo $row["ContactNo"]; ?></td>
                                            <td><?php echo $row["Email"]; ?></td>
								    <td>
								    <?php
										for ($i = 1; $i <= $row["Ratings"]; $i++)
										{
											echo "<i class='fas fa-star' style='color: green;'></i>";
										}
										echo "<br />".$row["Comment"]; 
									?>
									</td>
								    <td><?php echo $row["ReviewDate"]; ?></td>
                                            <td class='text-center' style='width: 5px'>
                                                <a target="_blank" href="CandidateProfile.php?Id=<?php echo $row["InternId"]; ?>"></a>
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