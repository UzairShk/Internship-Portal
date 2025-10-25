<?php
    $Con = mysqli_connect("localhost", "root", "", "ip");

    if (isset($_REQUEST["Choice"]))
    {
        $Choice = $_REQUEST["Choice"];

        switch ($Choice)
        {
            case "getColleges":
                $Id = $_REQUEST["CourseId"];

                if ($Id != "")
                {
                    $Query = "select * from colleges as a join coursemaster as b on a.CourseId = b.CourseId where b.CourseId = $Id";
                    $res = mysqli_query($Con, $Query);
                    echo '<option value="">Select College</option>';
                    while ($row = mysqli_fetch_assoc($res))
                    {
                        $Id = $row["CollegeId"];
                        $Name = $row["CollegeName"];
                        echo "<option value='$Id'>$Name</option>";    
                    }
                }

                
            break;
        }
    }

?>