<?php
    require_once "../DBOperations/ManageCandidate.php";
    require_once "../Model/CandidateMasterModel.php";

    if (isset($_REQUEST["Choice"]))
    {
        $Ch = $_REQUEST["Choice"];
        $Obj = new ManageCandidate();

        switch($Ch)
        {
            case "Insert":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new CandidateMasterModel();
                $Model->InternId = $JsonData->InternId;
                $Model->IpId = $JsonData->IpId;
                $Model->ApplyDate = $JsonData->ApplyDate;
                $Model->Status = $JsonData->Status;
        
                $Obj->addData($Model);
            break;

            case "Update":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new CandidateMasterModel();
                $Model->CandidateId = $JsonData->CandidateId;
                $Model->InternId = $JsonData->InternId;
                $Model->IpId = $JsonData->IpId;
                $Model->ApplyDate = $JsonData->ApplyDate;
                $Model->Status = $JsonData->Status;
        
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