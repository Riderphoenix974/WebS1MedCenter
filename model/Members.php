<?php

require_once ('config.php');


class Members
{
    /*
    * if $mode = true or no arg given, return the last three profiles created
    * if $mode = false, return three random profile
    * A profile is defined by an array with two keys : image, pseudo
    */
    

    public static function getFrontProfiles($mode = true)
    {
        // SELECT
        global $bdd;
        
        //$query = "SELECT pseudo, idMember, image FROM member ORDER BY idMember ASC LIMIT 3";
        //$query = "SELECT pseudo, idMember, image FROM member WHERE pseudo = 'Nam'";

        $result = mysqli_query($bdd, "SELECT pseudo, idMember, image FROM member ORDER BY idMember DESC LIMIT 3");

        while ($row = mysqli_fetch_assoc($result)){


           $FrontProfil[] = $row;

       }

        return $FrontProfil;
    }
    
    /*
    * If username and password is in database, return TRUE. Otherwise, return false
    */ 
    public static function signIn($username,$password)
    {

        //SELECT 
     	global $bdd;
     	
        $result = mysqli_query($bdd, "SELECT * FROM member WHERE pseudo ='$username' AND password = '$password'");

		$row = $result -> fetch_array(MYSQLI_NUM);

        if ($row[0]!=NULL) {

            $_SESSION['idMember']=$row[0];
            $_SESSION['pseudo']=$row[1];
            $_SESSION['email']=$row[2];
            //$_SESSION['password']=$row[3];
            $_SESSION['sex']=$row[4];
            $_SESSION['isAdmin']=$row[5];
            $_SESSION['description']=$row[6];
            $_SESSION['image']=$row[7];
            $_SESSION['website']=$row[8];

            return TRUE;
			
		}
		
		else  return FALSE;
				 
    }

    //public static function signIn($username, $password)
    public static function signUp($pseudo,$email,$password,$sex)
    {

        global $bdd;

        // SELECT
        $check=mysqli_query($bdd,"SELECT * from member where pseudo='$pseudo'");

        $row= mysqli_fetch_array($check);

        if($pseudo==$row[1] && !$_SESSION['isConnected']) // User alrdeady in database
        {
            echo("already in");
            return FALSE;
        }

        else{
        mysqli_query($bdd,"INSERT INTO member (pseudo,email,password,sex)
		VALUES ('$pseudo','$email','$password','$sex')");

        $_SESSION['pseudo']=$pseudo;
        $_SESSION['email']=$email;
        //$_SESSION['password']=$password;
        $_SESSION['sex']=$sex;
        $_SESSION['isAdmin']=0;

        return TRUE;
        }
    }

    /*s
    * Return an array of all members stored in database. If $number is different from 0, 
    limit the size of the array
    */
    public static function getAll($number = 0)
    {
        // SELECT
        global $bdd;

        if($number!=0)
        {
            $result= mysqli_query($bdd,"SELECT * FROM member LIMIT '$number'");
        }
        else $result=mysqli_query($bdd,"SELECT * FROM member");

        while ($row = mysqli_fetch_assoc($result)){
            $AllMembers[] = $row;
        }

        return $AllMembers;
    }
    
    /*
    Delete the given member, if $idMember is not empty
    */
    public static function delete($idMember)
    {
        // DELETE
            global $bdd;
            mysqli_query($bdd,"DELETE FROM member WHERE idMember='$idMember'");
        
    }
     public static function MakeAdmin($idMember)
    {
        // Make Admin the corresponding id
        global $bdd;
    	mysqli_query($bdd,"UPDATE member SET isAdmin = '1' WHERE idMember='$idMember'");
        
    }


    public static function logOut()
    {


        if($_SESSION['isConnected']) unset($_SESSION['isConnected']);
        if($_SESSION['pseudo']) unset($_SESSION['pseudo']);
        if($_SESSION['email']) unset($_SESSION['email']);
        if($_SESSION['idMember']) unset($_SESSION['idMember']);
        if($_SESSION['sex']) unset($_SESSION['sex']);
        if($_SESSION['isAdmin']) unset($_SESSION['isAdmin']);
        if($_SESSION['description']) unset($_SESSION['description']);
        if($_SESSION['website']) unset($_SESSION['website']);
        if($_SESSION['image']) unset($_SESSION['image']);


    }
    
	public static function getRss($idMember)
	{
		global $bdd;
        $result= mysqli_query($bdd,"SELECT * FROM updates WHERE idMember='$idMember' ORDER BY date DESC LIMIT 10");
		
		if($result==null)
			$AllExams=array();
        while ($row = mysqli_fetch_assoc($result))
        {
            $AllExams[] = $row;
        }

		$rss = '<?xml version="1.0" encoding="UTF-8" ?><rss version="2.0"><channel>';

		foreach($AllExams as $exam) 
		{
			$rss .= '<item>';
			$rss .= '<date>'.$exam['date'].'</date>';
			$rss .= '<idupdate>'.$exam['idUpdate'].'</idupdate>';
			$rss .= '<content>'.$exam['content'].'</content>';
			$rss .= '<service>'.$exam['service'].'</service>';
			$rss .= '</item>';
		}
		
		$rss .= '</channel></rss>';

        return $rss;
	}
}
