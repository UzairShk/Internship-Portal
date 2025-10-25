<?php

    require_once "DBConnection.php";

   class ManageInternProgram
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
        $Query="INSERT INTO `ip`.`internprogram` (`IpId`, `CompanyId`, `Title`, `JobDescription`, `Salary`, `Requirement`, `LastDate`, `Category`) VALUES 
                            (NULL, '$Model->CompanyId', '$Model->Title', '$Model->JobDescription', '$Model->Salary', '$Model->Requirement', '$Model->LastDate', '$Model->Category');";

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
                $Query="UPDATE `ip`.`internprogram` SET `CompanyId`= '$Model->CompanyId', `Title`='$Model->Title', `JobDescription`='$Model->JobDescription', `Salary`='$Model->Salary',
                                        `Requirement`='$Model->Requirement', `LastDate`='$Model->LastDate', `Category`='$Model->Category'
                                    WHERE `internprogram`.`IpId` =$Model->IpId";

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
            $Query ="Delete from internprogram where IpId=$Id";
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
                    $Query = "SELECT * FROM internprogram";
                    $Result = mysqli_query($this->Con, $Query);

                    while ($row = mysqli_fetch_assoc($Result))
                    {
                        $dataRows[] = $row;
                    }
                        return json_encode($dataRows);
        }

       public function getDetails($Id)
       {
           $Query = "Select * from internprogram where IpId=$Id";
           $Result = mysqli_query($this->Con, $Query);
           $Data = mysqli_fetch_assoc($Result);
           return json_encode($Data);
       }
   }
?>