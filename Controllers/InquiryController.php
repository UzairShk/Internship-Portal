<?php
    require_once "../DBOperations/ManageInquiry.php";
    require_once "../Model/InquiryModel.php";

    if (isset($_REQUEST["Choice"]))
    {
        $Ch = $_REQUEST["Choice"];
        $Obj = new ManageInquiry();

        switch($Ch)
        {
            case "Insert":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new InquiryModel();
                $Model->InternId = $JsonData->InternId;
                $Model->Message = $JsonData->Message;
                $Model->Status = $JsonData->Status;
                $Model->InquiryDate = $JsonData->InquiryDate;
                $Model->IpId = $JsonData->IpId;
        
                $Obj->addData($Model);
            break;

            case "Update":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new InquiryModel();
                $Model->InquiryId = $JsonData->InquiryId;
                $Model->InternId = $JsonData->InternId;
                $Model->Message = $JsonData->Message;
                $Model->Status = $JsonData->Status;
                $Model->InquiryDate = $JsonData->InquiryDate;
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