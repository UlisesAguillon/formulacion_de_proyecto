<link href="../css/bootstrap.min.css" rel="stylesheet">

<?php
if(isset($_REQUEST['projectCode']))
{

require('DBConnection/connection.php');
    try{
	$consulta = "INSERT INTO tbl_projects(code, name, faculty_id, objetive, description, expected_result, justification, projected_students, amount, start_date, subject, school, cathedra, area, coordination, practiceCenter, requesting_user_id) VALUES(:code, :name, :faculty_id, :objetive, :description, :expected_result, :justification, :projected_students, :amount, :start_date, :subject, :school, :cathedra, :area, :coordination, :practiceCenter, :requesting_user_id)";	
        $pdo = $conexion->prepare($consulta);
        $pdo->bindParam(':code', ($_REQUEST['projectCode']), PDO::PARAM_STR);
        $pdo->bindParam(':name', $_REQUEST['projectName'], PDO::PARAM_STR);
        $pdo->bindParam(':faculty_id', $_REQUEST['faculty'], PDO::PARAM_STR);
        $pdo->bindParam(':objetive', $_REQUEST['projectObjetive'], PDO::PARAM_STR);
        $pdo->bindParam(':description', $_REQUEST['projectDescription'], PDO::PARAM_STR);
        $pdo->bindParam(':expected_result', $_REQUEST['expectedResults'], PDO::PARAM_STR);
        $pdo->bindParam(':justification', $_REQUEST['justification'], PDO::PARAM_STR);
        $pdo->bindParam(':projected_students', $_REQUEST['students'], PDO::PARAM_STR);
        $pdo->bindParam(':amount', $_REQUEST['projectAmount'], PDO::PARAM_STR);
        $pdo->bindParam(':start_date', $_REQUEST['startDate'], PDO::PARAM_STR);
        $pdo->bindParam(':subject', $_REQUEST['subject'], PDO::PARAM_STR);
        $pdo->bindParam(':school', $_REQUEST['school'], PDO::PARAM_STR);
        $pdo->bindParam(':cathedra', $_REQUEST['cathedra'], PDO::PARAM_STR);
        $pdo->bindParam(':area', $_REQUEST['area'], PDO::PARAM_STR);
        $pdo->bindParam(':coordination', $_REQUEST['coordination'], PDO::PARAM_STR);
        $pdo->bindParam(':practiceCenter', $_REQUEST['practiceCenter'], PDO::PARAM_STR);
        $pdo->bindParam(':requesting_user_id', $usuario, PDO::PARAM_STR);
        $pdo->execute();
        echo ' <div class="alert alert-success"><strong>Exito!</strong>Registro agregado con exito.</div>';
          header( "refresh:3; url=../index.php" );
    }catch(PDOException $e){
        echo $e->getMessage();
    }                
}
?>