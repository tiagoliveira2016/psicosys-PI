<?php


require_once('class.gn_elms.php');
/**
 * Classe de tabela generica, aqui vao ficar todos os recursos que as tabelas podem usar
 */
class gn_tabela
{
    var $tabela;
    var $chave;
    var $campos;
    var $classe;
    var $operacao ;
    //Variaveis para login
    var $login;
    var $senha;
    
    function __construct()
    {
        $this->classe = ""      ; 
        $this->tabela = ""      ; 
        $this->chave  = ""      ; 
        $this->campos = array() ; 
        // $this->operacao =  (isset($_REQUEST['Operacao']) && $_REQUEST['Operacao'] == 'Cadastrar' ? "Cadastrar" : "Pesquisar");
        
        // $elemento = "inp";
        
        $this->elms = new gn_elms();
        
        // para funcionar em celulares
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
       
    }
    
    
    
    
    /**
     * CADASTRAR
     */
    
    // metodo cadastrar decide se vai criar o formulario de cadastro ou salvar
    function cadastrar()
    {   
       
        // verifica se esta salvado o usuario
        if (isset($_REQUEST['Operacao']) && $_REQUEST['Operacao'] == 'Cadastrar'){
            // Salva os dados no banco
            return $this->fazerCadastro();
        } 
        
        // Se nao estiver salvando, cria o formulario de salvamento
        else {
            // monta o cadastro
            return $this->montarCadastro();
        }
    }
    
    // 
    function montarCadastro()
    {
        return $this->montarFormulario($nome="Cadastrar", $action='cadastrar.php');
    }
    
    function fazerCadastro(){
        $INSERT = array();
        $VALUES = array();
        $cpf = true;
        //$this->ver($_POST);
            // var_dump($_POST);

        foreach ($_POST as $chave => $valor)
        {
            //print_r($_POST); exit();
            if (!isset($this->campos[$chave]["gravar"]) || $this->campos[$chave]["gravar"]===true)
            {
        
                $INSERT[] =  "$chave"  ; 

                if ($chave == 'criado_em') {
                    $VALUES[] = "now()" ; 
                }
                else 
                    if ($chave == 'usuario_cri') {
                        $VALUES[] = (isset($_SESSION['login']) ? "'".$_SESSION['login']."'" : '');
                    } 
                    else {
                        $VALUES[] = "'$valor'" ; 

                    }

            }
            if ($chave == "Cli_Data_Cadastro")
            {   
                $VALUES[0] = "'".date( 'Y-m-d')."'";
            }


            if ($chave == "Cli_Cpf" || $chave == "Prof_Cnpj_Cpf"   ){
                $cpf = $this->validaCPF($valor);
                $procura = $valor;

            }
            elseif($chave == "Conv_Cnpj"){
                $cpf = $this->validaCNPJ($valor);
                $procura = $valor;                
            }
            elseif($chave == 'usu_nome'){
                $procura = $valor;                
            }
            elseif($chave == 'CONS_DESC'){
                $procura = $valor;
            }
            elseif($chave == 'sala_desc')
                $procura = $valor;
            
           
        }


        // if(!isset($_POST['usu_status']) || !isset($_POST['usu_status'])){
        
            if($this->tabela == 'tab_usuarios' && !isset($_POST['usu_Status']) ){
                $INSERT[] = 'usu_status';
                $VALUES[] = '"on"';
            }
            elseif($this->tabela == 'tab_clientes' && !isset($_POST['Cli_Status'])){
                $INSERT[] = 'cli_status';
                $VALUES[] = '"on"';      
            }
            elseif($this->tabela == 'tab_profissionais' && !isset($_POST['Prof_Status'])){
                $INSERT[] = 'prof_status';                 
                $VALUES[] = '"on"';    
            }
            elseif($this->tabela == 'tab_convenios' && !isset($_POST['Conv_Status'])){
                $INSERT[] = 'conv_status';
                $VALUES[] = '"on"';
            }

        // }

        // var_dump($cpf);
        if( $cpf  != 'false')
           echo($this->tabela == 'tab_convenios' ? "<script>alert('CNPJ INVALIDO!')</script>" :  "<script>alert('CPF INVALIDO!')</script>");
        
        else{
  
        $INSERT = implode(",",$INSERT);
        $VALUES = implode(",",$VALUES);
        

        //Valida se Ja existe um registro cadastrado com a mesma informação
        if($this->tabela == 'tab_clientes')
            $val = "SELECT CLI_CPF FROM tab_clientes WHERE CLI_CPF = '".$procura."'";
        elseif($this->tabela == 'tab_profissionais')
            $val = "SELECT PROF_CNPJ_CPF FROM tab_profissionais WHERE PROF_CNPJ_CPF = '".$procura."'";
        elseif($this->tabela == 'tab_convenios')
            $val = "SELECT CONV_CNPJ FROM tab_convenios WHERE CONV_CNPJ = '".$procura."'";
        elseif($this->tabela == 'tab_usuarios')
            $val = "SELECT usu_nome FROM tab_usuarios WHERE usu_nome = '".strtoupper($procura)."' OR usu_email like '".strtoupper($procura)."%@psicosys.com.br'";
        elseif($this->tabela == 'tab_tpConsulta')
            $val = "SELECT CONS_DESC FROM tab_tpconsulta WHERE CONS_DESC = '".strtoupper($procura)."'";
        elseif($this->tabela == 'tab_salas')
            $val = "SELECT SALA_DESC FROM tab_salas WHERE SALA_DESC = '".strtoupper($procura)."'";

        // echo $this->tabela;
        if($this->tabela=='tab_prontuarios')
                $a = '';
        else            
            $a = $this->getone($val);

        if(!empty($a))
            echo("<script>alert('Impossível cadastrar registro duplicado !')</script>" );

        else{
            $SQL = "INSERT INTO `$this->tabela`($INSERT)  VALUES ( ".strtoupper($VALUES).");";
            // $this->ver($SQL);
            $this->executarNoBanco($SQL);
            echo"<script>alert('Cadastrado com sucesso!')</script>";
                
                
            }        
            $cache = $this->montarCadastro();
            return $cache;
        } 
    }
    
    
    
