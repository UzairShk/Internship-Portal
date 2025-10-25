<?php
    require_once "../DBOperations/ManageFeedback.php";
    require_once "../Model/FeedbackModel.php";

    if (isset($_REQUEST["Choice"]))
    {
        $Ch = $_REQUEST["Choice"];
        $Obj = new ManageFeedback();

        switch($Ch)
        {
            case "Insert":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new FeedbackModel();
                $Model->InternId = $JsonData->InternId;
                $Model->Comment = $JsonData->Comment;
                $Model->FeedbackDate = $JsonData->FeedbackDate;
        
                $Obj->addData($Model);
            break;

            case "Update":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new FeedbackModel();
                $Model->FeedbackId = $JsonData->FeedbackId;
                $Model->InternId = $JsonData->InternId;
                $Model->Comment = $JsonData->Comment;
                $Model->FeedbackDate = $JsonData->FeedbackDate;
        
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