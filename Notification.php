<?php
    include "Top.php";
?>
<form method='post'>
    <div class="page-title">
        <div class="container">
            <div class="page-caption">
                <h2>Notification</h2>
                <p><a href="index.php" title="Home">Home</a> <i class="ti-angle-double-right"></i> Notification</p>
            </div>
        </div>
    </div>

    <section class="padd-top-80 padd-bot-60">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="row">
						<?php
							$Query = "select * from notification as a join internprogram as b on a.IpId = b.IpId join shortlistmaster as c on b.IpId = c.IpId and c.CandidateId = ".$_SESSION["InternId"];
							$res = mysqli_query($Con, $Query);
							while ($row = mysqli_fetch_assoc($res))
							{
						?>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<a href='CompanyDetail.php?IpId=<?php echo $row["IpId"]; ?>'><?php echo $row["Title"]; ?></a>
								</div>
								<div class="card-body">
									<p>
										<?php echo $row["Message"]; ?>
									</p>
									<p style='text-align: right;'>
										<?php echo $row["NotificationDateTime"]; ?>
									</p>
								</div>
							</div>
						</div>
						<?php
							}
						?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<?php 
    include "Bottom.php";
?>