<?PHP
//Variaveis recebem os valores;
$nome =$_POST['nome'];
$sobrenome =$_POST['sobrenome'];
$cpf =$_POST['cpf'];
$nascimento =$_POST['nascimento'];
$email =$_POST['email'];
$telefone =$_POST['telefone'];
$senha =$_POST['senha'];

header("Content-type: text/html; charset=utf-8");
//para deixar a senha criptografada basta inserir o $codifica na query(values);
//$codifica = md5 ($senha);

$conectar = mysqli_connect('localhost', 'root', '','cadastro') or die ("Erro na conexao com o bando de dados");

$query = "INSERT INTO cadastracliente (nome,sobrenome,cpf,nascimento,email,telefone,senha) 
VALUES ('".$nome."', '".$sobrenome."', '".$cpf."','".$nascimento."','".$email."','".$telefone."','".$senha."')";

mysqli_query($conectar,$query) or die ("Erro ao tentar cadastrar clientes");

mysqli_close($conectar);


 echo "<head>";
	echo "<title>Informações</title>";
	echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>";
	echo "<link rel='stylesheet' href='css/style.css'>";
	echo "</head>";
	echo "<body>";
	echo "<div class='container'>";
	echo "<div class='login'>";
	echo "<h1 class='login-heading'>Operação</h1>";
	echo "</br>";
	echo "Seu cadastro foi realizado com sucesso!";
	echo "</br>";
	echo "</br>";
	echo "<td class='inf'><a class='inf'  href='home.html'>Voltar</a></td>";
	echo "</div>";
	echo "</div>";
	echo "</body>";
?>
 