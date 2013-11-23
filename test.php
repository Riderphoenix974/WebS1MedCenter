<?php
	$bdd = mysqli_connect('localhost','root','root','MedCenter');
    $result = mysqli_query($bdd,"SELECT pseudo, idMember, image FROM member ORDER BY idMember DESC LIMIT 3");//mysqli_query($bdd,"SELECT * FROM updates");
    
    $profiles=null;
    $i=0;
    while($data = $result->fetch_array(MYSQLI_NUM))
    {
    	echo $data[0]." ".$data[1]." ".$data[2]."</br>";
    	$profiles[$i]['pseudo'] = $data[0];
    	$profiles[$i]['idMember'] = $data[1];
    	$i++;
    }
    
    print_r($profiles);
    /*
	while($row = mysqli_fetch_array($result))
	{
		echo $row['idUpdate'] . " " . $row['content']. " " . $row['date']. " " . $row['service']. " " . $row['idMember'];
		echo "<br>";
	}*/
	//mysqli_query($bdd,"INSERT pseudo, idMember, image FROM member ORDER BY idMember ASC LIMIT 3");
	
	/*mysqli_query($bdd,"INSERT INTO member (idMember,pseudo) VALUES ('901','boss')");
/*mysqli_query($bdd," DELETE FROM member where idMember=901");*/
/*mysqli_query($bdd,"UPDATE member SET email='hello@hello.com' WHERE idMember='900'");*/
mysqli_close($bdd);
?>