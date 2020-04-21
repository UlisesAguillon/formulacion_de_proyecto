<?php
  //require('DBConnection/connection.php');

    //class Login extends ConectionDB
    class Login
    {
        public function Login()
        {
        //    parent::__construct ();
        }
        public function startSession()
        {
                /**
                 * Datos del usuario
               */
/*
                $user = md5 ($_REQUEST['user']);
                $password = md5 ($_REQUEST['password']);


                $query1 = "SELECT username, userpassword, LPAD(CONVERT(code_client,CHAR(5)),5,'0') as code_client, status, session FROM `tbl_app_login_users` WHERE username=:user and userpassword=:pass and status=1";
                $stmt = $this->dbConnect->prepare($query1);

                $stmt->execute(array(
                ':user' => $user,
				':pass' => $password
                ));

                $result = $stmt->fetch();

                if ($password == $result['userpassword'])
                {
                  $query = "SELECT L.username, L.userpassword,LPAD(CONVERT(L.code_client,CHAR(5)),5,'0') as code_client,L.status, L.session, C.nombre  FROM `tbl_app_login_users` as L inner join clientes as C on LPAD(CONVERT(L.code_client,CHAR(5)),5,'0')=C.cod_cliente WHERE L.username=:user and L.userpassword=:pass and status=1";
                  // Prepare statement
                  $statement = $this->dbConnect->prepare($query);
                  $statement->execute(array(
                       ':user' => $user,
					   ':pass' => $password
                  ));

                  $loginRow = $statement->fetch(PDO::FETCH_ASSOC);


                  if ($loginRow != false)
                  {
                      // Inicia sesión solo si el usuario existe en la base de datos
                      session_start();
                      // Almacenamos los datos del usuario en la sesión

                      $_SESSION['user'] = $loginRow['username'];
					  $_SESSION['codeClient_currentUser']=$loginRow['code_client'];
				  $_SESSION['name']=$loginRow['nombre'];
                      $this->dbConnect = NULL;
                      header("Location: ../index.php");
                    }
                    else {
                        $this->dbConnect = NULL;
                        header("Location: login.php");
                    }
                }
                else
                {

                    header("Location: ../login.php?login=failed");
                }  */

                if(($_POST["user"]=="jrivera@mail.com" || $_POST["user"]=="admin@mail.com") && $_POST["password"]=="123"){
                  // Inicia sesión solo si el usuario existe en la base de datos
                  session_start();
                  // Almacenamos los datos del usuario en la sesión
                  $_SESSION['user'] = $_POST['user'];
                  $_SESSION['password']=$loginRow['password'];
                  $this->dbConnect = NULL;
                  if($_POST["user"]=="admin@mail.com"){
                    header("Location: ../index_admin.php");
                  }else{
                    header("Location: ../index.php");
                  }
                  
                }else{

                    header("Location: ../login.php?login=failed");
                }
        }
    }
    $login = new Login();
    $login->startSession();
?>
