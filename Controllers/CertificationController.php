<?php
    require_once "../DBOperations/ManageCertification.php";
    require_once "../Model/CertificationModel.php";

    if (isset($_REQUEST["Choice"]))
    {
        $Ch = $_REQUEST["Choice"];
        $Obj = new ManageCertification();

        switch($Ch)
        {
            case "Insert":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new CertificationModel();
                $Model->InternId = $JsonData->InternId;
                $Model->CourseName = $JsonData->CourseName;
                $Model->IssuerDate = $JsonData->IssuerDate;
                $Model->Organization = $JsonData->Organization;
                $Model->Entra = $JsonData->Entra;
        
                $Obj->addData($Model);
            break;

            case "Update":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new CertificationModel();
                $Model->CertificationId = $JsonData->CertificationId;
                $Model->InternId = $JsonData->InternId;
                $Model->CourseName = $JsonData->CourseName;
                $Model->IssuerDate = $JsonData->IssuerDate;
                $Model->Organization = $JsonData->Organization;
                $Model->Entra = $JsonData->Entra;
        
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