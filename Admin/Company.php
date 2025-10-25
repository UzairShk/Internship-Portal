<?php include "Top.php"; ?>
<form method='post' id="app-content">
    <div class="app-content-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="mb-5">
                        <h3 class="mb-0">Company Master</h3>
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
                                            <th>FoundedDate</th>
                                            <th>Revenue</th>
                                            <th>About Company</th>
                                            <th>CEO</th>
                                            <th>Owner</th>
                                            <th>Address</th>
                                        </tr>
                                        <?php
                                            $Query = "select * from companymaster";
                                            $res = mysqli_query($Con, $Query);
                                            while ($row = mysqli_fetch_assoc($res))
                                            {
                                        ?>
                                                <tr>
                                                    <td><?php echo $row["CompanyName"]; ?></td>
                                                    <td>
                                                        <?php echo $row["FoundedDate"]; ?>
                                                    </td>
                                                    <td><?php echo $row["Revenue"]; ?></td>
                                                    <td><?php echo $row["AboutCompany"]; ?></td>
                                                    <td><?php echo $row["CEO"]; ?></td>
                                                    <td><?php echo $row["OwnerName"]; ?></td>
                                                    <td>
                                                        <?php echo $row["Address"]; ?><br>
                                                        <?php echo $row["ContactNo"]; ?><br>
                                                        <?php echo $row["Email"]; ?>
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