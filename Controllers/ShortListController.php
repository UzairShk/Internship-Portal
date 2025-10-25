<?php
    require_once "../DBOperations/ManageShortList.php";
    require_once "../Model/ShortListMasterModel.php";

    if (isset($_REQUEST["Choice"]))
    {
        $Ch = $_REQUEST["Choice"];
        $Obj = new ManageShortList();

        switch($Ch)
        {
            case "Insert":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new ShortListMasterModel();
                $Model->CandidateId = $JsonData->CandidateId;
                $Model->ShortlistDate = $JsonData->ShortlistDate;
                $Model->IpId = $JsonData->IpId;
        
                $Obj->addData($Model);
            break;

            case "Update":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new ShortListMasterModel();
                $Model->ShortlistId = $JsonData->ShortlistId;
                $Model->CandidateId = $JsonData->CandidateId;
                $Model->ShortlistDate = $JsonData->ShortlistDate;
                $Model->IpId = $JsonData->IpId;
        
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