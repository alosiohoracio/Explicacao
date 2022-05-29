<?php


function conectar (){
	$servidor = "localhost";
	$usuario = "root";
	$senha = "root";
	$bd = "sistema_escola";

	$con= new mysqli ($servidor,$usuario,$senha,$bd);
	return $con;
}

	$conexao = conectar();
?>