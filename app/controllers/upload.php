<?php
class Upload extends Controller
{
    function index()
    {
        $data['page_title'] = "Upload Image";
        $this->view("mini/upload",$data);
    }

    function image()
    {
        $data['page_title'] = "Upload Image";
        $this->view("mini/upload",$data);
    }

}


?>