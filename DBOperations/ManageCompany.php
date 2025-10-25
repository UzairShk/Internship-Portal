<?php

    require_once "DBConnection.php";

   class ManageCompany
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
        $Query="INSERT INTO `ip`.`companymaster` (`CompanyId`, `CompanyName`, `FoundedDate`, `Revenue`, `AboutCompany`, `CEO`, `OwnerName`, `Address`, `ContactNo`, `Email`, `UserName`, `Password`, `Photo`) VALUES 
                                (NULL, '$Model->CompanyName', '$Model->FoundedDate', '$Model->Revenue', '$Model->AboutCompany', '$Model->CEO', '$Model->OwnerName', '$Model->Address', '$Model->ContactNo', '$Model->Email', '$Model->UserName', '$Model->Password', '$Model->Photo');";

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
                $Query="UPDATE `ip`.`companymaster` SET `CompanyName`= '$Model->CompanyName', `FoundedDate`='$Model->FoundedDate', `Revenue`='$Model->Revenue',
                                     `AboutCompany`='$Model->AboutCompany', `CEO`='$Model->CEO', `OwnerName`='$Model->OwnerName', `Address`='$Model->Address',
                                      `ContactNo`='$Model->ContactNo', `Email`='$Model->Email', `UserName`='$Model->UserName', `Password`='$Model->Password', `Photo`='$Model->Photo'
                                    WHERE `companymaster`.`CompanyId` =$Model->CompanyId";

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
            $Query ="Delete from companymaster where CompanyId=$Id";
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
                    $Query = "SELECT * FROM companymaster";
                    $Result = mysqli_query($this->Con, $Query);

                    while ($row = mysqli_fetch_assoc($Result))
                    {
                        $dataRows[] = $row;
                    }
                        return json_encode($dataRows);
        }

       public function getDetails($Id)
       {
           $Query = "Select * from companymaster where CompanyId=$Id";
           $Result = mysqli_query($this->Con, $Query);
           $Data = mysqli_fetch_assoc($Result);
           return json_encode($Data);
       }
   }
?>