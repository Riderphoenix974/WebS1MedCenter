<?php

require_once dirname(__FILE__) . '/../lightmvc/ActionController.php';
require_once dirname(__FILE__) . '/../model/Profile.php';

class ProfileController extends ActionController
{
    /**
     * Simple index page which links to the main available actions
     */
    public function indexAction()
    {
        // Do nothing
    }
    
    
    /**
     *  Edit the profile of the logged member
     */
    public function editAction()
    {
        
    }

    public function editProfilAction()
    {
        // member save
        // update save

        Profile::editProfil($_POST['pseudo'], $_POST['email'], $_POST['website'], $_POST['description']);

        
    
    }
    
    /**
     * Add a like  
     */
    public function addAction()
    {
        // update: save
    }
    
        
    /**
     * show the profile
     */
    public function viewAction()
    {
        // use the Profil constructor
    }
    
    
}
