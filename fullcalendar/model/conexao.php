<?php
class conexao{

	public static function executarNoBanco($SQL='')
    {
        // echo "$SQL";exit();
        
        $servername  =  "localhost" ; // Server em que esta o banco
        $username    =  "root"      ; // usuario do banco
        $password    =  ""          ; // senha do banco
        $database    =  "newPsicosys"  ; // banco de dados
        
        
        // Cria a conexao com o banco
        $conn = new mysqli($servername, $username, $password, $database);
        
        // Verifica se a conexao funcionou
        if ($conn->connect_error) {
            // Se nao funcionou, entao dispara um erro e para de executar o PHP
            die("Connection failed: " . $conn->connect_error);
        } 
        
        // Roda o script no banco e pega o retorno
        $resultado = $conn->query($SQL);
        
        // tres iguais compara o tipo, caso retornase Zero, ele entraria no if, 3 iguais evita isso
        if ($resultado === false)
        {
            echo "
                <span style='color:red;font-weight: bold;'>
                    Erro No Banco no Script:
                </span>
                <pre>".mysqli_error($conn)."</pre>
                <pre>$SQL</pre>
                
            ";
            exit();
        }
        
        // salva as alteracoes executadas no banco
        $conn->commit();
        // fecha a conexao com o banco
        $conn->close();
        
        // Retorna o resultado da execucao no banco
        return $resultado;
    }
	}
?>