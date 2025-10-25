<?php
    require_once "../DBOperations/ManageNotification.php";
    require_once "../Model/NotificationModel.php";

    if (isset($_REQUEST["Choice"]))
    {
        $Ch = $_REQUEST["Choice"];
        $Obj = new ManageNotification();

        switch($Ch)
        {
            case "Insert":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new NotificationModel();
                $Model->IpId = $JsonData->IpId;
                $Model->Message = $JsonData->Message;
                $Model->NotificationDateTime = $JsonData->NotificationDateTime;
        
                $Obj->addData($Model);
            break;

            case "Update":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new NotificationModel();
                $Model->NotificationId = $JsonData->NotificationId;
                $Model->IpId = $JsonData->IpId;
                $Model->Message = $JsonData->Message;
                $Model->NotificationDateTime = $JsonData->NotificationDateTime;
        
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