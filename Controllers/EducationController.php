<?php
    require_once "../DBOperations/ManageEducation.php";
    require_once "../Model/EducationMasterModel.php";

    if (isset($_REQUEST["Choice"]))
    {
        $Ch = $_REQUEST["Choice"];
        $Obj = new ManageEducation();

        switch($Ch)
        {
            case "Insert":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new EducationMasterModel();
                $Model->InternId = $JsonData->InternId;
                $Model->CourseName = $JsonData->CourseName;
                $Model->Percentage = $JsonData->Percentage;
                $Model->ExamName = $JsonData->ExamName;
                $Model->Semester = $JsonData->Semester;
        
                $Obj->addData($Model);
            break;

            case "Update":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new EducationMasterModel();
                $Model->EducationId = $JsonData->EducationId;
                $Model->InternId = $JsonData->InternId;
                $Model->CourseName = $JsonData->CourseName;
                $Model->Percentage = $JsonData->Percentage;
                $Model->ExamName = $JsonData->ExamName;
                $Model->Semester = $JsonData->Semester;
        
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