<?php
    require_once "../DBOperations/ManageCompany.php";
    require_once "../Model/CompanyMasterModel.php";

    if (isset($_REQUEST["Choice"]))
    {
        $Ch = $_REQUEST["Choice"];
        $Obj = new ManageCompany();

        switch($Ch)
        {
            case "Insert":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new CompanyMasterModel();
                $Model->CompanyName = $JsonData->CompanyName;
                $Model->FoundedDate = $JsonData->FoundedDate;
                $Model->Revenue = $JsonData->Revenue;
                $Model->AboutCompany = $JsonData->AboutCompany;
                $Model->CEO = $JsonData->CEO;
                $Model->OwnerName = $JsonData->OwnerName;
                $Model->Address = $JsonData->Address;
                $Model->ContactNo = $JsonData->ContactNo;
                $Model->Email = $JsonData->Email;
                $Model->UserName = $JsonData->UserName;
                $Model->Password = $JsonData->Password;
                $Model->Photo = $JsonData->Photo;
        
                $Obj->addData($Model);
            break;

            case "Update":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new CompanyMasterModel();
                $Model->CompanyId = $JsonData->CompanyId;
                $Model->CompanyName = $JsonData->CompanyName;
                $Model->FoundedDate = $JsonData->FoundedDate;
                $Model->Revenue = $JsonData->Revenue;
                $Model->AboutCompany = $JsonData->AboutCompany;
                $Model->CEO = $JsonData->CEO;
                $Model->OwnerName = $JsonData->OwnerName;
                $Model->Address = $JsonData->Address;
                $Model->ContactNo = $JsonData->ContactNo;
                $Model->Email = $JsonData->Email;
                $Model->UserName = $JsonData->UserName;
                $Model->Password = $JsonData->Password;
                $Model->Photo = $JsonData->Photo;
        
                $Obj->updateData($Model);
            break;

            case "Delete" :
                $JsonData = json_decode(file_get_contents("php://input"));
                $Id = $JsonData->Id;
                echo $Obj->deleteData($Id);
            break;

            case "View" :
                echo $Obj->viewData();
            break;

            case "getDetails" :
                $JsonData = json_decode(file_get_contents("php://input"));
                $Id = $JsonData->Id;
                echo $Obj->getDetails($Id);
            break;

        }
    }

?>