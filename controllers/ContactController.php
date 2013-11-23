<?php

require_once dirname(__FILE__) . '/../lightmvc/ActionController.php';

class ContactController extends ActionController
{
    /**
     * Simple index page which links to the main available actions
     */
    public function indexAction()
    {
        // Do nothing
    }
    
    public function signupAction()
    {
        // use member : save
    }
    
    public function signinAction()
    {
        // use members : signin
    }
    
    public function listAction()
    {
        // use members : list
    }
    
    public function deleteAction()
    {  
       // use members: delete 
    }


}
