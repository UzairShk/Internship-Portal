<?php

    require_once "DBConnection.php";

   class ManageEducation
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
        $Query="INSERT INTO `ip`.`educationmaster` (`EducationId`, `InternId`, `CourseName`, `Percentage`, `ExamName`, `Semester`) VALUES 
                            (NULL, '$Model->InternId', '$Model->CourseName', '$Model->Percentage', '$Model->ExamName', '$Model->Semester');";

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
                $Query="UPDATE `ip`.`educationmaster` SET `InternId`= '$Model->InternId', `CourseName`='$Model->CourseName', `Percentage`='$Model->Percentage', `ExamName`='$Model->ExamName', `Semester`='$Model->Semester'
                                    WHERE `educationmaster`.`EducationId` =$Model->EducationId";

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
            $Query ="Delete from educationmaster where EducationId=$Id";
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
                    $Query = "SELECT * FROM educationmaster";
                    $Result = mysqli_query($this->Con, $Query);

                    while ($row = mysqli_fetch_assoc($Result))
                    {
                        $dataRows[] = $row;
                    }
                        return json_encode($dataRows);
        }

       public function getDetails($Id)
       {
           $Query = "Select * from educationmaster where EducationId=$Id";
           $Result = mysqli_query($this->Con, $Query);
           $Data = mysqli_fetch_assoc($Result);
           return json_encode($Data);
       }
   }
?>