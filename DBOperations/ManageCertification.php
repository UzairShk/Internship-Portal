<?php

    require_once "DBConnection.php";

   class ManageCertification
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
        $Query="INSERT INTO `ip`.`certification` (`CertificationId`, `InternId`, `CourseName`, `IssuerDate`, `Organization`, `Entra`) VALUES 
                                (NULL, '$Model->InternId', '$Model->CourseName', '$Model->IssuerDate', '$Model->Organization', '$Model->Entra');";

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
                $Query="UPDATE `ip`.`certification` SET `InternId`= '$Model->InternId', `CourseName`='$Model->CourseName', 
                                    `IssuerDate`='$Model->IssuerDate', `Organization`= '$Model->Organization', `Entra`='$Model->Entra'
                                    WHERE `certification`.`CertificationId` =$Model->CertificationId";

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
            $Query ="Delete from certification where CertificationId=$Id";
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
                    $Query = "SELECT * FROM certification";
                    $Result = mysqli_query($this->Con, $Query);

                    while ($row = mysqli_fetch_assoc($Result))
                    {
                        $dataRows[] = $row;
                    }
                        return json_encode($dataRows);
        }

       public function getDetails($Id)
       {
           $Query = "Select * from certification where CertificationId=$Id";
           $Result = mysqli_query($this->Con, $Query);
           $Data = mysqli_fetch_assoc($Result);
           return json_encode($Data);
       }
   }
?>