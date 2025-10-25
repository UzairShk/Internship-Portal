<?php
    include "Top.php";
    $Id = $_REQUEST["IpId"];
    $Query = "select * from internprogram as a 
                       join companymaster as b on a.CompanyId = b.CompanyId where IpId=$Id";
    $res = mysqli_query($Con, $Query);
    $row = mysqli_fetch_assoc($res);
?>
<form method='post'>
    <div class="page-title">
        <div class="container">
            <div class="page-caption">
                <h2>Company Details</h2>
                <p><a href="index.php" title="Home">Home</a> <i class="ti-angle-double-right"></i> Company Details</p>
            </div>
        </div>
    </div>

    <section class="padd-top-80 padd-bot-60">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8 col-sm-7">
                    <div class="detail-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="row">
                                <div class="col-md-4 text-center"> <img style='width: 100%;'
                                        src="CompanyPhoto/<?php echo $row["Photo"]; ?>" class="width-100" alt="">
                                    <h4 class="meg-0"><?php echo $row["Title"]; ?></h4>
                                    <span><?php echo $row["Address"]; ?></span>
                                    <div class="text-center">
                                        <?php
                                            if (isset($_SESSION["InternId"]))
                                            {
                                        ?>
                                        <button type="submit" id='btnApplyNow' name='btnApplyNow'
                                            class="btn-job theme-btn job-apply">Apply Now</button>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                        <button type="button" data-toggle="modal"
                                                data-target="#LoginModal" 
                                                class="btn-job theme-btn job-apply">Apply Now</button>  
                                        <?php
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                                <div class="col-md-8 user_job_detail">
                                    <div class="col-sm-12 mrg-bot-10"> <i
                                            class="ti-credit-card padd-r-10"></i>₹<?php echo $row["Salary"]; ?></div>
                                    <div class="col-sm-12 mrg-bot-10"> <i
                                            class="ti-mobile padd-r-10"></i><?php echo $row["ContactNo"]; ?>
                                    </div>
                                    <div class="col-sm-12 mrg-bot-10"> <i
                                            class="ti-email padd-r-10"></i><?php echo $row["Email"]; ?>
                                    </div>
                                    <div class="col-sm-12 mrg-bot-10"> <i class="ti-user padd-r-10"></i><span
                                            class="cl-danger"> <?php echo $row["CEO"]; ?></span> </div>
                                    <div class="col-sm-12 mrg-bot-10"> <i
                                            class="ti-shield padd-r-10"></i><?php echo $row["FoundedDate"]; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-wrapper">
                        <div class="detail-wrapper-header">
                            <h4>Job Description</h4>
                        </div>
                        <div class="detail-wrapper-body">
                            <p><?php echo $row["JobDescription"]; ?></p>

                        </div>
                    </div>
                    <div class="detail-wrapper">
                        <div class="detail-wrapper-header">
                            <h4>Job Requirement</h4>
                        </div>
                        <div class="detail-wrapper-body">
                            <?php echo $row["Requirement"]; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <strong style='font-size: 30px;'>Reviews</strong>
                            <hr>
                            <?php
                                $Query = "select * from companyreview as a 
                                                    join internmaster as b on a.InternId = b.InternId 
                                                where CompanyId = (select CompanyId from internprogram where IpId=".$_REQUEST["IpId"].")";

                                $result = mysqli_query($Con, $Query);
                                while ($Reviewrow = mysqli_fetch_assoc($result))
                                {
                            ?>
                                <?php echo $Reviewrow["FullName"]; ?><br>
                                <?php
                                    for ($i = 1; $i <= $Reviewrow["Ratings"]; $i++)
                                    {
                                        echo "<i class='fas fa-star' style='color: green;'></i>";
                                    }
                                ?>
                                <p style='margin-top: -6px;'><?php echo $Reviewrow["Comment"]; ?></p>
                                <p style='text-align: right;'><?php echo $Reviewrow["ReviewDate"]; ?></p>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    
                </div>

                <!-- Sidebar -->
                <div class="col-md-4 col-sm-5">
                    <div class="sidebar">
                        <!-- Start: Job Overview -->
                        <!-- Start: Opening hour -->
                        <div class="widget-boxed">
                            <div class="widget-boxed-header">
                                <h4><i class="ti-time padd-r-10"></i>Opening Hours</h4>
                            </div>
                            <div class="widget-boxed-body">
                                <div class="side-list">
                                    <ul>
                                        <li>Monday <span>9 AM - 5 PM</span></li>
                                        <li>Tuesday <span>9 AM - 5 PM</span></li>
                                        <li>Wednesday <span>9 AM - 5 PM</span></li>
                                        <li>Thursday <span>9 AM - 5 PM</span></li>
                                        <li>Friday <span>9 AM - 5 PM</span></li>
                                        <li>Saturday <span>9 AM - 3 PM</span></li>
                                        <li>Sunday <span>Closed</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p style='text-align: center;'>
                        <button type='button' style='width: 150px;' data-toggle='modal' data-target='#InquiryModal' class='btn btn-primary'>Inquiry</button>&emsp;
                        <button type='button' style='width: 150px;' data-toggle='modal' data-target='#ReviewModal' class='btn btn-primary'>Send Review</button>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div id="InquiryModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Inquiry Form</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <b>Message</b>
                            <span id='lblMessage'></span>
                            <textarea name="txtMessage" id="txtMessage" class='form-control'></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" style='width: 100px;' id='btnSend' name='btnSend' class="btn btn-primary">Send</button>
                    <button type="button" class="btn btn-danger" style='height: 45px;' data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="ReviewModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Review Form</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <b>Message</b>
                            <span id='lblReviewMessage'></span>
                            <textarea name="txtReviewMessage" id="txtReviewMessage" class='form-control'></textarea>
                        </div>
                        <div class="col-md-12 mb-2">
                            <b>Ratings</b>
                            <select name="txtRatings" id="txtRatings" class='form-control'>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" style='width: 100px;' id='btnReviewSend' name='btnReviewSend' class="btn btn-primary">Send</button>
                    <button type="button" class="btn btn-danger" style='height: 45px;' data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST["btnReviewSend"]))
    {
        $InternId = $_SESSION["InternId"];
        $CompanyId = $row["CompanyId"];
        $Comment = $_POST["txtReviewMessage"];
        $Ratings = $_POST["txtRatings"];
        $ReviewDate = date("Y-m-d h:i:s");

        $Query = "delete from companyreview where InternId=$InternId and CompanyId=$CompanyId";
        mysqli_query($Con, $Query);

        $Query = "INSERT INTO `companyreview` (`ReviewId`, `InternId`, `CompanyId`, `Comment`, `Ratings`, `ReviewDate`) VALUES 
                                              (NULL, '$InternId', '$CompanyId', '$Comment', '$Ratings', '$ReviewDate');";

            if (mysqli_query($Con, $Query))
            {
            ?>
                <script>
                alert("Review Successfully Send");
                </script>
            <?php
            }
            else
            {
                echo mysqli_error($Con);
            }
    }

    if (isset($_POST["btnSend"]))
    {
        $InternId = $_SESSION["InternId"];
        $Message = $_POST["txtMessage"];
        $Status = 'UnRead';
        $InquiryDate = date("Y-m-d H:i:s");
        $IpId = $_REQUEST["IpId"];
        $Query="INSERT INTO `ip`.`inquiry` (`InquiryId`, `InternId`, `Message`, `Status`, `InquiryDate`, `IPId`) VALUES 
                                           (NULL, '$InternId', '$Message', '$Status', '$InquiryDate', '$IpId');";

        if (mysqli_query($Con, $Query))
        {
        ?>
            <script>
            alert("Inquiry Successfully Send");
            </script>
        <?php
        }
        else
        {
            echo mysqli_error($Con);
        }
        
    }

    if (isset($_POST["btnApplyNow"]))
    {
        $InternId = $_SESSION["InternId"];
        $IpId = $_REQUEST["IpId"];
        $ApplyDate = date("Y-m-d H:i:s");

        $Query = "select * from candidatemaster where InternId=$InternId and IpId=$IpId";
        $res = mysqli_query($Con, $Query);

        if ($row = mysqli_fetch_assoc($res))
        {
?>
    <script>
    alert("Already Apply for this job");
    </script>
    <?php
        }
        else
        {
            $Query="INSERT INTO `ip`.`candidatemaster` (`CandidateId`, `InternId`, `IpId`, `ApplyDate`,`Status`) VALUES 
                                                       (NULL, '$InternId', '$IpId', '$ApplyDate', 'Intern');";

            if (mysqli_query($Con, $Query))
            {
    ?>
                <script>
                alert("Successfully Apply for this job");
                </script>
    <?php
            }
            else
            {
                echo mysqli_error($Con);
            }
        }
    }
?>
</form>

<?php 
    include "Bottom.php";
?>