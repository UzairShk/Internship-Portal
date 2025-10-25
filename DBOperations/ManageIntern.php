<?php

    require_once "DBConnection.php";

   class ManageIntern
   {
       private $DBObj;
       private $Con;
       public function __construct()
       {
          $this->DBObj = new DBConnection();
          $this->Con = $this->DBObj->getConnection();
       }

       public function addData($Model)
       {
        $Query="INSERT INTO `ip`.`internmaster` (`InternId`, `FullName`, `CourseId`, `Address`, `Gender`, `DOB`, `CollegeId`, `UserName`, `Password`, `ContactNo`, `Email`) VALUES 
                            (NULL, '$Model->FullName', '$Model->CourseId', '$Model->Address', '$Model->Gender', '$Model->DOB', '$Model->CollegeId', '$Model->UserName', '$Model->Password', '$Model->ContactNo', '$Model->Email');";

                if (mysqli_query($this->Con, $Query))
                {
                    echo "Inserted Successfully";
                }
                else
                {
                    echo mysqli_error($this->Con);
                }
       }

       public function updateData($Model)
       {
                $Query="UPDATE `ip`.`internmaster` SET `FullName`= '$Model->FullName', `CourseId`='$Model->CourseId', `Address`='$Model->Address', `Gender`='$Model->Gender',
                                        `DOB`='$Model->DOB', `CollegeId`='$Model->CollegeId', `UserName`='$Model->UserName', `Password`='$Model->Password',
                                        `ContactNo`='$Model->ContactNo', `Email`='$Model->Email'
                                    WHERE `internmaster`.`InternId` =$Model->InternId";

                if (mysqli_query($this->Con, $Query))
                {
                    echo "Updated Successfully";
                }
                else
                {
                    echo mysqli_error($this->Con);
                }
       }

       public function deleteData($Id)
       {
            $Query ="Delete from internmaster where InternId=$Id";
           if (mysqli_query($this->Con, $Query))
           {
                return "Deleted Successfully";
           }
           else
           {
              return mysqli_error($this->Con);
           }
       }

       public function viewData()
       {
                    $dataRows = array();
                    $Query = "SELECT * FROM internmaster";
                    $Result = mysqli_query($this->Con, $Query);

                    while ($row = mysqli_fetch_assoc($Result))
                    {
                        $dataRows[] = $row;
                    }
                        return json_encode($dataRows);
        }

       public function getDetails($Id)
       {
           $Query = "Select * from internmaster where InternId=$Id";
           $Result = mysqli_query($this->Con, $Query);
           $Data = mysqli_fetch_assoc($Result);
           return json_encode($Data);
       }
   }
?>