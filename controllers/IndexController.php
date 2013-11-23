<?php

require_once dirname(__FILE__) . '/../lightmvc/ActionController.php';
require_once dirname(__FILE__) . '/../model/Members.php';

class IndexController extends ActionController
{
    /**
     * Simple index page which links to the main available actions
     */
    
    public function indexAction()
    {
        // members : getFrontProfiles
        //$connection =Members::signIn($_POST[]   
        $this->FrontProfil = Members::getFrontProfiles();    	
    	
    }
    
}
