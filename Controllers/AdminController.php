<?php
    require_once "../DBOperations/ManageAdmin.php";
    require_once "../Model/AdminModel.php";

    if (isset($_REQUEST["Choice"]))
    {
        $Ch = $_REQUEST["Choice"];
        $Obj = new ManageAdmin();

        switch($Ch)
        {
            case "Insert":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new AdminModel();
                $Model->FullName = $JsonData->FullName;
                $Model->ContactNo = $JsonData->ContactNo;
                $Model->Email = $JsonData->Email;
                $Model->UserName = $JsonData->UserName;
                $Model->Password = $JsonData->Password;
        
                $Obj->addData($Model);
            break;

            case "Update":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new AdminModel();
                $Model->AdminId = $JsonData->AdminId;
                $Model->FullName = $JsonData->FullName;
                $Model->ContactNo = $JsonData->ContactNo;
                $Model->Email = $JsonData->Email;
                $Model->UserName = $JsonData->UserName;
                $Model->Password = $JsonData->Password;
        
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