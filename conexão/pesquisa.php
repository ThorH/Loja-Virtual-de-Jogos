<?PHP

header("Content-type: text/html; charset=utf-8");

$nome=$_POST['nome'];
$cpf=$_POST['cpf'];

$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Não foi possivel conectar: ' . mysql_error());
}

// make foo the current db
$db_selected = mysql_select_db('cadastro', $link);

if (!$db_selected) {
    die ('Banco de dados não selecionado: ' . mysql_error());
} else {
	$result = mysql_query("SELECT * FROM cadastracliente WHERE nome='". $nome."'or cpf='".$cpf."'") or die(mysql_error());

	$row = mysql_fetch_array($result);
	echo "<head>";
	echo "<title>Informações</title>";
	echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>";
	echo "<link rel='stylesheet' href='css/style.css'>";
	echo "</head>";
	echo "<body>";
	echo "<div class='container'>";
	echo "<div class='login'>";
	echo "<h1 class='login-heading'>Informações do usuário</h1>";
	echo "<table border='1'>"; 
	echo  "<tr class='inf'><td>Nome:</td>";
	echo "<td class='inf'>".$row['nome']." ".$row['sobrenome']."</td></tr>";
	echo  "<tr class='inf'><td>CPF:</td>";
	echo "<td class='inf'>".$row['cpf']."</td></tr>";
	echo  "<tr class='inf'><td>Email:</td>";
	echo "<td class='inf'>".$row['email']."</td></tr>";
	echo  "<tr class='inf'><td>Senha:</td>";
	echo "<td class='inf'>".$row['senha']."</td></tr>";
	echo "<td class='inf'><a class='inf'  href='home.html'>Voltar</a></td>";
	echo "</div>";
	echo "</div>";
	echo "</body>";
}


mysql_free_result($result);
?>