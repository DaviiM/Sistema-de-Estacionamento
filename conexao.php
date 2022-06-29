<?php

$servidor = 'localhost';
$banco = 'bdestacionamento';
$usuario = 'root';
$senha = '';
#$porta;

$conn = mysqli_connect($servidor, $usuario, $senha, $banco);

if(!$conn){
	die("A conexão falhou: ". msyqli_connect_error());
}
#echo "A conexão foi efetuada com sucesso";
#echo "<br>"

?>