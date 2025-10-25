<?php
    require_once "../DBOperations/ManagePersonalDetail.php";
    require_once "../Model/PersonalDetailModel.php";

    if (isset($_REQUEST["Choice"]))
    {
        $Ch = $_REQUEST["Choice"];
        $Obj = new ManagePersonalDetail();

        switch($Ch)
        {
            case "Insert":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new PersonalDetailModel();
                $Model->InternId = $JsonData->InternId;
                $Model->FatherName = $JsonData->FatherName;
                $Model->MotherName = $JsonData->MotherName;
                $Model->LanguageKnown = $JsonData->LanguageKnown;
                $Model->Natianility = $JsonData->Natianility;
                $Model->Religion = $JsonData->Religion;
                $Model->Cast = $JsonData->Cast;
        
                $Obj->addData($Model);
            break;

            case "Update":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new PersonalDetailModel();
                $Model->PId = $JsonData->PId;
                $Model->InternId = $JsonData->InternId;
                $Model->FatherName = $JsonData->FatherName;
                $Model->MotherName = $JsonData->MotherName;
                $Model->LanguageKnown = $JsonData->LanguageKnown;
                $Model->Natianility = $JsonData->Natianility;
                $Model->Religion = $JsonData->Religion;
                $Model->Cast = $JsonData->Cast;
        
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