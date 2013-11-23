<?php

require_once dirname(__FILE__) . '/../lightmvc/ActionController.php';
require_once dirname(__FILE__) . '/../model/Members.php';

class MembersController extends ActionController
{
    /**
     * Simple index page which links to the main available actions
     */
    public function indexAction()
    {
        // Do nothing
    }
    
    public function signupAction() // Subscribe
    {
        // use member : save
        if((Members::signUp($_POST['pseudo'], $_POST['email'],$_POST['pass'],$_POST['sex'])==TRUE))
        {
        $_SESSION['pseudo']=$_POST['pseudo'];
        $_SESSION['isConnected']=TRUE;

        header("Location: /members/");
        }

        else {
            $_SESSION['isConnected']=FALSE;
            header("Location: /");
        }
    }
    
    public function signinAction() // Login
    {

        $isConnected=Members::signIn($_POST["pseudo"], $_POST ["pass"]);

        if($isConnected)
        {
            $_SESSION['isConnected']=TRUE;
            header("Location: /members/");

        }

        else {
            $_SESSION['isConnected']=FALSE;
            header("Location: /");
        }

    }
    
    public function listAction()
    {
        $this->members = Members::getAll();
    }
    
    public function deleteAction()
    { 
        if(isset($_SESSION['isConnected'])&&$_SESSION['isConnected'])
        {
        if($_SESSION['isAdmin'])
        {
            Members::delete($_GET['idMember']);
        }
        }
        header("Location: /members/list");
    }
    
    public function MakeAdminAction() // Login
    {

        if(isset($_SESSION['isConnected']) && $_SESSION['isConnected'])
        {
        if($_SESSION['isAdmin'])
        {
            Members::MakeAdmin($_GET['idMember']);
        }
        }
        header("Location: /members/list");
    }
    public function logOutAction() // Login
    {

        if(isset($_SESSION['isConnected']) && $_SESSION['isConnected'])
            {
            Members::logOut();
            }
        
        header("Location: /");
    }
    public function rssAction()
    {
    	$this->Result = Members::getRss($_GET['idMember']);
    	
    }
}