    function editar()
    {
        // verifica se esta salvado o usuario
        if (isset($_REQUEST['Operacao']) && $_REQUEST['Operacao'] == 'Editar'){
            // Salva os dados no banco
            return $this->fazerEditar();
        } 
        
        // Se nao estiver salvando, cria o formulario de salvamento
        else {
            // monta o Editar
            return $this->montarEditar();
        }
    }
    
    
    
    function fazerEditar()
    {
            
        $SQL_COLUNAS = array();
        $cpf = true;
        
        foreach ($this->campos as $campo){
            $coluna = $campo['banco'];
            // verifica se o nome do campo no banco esta vindo no request
            if (array_key_exists($coluna, $_REQUEST)){
                $SQL_COLUNAS[] = " $coluna = '{$_REQUEST[$coluna]}' " ;

                //Cliente
                if($this->tabela == 'tab_clientes'){
                    if(!isset($_REQUEST['Cli_Status']))
                        $SQL_COLUNAS[] = "Cli_Status = 'off'";
                    elseif(isset($_REQUEST['Cli_Status']))
                        $SQL_COLUNAS[] = "Cli_Status = 'on'";
                }
                //Profissional
                if($this->tabela == 'tab_profissionais'){
                    if(!isset($_REQUEST['Prof_Status']))
                        $SQL_COLUNAS[] = "Prof_Status = 'off'";
                    elseif(isset($_REQUEST['Prof_Status']))
                        $SQL_COLUNAS[] = "Prof_Status = 'on'";
                }
                //Convenio
                if($this->tabela == 'tab_convenios'){
                    if(!isset($_REQUEST['Conv_Status']))
                        $SQL_COLUNAS[] = "Conv_Status = 'off'";
                    elseif(isset($_REQUEST['Conv_Status']))
                        $SQL_COLUNAS[] = "Conv_Status = 'on'";
                }
                //Usuario
                if($this->tabela == 'tab_usuarios'){
                    if(!isset($_REQUEST['usu_Status']))
                        $SQL_COLUNAS[] = "usu_Status = 'off'";
                    elseif(isset($_REQUEST['usu_Status']))
                        $SQL_COLUNAS[] = "usu_Status = 'on'";
                }
                if(isset($_REQUEST['alterado_em'])) {
                     $SQL_COLUNAS[] = "alterado_em = now()";
                } 
                if(isset($_REQUEST ['usuario_alt'])) {
                     $SQL_COLUNAS[] = "usuario_alt ='". $_SESSION['login']."'";
                }  
                if($coluna == 'Cli_Cpf' || $coluna == 'Prof_Cnpj_Cpf'){
                    $resquest = (isset($_REQUEST['Cli_Cpf']) ? $_REQUEST['Cli_Cpf'] : $_REQUEST['Prof_Cnpj_Cpf']  );
                    $validaCpf = $this->validaCPF($resquest);

                }   
                elseif($coluna == 'Conv_Cnpj' ){
                    $resquest = (isset($_REQUEST['Conv_Cnpj']) ? $_REQUEST['Conv_Cnpj'] : ''  );
                    $validaCpf = $this->validaCNPJ($resquest);

                }     
            }
            
        }
        if( isset($validaCpf) && $validaCpf  != 'false'){
           
           echo($this->tabela == 'tab_convenios' ? "<script>alert('CNPJ INVALIDO!')</script>" :  "<script>alert('CPF INVALIDO!')</script>");
        }
        else{
            // var_dump($SQL_COLUNAS);
            $SQL_COLUNAS = implode(', ', $SQL_COLUNAS);
            $SQL = "UPDATE $this->tabela SET $SQL_COLUNAS WHERE $this->chave = {$_REQUEST[$this->chave]};";
            $this->executarNoBanco($SQL);
            //var_dump($_SESSION['login']);
        }
            return $this->pesquisar();
    }


    
    
    
    function montarEditar()
    {
        $SELECT = array();
        
        $SELECT[] = $this->chave ;
        
        foreach ($this->campos as $campo)
        {
            if ( isset( $campo['custonSelect'] ) && !isset($campo['SQL']) )
            {   
                $SELECT[] = $campo['custonSelect'];
            } else {
                $SELECT[] = $campo['banco'];
            }
            
        }
        $SELECT = implode(', ', $SELECT);
        
        $SQL="SELECT 
                $SELECT
            FROM 
                $this->tabela 
            WHERE 
                $this->chave = '{$_REQUEST['chave']}'
            ;
        " ; 
        
        $banco = $this->executarNoBanco($SQL);
        
        $dados = array();
        
        foreach ($banco as $linha){
            foreach ($linha as $chave => $valor){
                $dados[$chave] = $valor;

            }
            if(isset($dados['Cli_Data_Cadastro']))
               $dados['Cli_Data_Cadastro'] = date( 'd/m/Y', strtotime( $dados['Cli_Data_Cadastro'] ) );
        }

        return $this->montarFormulario($nome="Editar", $action='editar.php', $dados);
    }
    
    
    function montarFormulario($nome, $action, $dados=array())
    {
        // inicia cahche com uma string
        $cache = ''; 
        
        // Cria um formulario

        $cache .= $this->elms->formBegin($action, $this->classe, $nome);
        $cache .="<div>";
        //Cabeçalho da pagina 
        $cache .="<div class='divTitulo col-lg-8 container'><h1 class='tituloClasses'>Cadastro de {$this->classe}</h1></div>";
        
        
        // Se for edicao, passa a chave da tabela tambem, carrega no metodo fazerEditar
        if ($nome == 'Editar'){
            $cache .= "<input type='hidden' name='$this->chave' value='{$dados[$this->chave]}'>";
        }

        
        // percorre os campos setados na classe do usuario
        foreach ($this->campos as $campo)
        {
            if (array_key_exists($campo['banco'], $dados))
            {
                // Se for edicao, carrega os campos do banco, carregados pelo metodo fazerEditar
                if ($nome == 'Editar'){
                    $nomeBanco = $campo['banco'];
                    $campo['value'] = $dados[$nomeBanco];
                    // var_dump($campo);
                }
            }
            
            // cria um input para cada campo da tabela
            // $cache .= $this->elms->campoFormulario($campo);
            if($campo['id'] == 'Cli_Status' || $campo['id'] == 'Conv_Status' || $campo['id'] == 'Prof_Status' || $campo['id'] == 'usu_Status'){
                #Status ON ou OFF
                if(isset($campo['value']) && $campo['value'] == 'on')
                    $campo['checked'] =  'true';
                

            }
            // else

                $cache .= $this->elms->{$campo['tagname']}($campo);


        }
        $cache .="</div>";
        // Cria um botao do tipo submit que envia um formulario
        
        $cache.=$this->elms->botoesRodape('Gravar', "Cancelar");
        
        // Fecha o formulario
        $cache.=$this->elms->formEnd();
        
        $cache.="<script>".$this->getJavascript()."</script>";
        
        return $cache;
    }
    
    
    /**
     * PESQUISAR
     */
    function pesquisar()
    {
        $cache = ''; // inicia cache com uma string
        
        //Cabeçalho da pagina 
        $cache .="<div class='divTitulo col-lg-8 container'><h1 class='tituloClasses'>Pesquisa de {$this->classe}</h1></div>";
        
        
        $SELECT = array();
        $SELECT[] = $this->chave;
        
        $FROM  = array();
        $FROM[]= $this->tabela;
        
        $WHERE = array(); 
        
        $ORDERBY = array();

        foreach ($this->campos as $dadosCampo)
        {
            // Campos normais que aparecem na pesquisa, 
            if ($dadosCampo['pesquisa'])
            {
                // Se existir uma cusmtomizacao de select, usa ela
                if (isset($dadosCampo['custonSelect'])){
                    $SELECT[] = $dadosCampo['custonSelect'];
                } else {
                    $SELECT[] = $dadosCampo['banco'];
                }
                
                // Se existir uma cusmtomizacao de select, usa ela
                if (isset($dadosCampo['custonFrom'])) {
                    $FROM[] = $dadosCampo['custonFrom'];
                }

                if (isset($_REQUEST['Pesquisar']) && $_REQUEST['Pesquisar'] !== '') {
                    if (isset($dadosCampo['pesquisa']) && $dadosCampo['pesquisa'] !== false && !isset($dadosCampo['custonSelect'])){
                        $WHERE[] = " UPPER($dadosCampo[banco]) LIKE UPPER('%$_REQUEST[Pesquisar]%')";
                    }
                }
            }
            
            if (isset($dadosCampo['orderBy'])){   
                $ORDERBY[] = $dadosCampo['banco'];
            }
        }

        $SELECT     = implode (', ' , $SELECT);
        $FROM       = implode (' ' , $FROM);
        $WHERE      = implode (' OR ' , $WHERE);
        $WHERE      = $WHERE == '' ? '1=1' : $WHERE ;
        $ORDERBY    = implode (', ' , $ORDERBY);
        $ORDERBY    = $ORDERBY == '' ? $this->chave : $ORDERBY ;
        
        
        
        $SQL   = " SELECT $SELECT FROM $FROM WHERE $WHERE ORDER BY $ORDERBY ; ";

        $tabelaBanco = $this->executarNoBanco($SQL);
        
        $tr = mysqli_num_rows($tabelaBanco); //Carrega quantidade de Rows do banco
        
        
        $tabela = "";
        
        // $tabela .= "<table  id='consultar'  border=1 class='table-striped table-bordered' >";
        
        
        $thead = array();
        
        foreach ($this->campos as $dadosCampo){
            if ($dadosCampo['pesquisa']){
                $thead[] = "<th scope='col'  nowrap>$dadosCampo[label]</th>";
            }
        }
        

        // Excluir
        $thead[] = "<th scope='col' style='text-align:center'>Ação</th>";
        $thead = implode ('' , $thead);
        
        $dadosTabela = '';
        
        foreach ($tabelaBanco as $linha)
        {
            $dadosTabela .= "<tr class='row'>";
            
            foreach ($linha as $chave => $valor)
            {
                if($chave == $this->chave){
                    $valorChave = $valor;
                } else {
                    
                    if (isset($this->campos[$chave]['callback'])){
                        $valor = $this-> { $this->campos[$chave]['callback'] } ( $valor );
                    }
                    
                    $dadosTabela .= "<td nowrap>$valor</td>";

                }
            }
            
            
            $dadosTabela .= "
                <td nowrap align='center'>
                    <a 
                        href  = 'editar.php?tabela=$this->classe&chave=$valorChave' 
                        style = 'font-size:30px'
                        title = 'Editar'
                    >
                        <i class='fas fa-user-edit'></i>

                    </a>


                    <a 
                        href  = 'excluir.php?tabela=$this->classe&chave=$valorChave' 
                        style = 'font-size:30px; color: #b22222'
                        title = 'Excluir' 
                    >
                       <i class='fas fa-trash-alt'></i>
                    </a>



                
            ";

            //Botão para efetuar atendimento de consultas
            /*if($this->tabela == 'tab_eventos')
                $dadosTabela .= " <a 
                        href  = 'editar.php?tabela=$this->classe&chave=$valorChave' 
                        style = 'font-size:30px; color: #7cc77a'
                        title = 'Atender consulta' 
                    >
                      <i class='fas fa-sign-in-alt'></i>
                    </a>";
  
            $dadosTabela .= " </td> </tr>";*/
        }
        
        
        
        
        $cache.="
            
            <div class='col-lg-12 table-responsive'>
                <table class='table table-striped table-bordered consultare table-hover' style='border-radius: 10px;' id='consultar'>
                    <thead style='font-size: 13px; background: #005C97;  /* fallback for old browsers */
                        background: -webkit-linear-gradient(to right, #363795, #005C97);  /* Chrome 10-25, Safari 5.1-6 */
                        background: linear-gradient(to right, #363795, #005C97); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */;color:white;' >
                        <tr class='row'>
                            $thead
                        </tr>
                    </thead>
                    <tbody style='font-size:small;'>
                        $dadosTabela
                    </tbody>
                </table>
            </div>
        ";
              
       
        return $cache;
        
    }
    
    
    
   public function ver($variavel)
   {
      echo"<pre>";
      print_r($variavel);
      echo"</pre>";
   }    
    
    public function alert($variavel){
        echo"<script>$variavel</script>";
    }
    
    
    /**
     * EXCLUIR
     */
    function excluir()
    {

        if($this->tabela == 'tab_clientes'){
            if(isset($_REQUEST['chave']))
                $SQL = "SELECT cli_id FROM tab_eventos WHERE cli_id =".$_REQUEST['chave'];    
           /* $cli = $this->executarNoBanco($SQL);
            if($cli->num_rows > 0)
                echo "<script>alert('Cliente não pode ser excluido após agendamento de consulta. ')</script>";*/
        }
        if($this->tabela == 'tab_profissionais'){
            if(isset($_REQUEST['chave']))
                $SQL = "SELECT prof_id FROM tab_eventos WHERE prof_id =".$_REQUEST['chave'];    
           /* var_dump($SQL);
            $prof = $this->executarNoBanco($SQL);
            if($prof->num_rows > 0)
                echo "<script>alert('Profissional não pode ser excluido após agendamento de consulta. ')</script>";*/
        }
        //Verifica se o Status é diferente de Concluido
        elseif($this->tabela == 'tab_eventos'){
             if(isset($_REQUEST['chave']))
                $SQL = "SELECT STATUS FROM tab_eventos WHERE id =".$_REQUEST['chave']." AND STATUS = 'C'";    
           /* $ev = $this->executarNoBanco($SQL);
            if($ev->num_rows > 0)
                echo "<script>alert('Consultas efetuadas não podem ser excluidas. ')</script>";*/

        }
        if(!empty($SQL)){
            $aux = $this->executarNoBanco($SQL);

        if($aux->num_rows > 0){
            echo "<script>alert('Exclusão não permitida, há movimentações! ')</script>";
            
        }
        
        
        if($aux->num_rows == 0)
            $SQL = "DELETE FROM {$this->tabela} WHERE $this->chave = $_REQUEST[chave] ; " ; 
            $this->executarNoBanco($SQL);
            
        }


        return $this->pesquisar();
        // return $SQL;
        //return "<script>history.go(-1);</script>" ; 
 
    }
    
    function getJavascript(){
        return ""; 
    }
    
    
    
    /**
     * Executa comando no banco
     *
     * @param string $SQL
     * @return void
     */
    
    public static function executarNoBanco($SQL='')
    {
        // echo "$SQL";exit();
        // teste
        
        $servername  =  "localhost"    ; // Server em que esta o banco
        $username    =  "root"         ; // usuario do banco
        $password    =  ""             ; // senha do banco
        $database    =  "newpsicosys"  ; // banco de dados
        
        
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

    public static function getAll($SQL){

        $servername  =  "localhost"    ; // Server em que esta o banco
        $username    =  "root"         ; // usuario do banco
        $password    =  ""             ; // senha do banco
        $database    =  "newpsicosys"  ; // banco de dados

      
        $mysqli = new mysqli($servername,$username, $password,$database);

        /* check connection */
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        
        $result = $mysqli->query($SQL);
        // $result=mysqli_query($mysqli,$SQL);    
        // Fetch all
        $arr = array();
        while($row = $result->fetch_assoc()){
            $arr[] = $row;

        }

        $mysqli->close();
        return $arr;

    }

     public static function getOne($SQL){

        $servername  =  "localhost"    ; // Server em que esta o banco
        $username    =  "root"         ; // usuario do banco
        $password    =  ""             ; // senha do banco
        $database    =  "newpsicosys"  ; // banco de dados

      
        $mysqli = new mysqli($servername,$username, $password,$database);

        /* check connection */
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        
        $result = $mysqli->query($SQL);
        // $result=mysqli_query($mysqli,$SQL);    
        // Fetch all
        // var_dump($SQL);
        $arr = array();
        while($row = $result->fetch_assoc()){
            $arr = $row;

        }

        $mysqli->close();
        return $arr;

    }

    public function getClientes(){
        $SQL = "SELECT *  FROM tab_clientes " ; 
        $this->executarNoBanco($SQL);
        return $this->pesquisar();
    }

    public function atestado(){
        header( 'Location: ./view/modal_atestado' );
    }

    public function relatorio(){
        // header( 'Location: ./view/modal_relatorio' );
    }

    public function valida(){
        // $this->validaCPF($_GET['cpf']);

    }
    public function transforma($obj){
        

        return   mysqli_fetch_assoc($obj);
        
        // var_dump($a);

        

    }

/*
    Valida CPF
*/
function validaCPF($Cpf = null) {

	// Verifica se um número foi informado
	if(empty($Cpf)) {
		return false;
	}

	// Elimina possivel mascara
	$Cpf = preg_replace("/[^0-9]/", "", $Cpf);
	$Cpf = str_pad($Cpf, 11, '0', STR_PAD_LEFT);
	
	// Verifica se o numero de digitos informados é igual a 11 
	if (strlen($Cpf) != 11) {
		return false;
	}
	// Verifica se nenhuma das sequências invalidas abaixo 
	// foi digitada. Caso afirmativo, retorna falso
	else if ($Cpf == '00000000000' || 
		$Cpf == '11111111111' || 
		$Cpf == '22222222222' || 
		$Cpf == '33333333333' || 
		$Cpf == '44444444444' || 
		$Cpf == '55555555555' || 
		$Cpf == '66666666666' || 
		$Cpf == '77777777777' || 
		$Cpf == '88888888888' || 
		$Cpf == '99999999999') {
		return false;
	 // Calcula os digitos verificadores para verificar se o
	 // CPF é válido
	 } else {   
		
		for ($t = 9; $t < 11; $t++) {
			
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $Cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($Cpf{$c} != $d) {
				return false;
			}
		}

		return true;
	}
}

function validaCNPJ($cnpj = null) {

    // Verifica se um número foi informado
    if(empty($cnpj)) {
        return false;
    }

    // Elimina possivel mascara
    $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
    $cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);
    
    // Verifica se o numero de digitos informados é igual a 11 
    if (strlen($cnpj) != 14) {
        return false;
    }
    
    // Verifica se nenhuma das sequências invalidas abaixo 
    // foi digitada. Caso afirmativo, retorna falso
    else if ($cnpj == '00000000000000' || 
        $cnpj == '11111111111111' || 
        $cnpj == '22222222222222' || 
        $cnpj == '33333333333333' || 
        $cnpj == '44444444444444' || 
        $cnpj == '55555555555555' || 
        $cnpj == '66666666666666' || 
        $cnpj == '77777777777777' || 
        $cnpj == '88888888888888' || 
        $cnpj == '99999999999999') {
        return false;
        
     // Calcula os digitos verificadores para verificar se o
     // CPF é válido
     } else {   
     
        $j = 5;
        $k = 6;
        $soma1 = "";
        $soma2 = "";

        for ($i = 0; $i < 13; $i++) {

            $j = $j == 1 ? 9 : $j;
            $k = $k == 1 ? 9 : $k;

            $soma2 = ($cnpj{$i} * $k) + intval($soma2);

            if ($i < 12) {
                $soma1 = ($cnpj{$i} * $j) +  intval($soma2);;
            }

            $k--;
            $j--;

        }

        $digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
        $digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

        // return (($cnpj{12} == $digito1) and ($cnpj{13} == $digito2));
        return true;
    }
}

}
