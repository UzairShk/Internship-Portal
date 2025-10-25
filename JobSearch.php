<?php
    include "Top.php";
?>
<!-- ======================= Start Banner ===================== -->
<div class="page-title">
    <div class="container">
        <div class="page-caption">
            <h2>Search</h2>
            <p><a href="index.php" title="Home">Home</a> <i class="ti-angle-double-right"></i> Search</p>
        </div>
    </div>
</div>
<!-- ======================= End Banner ===================== -->

<!-- ================= Job start ========================= -->
<section class="padd-top-80 padd-bot-80">
    <div class="container">
        <div class="tab-content">
            <div class="tab-pane fade in show active" id="recent" role="tabpanel">
                <div class="row">

                    <?php
                        $Query = "select * from internprogram as a 
                                           join companymaster as b on a.CompanyId = b.CompanyId where Category= '".str_replace("-", "&", $_REQUEST["Search"])."'";
                        $res = mysqli_query($Con, $Query);
                        while ($row = mysqli_fetch_assoc($res))
                        {
                    ?>
                    <!-- Single Job -->
                    <div class="col-md-3 col-sm-6">
                        <div class="utf_grid_job_widget_area">
                            <div class="utf_job_like">
                                <label class="toggler toggler-danger">
                                    <input type="checkbox" checked>
                                    <i class="fa fa-heart"></i>
                                </label>
                            </div>
                            <div class="u-content">
                                <div class="box-80"> 
                                    <a href="CompanyDetail.php?IpId=<?php echo $row["IpId"]; ?>"> 
                                        <img style='height: 100px; width: 100%;' src="CompanyPhoto/<?php echo $row["Photo"]; ?>" alt="">
                                    </a>
                                </div>
                                <h5><a href="CompanyDetail.php?IpId=<?php echo $row["IpId"]; ?>"><?php echo $row["Title"]; ?></a></h5>
                                <p class="text-muted"><?php echo $row["Requirement"]; ?></p>
                            </div>
                            <div class="utf_apply_job_btn_item"> <a href="CompanyDetail.php?IpId=<?php echo $row["IpId"]; ?>"
                                    class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="newsletter theme-bg" style="background-image:url(Content/assets/img/bg-new.png)">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="heading light">
                    <h2>About Internship</h2>
                    <p>Welcome to our internship portal, your gateway to valuable professional opportunities! Our platform serves as a dynamic hub connecting ambitious students and recent graduates with diverse internship opportunities across various industries.
                        Discover internships tailored to your interests, skills, and career goals with ease. Whether you're seeking hands-on experience in technology, finance, marketing, healthcare, or any other field, our portal provides a comprehensive range of opportunities to explore.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    include "Bottom.php";
?>