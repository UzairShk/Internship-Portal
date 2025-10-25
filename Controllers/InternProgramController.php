<?php
    require_once "../DBOperations/ManageInternProgram.php";
    require_once "../Model/InternProgramModel.php";

    if (isset($_REQUEST["Choice"]))
    {
        $Ch = $_REQUEST["Choice"];
        $Obj = new ManageInternProgram();

        switch($Ch)
        {
            case "Insert":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new InternProgramModel();
                $Model->CompanyId = $JsonData->CompanyId;
                $Model->Title = $JsonData->Title;
                $Model->JobDescription = $JsonData->JobDescription;
                $Model->Salary = $JsonData->Salary;
                $Model->Requirement = $JsonData->Requirement;
                $Model->LastDate = $JsonData->LastDate;
                $Model->Category = $JsonData->Category;
        
                $Obj->addData($Model);
            break;

            case "Update":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new InternProgramModel();
                $Model->IpId = $JsonData->IpId;
                $Model->CompanyId = $JsonData->CompanyId;
                $Model->Title = $JsonData->Title;
                $Model->JobDescription = $JsonData->JobDescription;
                $Model->Salary = $JsonData->Salary;
                $Model->Requirement = $JsonData->Requirement;
                $Model->LastDate = $JsonData->LastDate;
                $Model->Category = $JsonData->Category;
        
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