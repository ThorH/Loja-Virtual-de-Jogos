<?PHP
$login = $_POST['login'];
$senha = $_POST['senha'];

$conexao = mysql_connect('localhost','root','','cadastro') or die ("Erro na conexão do banco de dados.");
$selecionabd = mysql_select_db('cadastro',$conexao) or die ("Banco de dados inexistente.");

$sql = "SELECT nome,senha FROM cadastracliente WHERE nome='". $login."' AND senha='". $senha ."'";

$resultado = mysql_query($sql,$conexao) or die ("Erro na seleção da tabela.");

if (mysql_num_rows ($resultado) >0) {
	//Inicia a sessão;
	session_start();
	$_SESSION['nome'] = $login;
	$_SESSION['senha'] = $senha;
	header("Location:home.html");
	
}else {
	header("Location:index.html");
	}
?>
 