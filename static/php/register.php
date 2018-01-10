<?php
require 'db.php';
$email5 = trim($_POST['email']);
$senha5 = trim(sha1($_POST['senha']));
$user5 = trim($_POST['usuario']);
$nome5 = $_POST['nome'];
$sobrenome5 = trim($_POST['sobrenome']);


if (empty($email5) || empty($senha5)|| empty($nome5)|| empty($sobrenome5) ){
    print "<p>Preencha todos os campos!</p>"; exit();
}

$verificaremail=$conn->prepare("SELECT * FROM wake_usuario WHERE email='$email5'");
$verificaremail	->execute();
$totalUser=$verificaremail->rowCount();
if($totalUser > 0){
	echo '<p>E-mail já cadastrado</p>';
	}
	
	
else{

$email = $email5;
$senha = $senha5;
$user = $user5;
$nome = $nome5;
$sobrenome = $sobrenome5;
$inisession = date('Y-m-d');
$datec = date('Y-m-d');
$lastlogin = date('Y-m-d H:i:s');
$configurado = '0';
$num1 = rand(15, 50);
$num2 = rand(121235321, 20);
$antispam5 = $num1 * $num2;
$antispam = (trim(sha1($antispam5)));
$limite = date('Y-m-d H:i:s', strtotime('+525600 min'));
$ip= ($_SERVER['REMOTE_ADDR']);


try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO wake_usuario (email, senha, inisession, datec, lastlogin, nome, sobrenome)
    VALUES ('$email', '$senha', '$inisession', '$datec', '$lastlogin', '$nome5', '$sobrenome5')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Cadastrado com sucesso";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

}
?>