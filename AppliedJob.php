<?php
    include "Top.php";
?>
<form method='post'>
    <div class="page-title">
        <div class="container">
            <div class="page-caption">
                <h2>Applied Job</h2>
                <p><a href="index.php" title="Home">Home</a> <i class="ti-angle-double-right"></i> Applied Job</p>
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
                                <div class="col-md-12">
                                    <table class='table table-bordered'>
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Salary</th>
                                                <th>CompanyName</th>
                                                <th>Apply Date</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $Query = "select * from internprogram as a join candidatemaster as b on a.IpId = b.IpId join companymaster as c on a.CompanyId = c.CompanyId and b.InternId = ".$_SESSION["InternId"];

                                                $res = mysqli_query($Con, $Query);

                                                while ($row = mysqli_fetch_assoc($res))
                                                {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row["Title"]; ?><br />
                                                        <?php echo $row["Requirement"]; ?>
                                                    </td>
                                                    <td>₹<?php echo $row["Salary"]; ?></td>
                                                    <td><?php echo $row["CompanyName"]; ?></td>
                                                    <td><?php echo $row["ApplyDate"]; ?></td>
                                                    <td class='text-center'><a href="CompanyDetail.php?IpId=<?php echo $row["IpId"]; ?>"><i class='fas fa-list'></i></a></td>
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
            </div>
        </div>
    </section>
</form>

<?php 
    include "Bottom.php";
?>