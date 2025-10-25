<?php include "Top.php"; ?>
<?php
	$Query = "select * from internmaster as a 
					join colleges as b on a.CollegeId = b.CollegeId 
					join coursemaster as c on a.CourseId = c.CourseId 
				where a.InternId=".$_REQUEST["Id"];
	$res = mysqli_query($Con, $Query);
	$row = mysqli_fetch_assoc($res);
?>
<form class='p-3' method='post' id="app-content">
	
	

	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-12">
			<!-- Bg -->
			<div class="pt-20 rounded-top" style="background: url(../Content/Admin_Assets/images/background/profile-cover.jpg)
				no-repeat;
				background-size: cover;">
			</div>
			<!-- text -->
			<div class="card rounded-bottom smooth-shadow-sm">
				<div class="d-flex align-items-center
				justify-content-between pt-4 pb-6 px-4">
					<div class="d-flex align-items-center">
						<div class="lh-1">
							<h2 class="mb-0"><?php echo $row["FullName"]; ?></h2>
							<p class="mb-0 d-block"><?php echo $row["Email"]; ?></p><br />
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="col-md-12 mt-2">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-6 mb-2">
							<b>Address</b><br />
							<span><?php echo $row["Address"]; ?></span>
						</div>
						<div class="col-md-2 mb-2">
							<b>Gender</b><br />
							<span><?php echo $row["Gender"]; ?></span>
						</div>
						<div class="col-md-2 mb-2">
							<b>DOB</b><br />
							<span><?php echo $row["DOB"]; ?></span>
						</div>
						<div class="col-md-2 mb-2">
							<b>ContactNo</b><br />
							<span><?php echo $row["ContactNo"]; ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12 mt-2">
			<div class="card">
				<div class="card-header">
					<strong>Personal Details</strong>
				</div>
				<div class="card-body">
					<?php
						$Query = "Select * from personaldatail where InternId=".$_REQUEST["Id"];
						$res= mysqli_query($Con, $Query);
						$Certirow = mysqli_fetch_assoc($res);
					?>
					<div class="row">
						<div class="col-md-6 mb-2">
							<b>Father</b><br />
							<span><?php echo $Certirow["FatherName"]; ?></span>
						</div>
						<div class="col-md-6 mb-2">
							<b>Mother</b><br />
							<span><?php echo $Certirow["MotherName"]; ?></span>
						</div>
						<div class="col-md-6 mb-2">
							<b>Language Known</b><br />
							<span><?php echo $Certirow["LanguageKnown"]; ?></span>
						</div>
						<div class="col-md-2 mb-2">
							<b>Religion</b><br />
							<span><?php echo $Certirow["Religion"]; ?></span>
						</div>
						<div class="col-md-2 mb-2">
							<b>Cast</b><br />
							<span><?php echo $Certirow["Cast"]; ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12 mt-2">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-6 mb-2">
							<b>College</b><br />
							<span><?php echo $row["CollegeName"]; ?></span>
						</div>
						<div class="col-md-3 mb-2">
							<b>Course</b><br />
							<span><?php echo $row["CourseName"]; ?></span>
						</div>
						<div class="col-md-3 mb-2">
							<b>Stream</b><br />
							<span><?php echo $row["Stream"]; ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12 mt-2">
			<div class="card">
				<div class="card-header">
					<strong>Certification</strong>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12 mb-2">
						<table >
							<thead>
							<tr>
								<th>Course</th>
								<th>Organization</th>
								<th>Issue Date</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$Query = "Select * from certification where InternId=".$_REQUEST["Id"];
								$res= mysqli_query($Con, $Query);
								while ($Certirow = mysqli_fetch_assoc($res))
								{
							?>
							<tr>
								<td><?php echo $Certirow["CourseName"]; ?></td>
								<td><?php echo $Certirow["Organization"]; ?></td>
								<td><?php echo $Certirow["IssuerDate"]; ?></td>
							</tr>
							<?php
								}
							?>
							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		
		<div class="col-md-12 mt-2">
			<div class="card">
				<div class="card-header">
					<strong>Education</strong>
				</div>
				<div class="card-body">
					<table >
						<thead>
							<tr>
								<th>Course</th>
								<th>Percentage</th>
								<th>Exam Name</th>
								<th>Semester</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$Query = "Select * from educationmaster where InternId=".$_REQUEST["Id"];
								$res= mysqli_query($Con, $Query);
								while ($Certirow = mysqli_fetch_assoc($res))
								{
							?>
							<tr>
								<td><?php echo $Certirow["CourseName"]; ?></td>
								<td><?php echo $Certirow["Percentage"]; ?></td>
								<td><?php echo $Certirow["ExamName"]; ?></td>
								<td><?php echo $Certirow["Semester"]; ?></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>


		

	</div>
	
</form>
<?php include "Bottom.php"; ?>