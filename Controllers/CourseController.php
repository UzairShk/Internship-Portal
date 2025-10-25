<?php
    require_once "../DBOperations/ManageCourse.php";
    require_once "../Model/CourseMasterModel.php";

    if (isset($_REQUEST["Choice"]))
    {
        $Ch = $_REQUEST["Choice"];
        $Obj = new ManageCourse();

        switch($Ch)
        {
            case "Insert":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new CourseMasterModel();
                $Model->CourseName = $JsonData->CourseName;
                $Model->Stream = $JsonData->Stream;
        
                $Obj->addData($Model);
            break;

            case "Update":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new CourseMasterModel();
                $Model->CourseId = $JsonData->CourseId;
                $Model->CourseName = $JsonData->CourseName;
                $Model->Stream = $JsonData->Stream;
        
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

            default: 
                echo "Not Found";
            break;

        }
    }

?>