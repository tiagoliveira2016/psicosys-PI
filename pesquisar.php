<?php

// http://localhost/Psicosys/pesquisar.php?tabela=usuario

// tabela passada por parametro , 
$tabela = $_REQUEST ['tabela'];

// inclue o a classe da tabela passada
require_once("Class/class.$tabela.php");

// instancia a classe passada, instanciar eh receber todas as funcoes dessa classe 
$classeTabela = new $tabela ();

// chama o metodo que monta a consulta da classe 
echo $classeTabela->pesquisar();
