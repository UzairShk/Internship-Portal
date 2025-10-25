<?php
    require_once "../DBOperations/ManageColleges.php";
    require_once "../Model/CollegesModel.php";

    if (isset($_REQUEST["Choice"]))
    {
        $Ch = $_REQUEST["Choice"];
        $Obj = new ManageColleges();

        switch($Ch)
        {
            case "Insert":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new CollegesModel();
                $Model->CollegeName = $JsonData->CollegeName;
                $Model->CourseId = $JsonData->CourseId;
                $Model->Affilieted = $JsonData->Affilieted;
        
                $Obj->addData($Model);
            break;

            case "Update":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new CollegesModel();
                $Model->CollegeId = $JsonData->CollegeId;
                $Model->CollegeName = $JsonData->CollegeName;
                $Model->CourseId = $JsonData->CourseId;
                $Model->Affilieted = $JsonData->Affilieted;
        
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