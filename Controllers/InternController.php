<?php
    require_once "../DBOperations/ManageIntern.php";
    require_once "../Model/InternMasterModel.php";

    if (isset($_REQUEST["Choice"]))
    {
        $Ch = $_REQUEST["Choice"];
        $Obj = new ManageIntern();

        switch($Ch)
        {
            case "Insert":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new InternMasterModel();
                $Model->FullName = $JsonData->FullName;
                $Model->CourseId = $JsonData->CourseId;
                $Model->Address = $JsonData->Address;
                $Model->Gender = $JsonData->Gender;
                $Model->DOB = $JsonData->DOB;
                $Model->CollegeId = $JsonData->CollegeId;
                $Model->UserName = $JsonData->UserName;
                $Model->Password = $JsonData->Password;
                $Model->ContactNo = $JsonData->ContactNo;
                $Model->Email = $JsonData->Email;
        
                $Obj->addData($Model);
            break;

            case "Update":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new InternMasterModel();
                $Model->InternId = $JsonData->InternId;
                $Model->FullName = $JsonData->FullName;
                $Model->CourseId = $JsonData->CourseId;
                $Model->Address = $JsonData->Address;
                $Model->Gender = $JsonData->Gender;
                $Model->DOB = $JsonData->DOB;
                $Model->CollegeId = $JsonData->CollegeId;
                $Model->UserName = $JsonData->UserName;
                $Model->Password = $JsonData->Password;
                $Model->ContactNo = $JsonData->ContactNo;
                $Model->Email = $JsonData->Email;
        
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