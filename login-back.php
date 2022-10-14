<?php

	include ("config.php");
	
	if($_POST)
	{
		$name =$_POST["email"];
		$pass =$_POST["password"];


		$query  = $baglanti->query("SELECT * FROM Admins WHERE email='$name' && password='$pass'",PDO::FETCH_ASSOC);
       
        $result = $query-> fetch(PDO::FETCH_ASSOC);



		if ( $say = $query -> rowCount() ){

			if( $say > 0 ){
				session_start();
				$_SESSION['oturum']=true;
                $_SESSION['adminId']=$result["id"];
                $_SESSION['username']=$result["username"];
				$_SESSION['email']=$email;
				$_SESSION['password']=$pass;
				$_SESSION['rolename']=$result["rolename"];

				$_SESSION['passShowArray'] = array(); // this will be used in showPasswordLog.php
											// prevent creating multiple log when presses show or copy button at pass-store.php
				
                header ("Location: index.php");

				
			}else{
				echo "oturum açılmadı hata";
			}
		}else{
			echo "<h1>Usurname or password incorrect</h1>";

		}
	}else{
		echo " <h1> lütfen giriş yapın</h1>";

	}
	
?>