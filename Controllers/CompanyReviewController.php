<?php
    require_once "../DBOperations/ManageCompanyReview.php";
    require_once "../Model/CompanyReviewModel.php";

    if (isset($_REQUEST["Choice"]))
    {
        $Ch = $_REQUEST["Choice"];
        $Obj = new ManageCompanyReview();

        switch($Ch)
        {
            case "Insert":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new CompanyReviewModel();
                $Model->InternId = $JsonData->InternId;
                $Model->CompanyId = $JsonData->CompanyId;
                $Model->Comment = $JsonData->Comment;
                $Model->Ratings = $JsonData->Ratings;
                $Model->ReviewDate = $JsonData->ReviewDate;
        
                $Obj->addData($Model);
            break;

            case "Update":

                $JsonData = json_decode(file_get_contents("php://input"));
                $Model = new CompanyReviewModel();
                $Model->ReviewId = $JsonData->ReviewId;
                $Model->InternId = $JsonData->InternId;
                $Model->CompanyId = $JsonData->CompanyId;
                $Model->Comment = $JsonData->Comment;
                $Model->Ratings = $JsonData->Ratings;
                $Model->ReviewDate = $JsonData->ReviewDate;
        
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