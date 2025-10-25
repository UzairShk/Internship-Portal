<?php

    require_once "DBConnection.php";

   class ManagePersonalDetail
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
        $Query="INSERT INTO `ip`.`personaldatail` (`PId`, `InternId`, `FatherName`, `MotherName`, `LanguageKnown`, `Natianility`, `Religion`, `Cast`) VALUES 
                                (NULL, '$Model->InternId', '$Model->FatherName', '$Model->MotherName', '$Model->LanguageKnown', '$Model->Natianility', '$Model->Religion', '$Model->Cast');";

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
                $Query="UPDATE `ip`.`personaldatail` SET `InternId`= '$Model->InternId', `FatherName`='$Model->FatherName', `MotherName`='$Model->MotherName', `LanguageKnown`='$Model->LanguageKnown', `Natianility`='$Model->Natianility', `Religion`='$Model->Religion', `Cast`='$Model->Cast'
                                    WHERE `personaldatail`.`PId` =$Model->PId";

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
            $Query ="Delete from personaldatail where PId=$Id";
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
                    $Query = "SELECT * FROM personaldatail";
                    $Result = mysqli_query($this->Con, $Query);

                    while ($row = mysqli_fetch_assoc($Result))
                    {
                        $dataRows[] = $row;
                    }
                        return json_encode($dataRows);
        }

       public function getDetails($Id)
       {
           $Query = "Select * from personaldatail where PId=$Id";
           $Result = mysqli_query($this->Con, $Query);
           $Data = mysqli_fetch_assoc($Result);
           return json_encode($Data);
       }
   }
?>