<?php
class Home extends Controller
{
    function index()
    {
        $data['page_title'] = "Home";
        $this->view("mini/index",$data);
    }

}


?>