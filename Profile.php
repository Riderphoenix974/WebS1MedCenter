<?php

/*
* Represent a profile page we can see : attached to a member and to updates
*/
require_once ('config.php');


class Profile
{
    public $profile;

      public static function editProfil($pseudo, $email, $website, $description)
    {
        // SELECT

        $_SESSION['pseudo']=$pseudo;
        $_SESSION['email']=$email;
        $_SESSION['website']=$website;
        $_SESSION['description']=$description;

        global $bdd;

        if (isset($_SESSION ['idMember'])){

            mysqli_query($bdd, "UPDATE member SET pseudo = '$pseudo', email ='$email', website ='$website', description='$description' WHERE idMember = '$idMember'");

            header('Location: ' . BASE_URL);
        }
        

    }
}
