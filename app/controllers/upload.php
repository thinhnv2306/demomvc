<?php
class Upload extends Controller
{
    function index()
    {
        header("Location:" . ROOT . "upload/image");
        die;
    }

    function image()
    {
        $user = $this->loadModel('user');
        if(!$user->check_logged_in()){
            header("Location:" . ROOT . "login");
            die;
        
        }
        $data['page_title'] = "Upload Image";
        $this->view("mini/upload",$data);
    }

}


?>