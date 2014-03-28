<?php

class ContactController extends \BaseController {
         protected $layout = "layouts.main";
        function getIndex(){
            
             $this->layout->content= View::make('contact.index');
        }

}