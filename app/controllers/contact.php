<?php
class Contact extends Controller
{
    function index()
    {
        $data['page_title'] = "Contact Us";
        $this->view("mini/contact",$data);
    }

}


?>