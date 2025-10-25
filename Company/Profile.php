<?php 
	include "Top.php"; 
	$Query = "select a.*, (select count(*) from internprogram where CompanyId = a.CompanyId) as 'Programs', 
					  (select AVG(Ratings) from companyreview where CompanyId = a.CompanyId) as 'Ratings', 
					  (select count(Ratings) from companyreview where CompanyId = a.CompanyId) as 'Review',
					  (select count(*) from shortlistmaster as short join internprogram as intern on short.IpId = intern.IpId where intern.CompanyId = a.CompanyId) as 'ShortList',
					  (select count(*) from candidatemaster as short join internprogram as intern on short.IpId = intern.IpId where intern.CompanyId = a.CompanyId) as 'Candidates'
			from companymaster as a where a.CompanyId  = ".$_SESSION["CompanyId"];
    	if (!$res = mysqli_query($Con, $Query))
	{
		echo mysqli_error($Con);
	}
    	$row = mysqli_fetch_assoc($res);	
?>
<form method='post' id="app-content">
    <div class="app-content-area">
        <div class="container-fluid">
            <div class="row">
		  	<div class="col-xl-3 mb-5">
                    <div class="col">
                        <div class="card h-100 card-lift">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-semi-bold ">Intern Programs</span>
                                </div>
                                <div class="mt-4 mb-2 ">
                                    <h3 class="fw-bold mb-0"><?php echo $row["Programs"]; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			 <div class="col-xl-3 mb-5">
                    <div class="col">
                        <div class="card h-100 card-lift">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-semi-bold ">Ratings</span>
                                </div>
                                <div class="mt-4 mb-2 ">
                                    <h3 class="fw-bold mb-0"><?php echo round($row["Ratings"]); ?>/5 Total <?php echo round($row["Review"]); ?> User</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			 <div class="col-xl-3 mb-5">
                    <div class="col">
                        <div class="card h-100 card-lift">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-semi-bold ">Short List Intern</span>
                                </div>
                                <div class="mt-4 mb-2 ">
                                    <h3 class="fw-bold mb-0"><?php echo $row["ShortList"]; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			 <div class="col-xl-3 mb-5">
                    <div class="col">
                        <div class="card h-100 card-lift">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-semi-bold ">Candidates</span>
                                </div>
                                <div class="mt-4 mb-2 ">
                                    <h3 class="fw-bold mb-0"><?php echo $row["Candidates"]; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                   <b>Company</b><br />
							<?php echo $row["CompanyName"]; ?>
                                </div>
						  <div class="col-md-3 mb-2">
                                   <b>Founded</b><br />
							<?php echo $row["FoundedDate"]; ?>
                                </div>
						  <div class="col-md-3 mb-2">
                                   <b>Revenue</b><br />
							<?php echo $row["Revenue"]; ?>
                                </div>
						  <div class="col-md-6 mb-2">
                                   <b>CEO</b><br />
							<?php echo $row["CEO"]; ?>
                                </div>
						  <div class="col-md-6 mb-2">
                                   <b>Owner</b><br />
							<?php echo $row["OwnerName"]; ?>
                                </div>
						  <div class="col-md-3 mb-2">
                                   <b>About</b><br />
							<?php echo $row["AboutCompany"]; ?>
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