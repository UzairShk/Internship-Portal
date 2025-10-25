<?php 
    include "Top.php"; 
    $Query = "select (select count(*) from companymaster) as 'Companies', 
                     (select count(*) from internmaster) as 'Intern', 
                     (select count(*) from colleges) as 'Colleges', 
                     (select count(*) from coursemaster) as 'Course',
                     (select count(*) from feedback) as 'Feedback'";

    $res= mysqli_query($Con, $Query);
    $row = mysqli_fetch_assoc($res);
?>
<form method='post' id="app-content">
    <div class="app-content-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="mb-5">
                        <h3 class="mb-0">Home</h3>
                    </div>
                </div>
            </div>
            <div class="row">

            <div class="col-xl-3 mb-5">
                    <div class="col">
                        <div class="card h-100 card-lift">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-semi-bold ">Courses</span>
                                </div>
                                <div class="mt-4 mb-2 ">
                                    <h3 class="fw-bold mb-0"><?php echo $row["Course"]; ?></h3>
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
                                    <span class="fw-semi-bold ">Colleges</span>
                                </div>
                                <div class="mt-4 mb-2 ">
                                    <h3 class="fw-bold mb-0"><?php echo $row["Colleges"]; ?></h3>
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
                                    <span class="fw-semi-bold ">Intern</span>
                                </div>
                                <div class="mt-4 mb-2 ">
                                    <h3 class="fw-bold mb-0"><?php echo $row["Intern"]; ?></h3>
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
                                    <span class="fw-semi-bold ">Companies</span>
                                </div>
                                <div class="mt-4 mb-2 ">
                                    <h3 class="fw-bold mb-0"><?php echo $row["Companies"]; ?></h3>
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
                                    <span class="fw-semi-bold ">Feedback</span>
                                </div>
                                <div class="mt-4 mb-2 ">
                                    <h3 class="fw-bold mb-0"><?php echo $row["Feedback"]; ?></h3>
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