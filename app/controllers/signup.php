<?php
class Signup extends Controller
{
    function index()
    {
        $data['page_title'] = "Signup";
        $this->view("mini/signup",$data);
    }

}


?>