<?php 
    include "Top.php"; 
    $IPId = $_REQUEST["Id"];
    $Query = "select *, (select count(*) from candidatemaster as b where b.IpId = a.IpId) as 'InternCount' from internprogram as a where a.IpId =$IPId";
    $res = mysqli_query($Con, $Query);
    $row = mysqli_fetch_assoc($res);
?>
<form method='post' id="app-content">
	<div id="NotificationModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Notification</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<b>Message</b>
							<span id='lblMessage'>*</span>
							<textarea name="txtMessage" id="txtMessage" class='form-control'></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name='btnSaveNotification' id='btnSaveNotification' class="btn btn-success">Send</button>
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<?php
		if (isset($_POST["btnSaveNotification"]))
		{
			$IpId = $_REQUEST["Id"];
			$Message = $_POST["txtMessage"];
			$NotificationDateTime = date("Y-m-d h:i:s");
			$Query="INSERT INTO `ip`.`notification` (`NotificationId`, `IpId`, `Message`, `NotificationDateTime`) VALUES 
                                (NULL, '$IpId', '$Message', '$NotificationDateTime');";

                if (mysqli_query($Con, $Query))
                {
     ?>
		<script>
			alert("Successfully Send to all Short listed candidates");
		</script>
	<?php
                }
                else
                {
                    echo mysqli_error($Con);
                }
		}
	?>
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
								<div class="col-md-12 mb-2">
									<button data-bs-toggle='modal' data-bs-target='#NotificationModal' type='button' class='btn btn-primary'>Make an Notification</button>
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
                                            $Query = "select *  from candidatemaster as a join internmaster as b on a.InternId = b.InternId join coursemaster as c on b.CourseId = c.CourseId join shortlistmaster as d on d.CandidateId= a.InternId
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
                                            <td class='text-center' style='width: 5px'>
                                                <a target="_blank" href="CandidateProfile.php?Id=<?php echo $row["InternId"]; ?>&IpId=<?php echo $_REQUEST["Id"]; ?>"></i></a>
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