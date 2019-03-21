<?php

// DOCUMENTADO EM CLASS.USUARIO.PHP

require_once('Class/class.gn_tabela.php');

class cliente extends gn_tabela 
{   
    // var $status = false;

    function __construct(){
        if(isset($_GET['op']) && $_GET['op'] == 'valcpf')
            $this->valcpf();

        parent::__construct();
        
        $this->classe = "cliente";
        
        $this->tabela = "tab_clientes";
        
        $this->chave = "Cli_Cod";


        
        $this->campos = array(
            "Cli_Data_Cadastro" => array(
                "tagname"  => "input",
                "class"    => 'form-control datepicker' ,
                "banco"    => "Cli_Data_Cadastro",
                "id"       => "Cli_Data_Cadastro",
                "label"    => "Data de Cadastro",
                "callback" => "lista_callback_data",
                //"type"     => "text",
                "pesquisa" => false,
                // "disabled" => false,
                "tamanho"  => 6,
                "value"    => date('d/m/Y'),
                "readonly" => true
                // "onchange" => "calcYearOld(this, \"Cli_Idade\");",
            ),
            
            "Cli_Status" => array(
                "tagname"       => "input",
                "class"         => 'form-control checkbox ' ,
                "banco"         => "Cli_Status",
                "id"            => "Cli_Status",
                "callback"      => "lista_callback_check",
                "label"         => "Status",
                "type"          => "checkbox",
                // ($this->status == true ? '"checked" => $this->status :' ''), // ?? para sempre vir ticado
                "pesquisa"      => true,
                "tamanho"       => 1,
                "data-toggle"   =>"toggle",
                "data-onstyle"  =>"success",
                "data-offstyle" =>"danger",
                "data-on"       =>"Ativo",
                "data-off"      =>"Inativo"
            ),
            "Cli_Nome" => array(
                "tagname"  => "input",
                "class"    => 'form-control ',
                "banco"    => "Cli_Nome",
                "id"       => "Cli_Nome",
                "label"    => "Nome",
                "orderBy"  => true, //?? Pendente
                "required" => true,
                "pesquisa" => true,
                "tamanho"  => 6,
            ),
            "Cli_Cpf" => array(
                "tagname"  => "input",
                "class"    => 'form-control maskcpf validate',
                "banco"    => "Cli_Cpf",
                "id"       => "Cli_Cpf",
                "label"    => "CPF",
                "pesquisa" => true,
                "required" => true,
                "tamanho"  => 6,
                // "onchange" => 'validarCPF()',
                "maxlength" => 10,

                // "onkeyup" => "maskcpf()",
            ),
            "Cli_Data_Nasc" => array(
                "tagname"  => "input",
                "class"    => 'form-control datepicker' ,
                "banco"    => "Cli_Data_Nasc",
                "id"       => "Cli_Data_Nasc",
                "label"    => "Data Nascimento",
                "callback" => "lista_callback_data",
                "type"     => "date",
                "pesquisa" => true,
                "required" => true,
                "tamanho"  => 3,
                "onchange" => "calcYearOld(this, \"Cli_Idade\");",
            ),
            
            "Cli_Idade" => array(
                "tagname"        => "input",
                "class"          => 'form-control ' ,
                "banco"          => "Cli_Idade" ,
                "id"             => "Cli_Idade" ,
                "label"          => "Idade",
                "type"           => "text",
                "pesquisa"       => true,
                "disabled"       => true,
                "gravar"         => false,
                "tamanho"        => 3,
                "custonSelect"   => "
                    CASE
                        WHEN Cli_Data_Nasc <> '0000-00-00' 
                        THEN (SELECT YEAR(CURRENT_TIMESTAMP) - YEAR(Cli_Data_Nasc) - 
                            (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(Cli_Data_Nasc, 5))) 
                        ELSE NULL
                    END Cli_Idade",
            ),
            "Cli_Tipo" => array( 
                "tagname"  => "select",
                "class"    => 'form-control ' ,
                "banco"    => "Cli_Tipo",
                "id"       => "Cli_Tipo",
                "label"    => "Classificação",
                "pesquisa" => true,
                "required" => true,
                "tamanho"  => 3,
                'options'=> array(
                    'Crianca'    => "Criança"     ,       
                    'Adolescente'=> "Adolescente" ,           
                    'Adulto'     => "Adulto"      ,       
                    'Idoso'      => "Idoso"       ,   
                ),
            ),
            "Cli_Periodo" => array( 
                "tagname"  => "select",
                "class"    => 'form-control ' ,
                "banco"    => "Cli_Periodo",
                "id"       => "Cli_Periodo",
                "label"    => "Preferência Período",
                "pesquisa" => true,
                "tamanho"  => 3,
                'options'=> array(
                    'Manha'  => "Manhã",       
                    'Tarde'  => "Tarde",           
                    'Noite'  => "Noite",       
                    'Sabado' => "Sábado",   
                ),
            ),
            "Cli_Cod_Cid" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Cli_Cod_Cid",
                "id"       => "Cli_Cod_Cid",
                "label"    => "Código CID",
                "pesquisa" => false,
                "tamanho"  => 6,
            ),
            "Cli_Liberacao" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Cli_Liberacao",
                "id"       => "Cli_Liberacao",
                "label"    => "Liberação (Código ou Nº Carteirinha)",
                "pesquisa" => true,
                "tamanho"  => 6,
            ),
            "Cli_Endereco" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Cli_Endereco",
                "id"       => "Cli_Endereco",
                "label"    => "Endereço",
                "pesquisa" => false,
                "tamanho"  => 6,
            ),
            "Cli_Cep" => array(
                "tagname"  => "input",
                "class"    => 'form-control maskcep' ,
                "banco"    => "Cli_Cep",
                "id"       => "Cli_Cep",
                "label"    => "CEP",
                "pesquisa" => false,
                "tamanho"  => 6,
            ),
            "Cli_Contato_Fone1" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Cli_Contato_Fone1",
                "id"       => "Cli_Contato_Fone1",
                "label"    => "Contato(1)",
                "pesquisa" => true,
                // "required" => true,
                "tamanho"  => 3,
            ),
            "Cli_Fone1" => array(
                "tagname"  => "input",
                "class"    => 'form-control maskfone' ,
                // "type"  => "phone",
                "banco"    => "Cli_Fone1",
                "id"       => "Cli_Fone1",
                "label"    => "Fone(1)",
                "pesquisa" => true,
                // "required" => true,
                "tamanho"  => 3,
            ),
            
            "Cli_Contato_Fone2" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Cli_Contato_Fone2",
                "id"       => "Cli_Contato_Fone2",
                "label"    => "Contato(2)",
                "pesquisa" => false,
                "tamanho"  => 3,
            ),
            "Cli_Fone2" => array(
                "tagname"  => "input",
                "class"    => 'form-control maskfone' ,
                "banco"    => "Cli_Fone2",
                "id"       => "Cli_Fone2",
                "label"    => "Fone(2)",
                "pesquisa" => false,
                "tamanho"  => 3,
            ),
            "Cli_Contato_Cel1" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Cli_Contato_Cel1",
                "id"       => "Cli_Contato_Cel1",
                "label"    => "Contato Cel(1) ",
                "pesquisa" => true,
                "required" => true,
                "tamanho"  => 3,
            ),
            "Cli_Cel1" => array(
                "tagname"  => "input",
                "class"    => 'form-control maskcel ' ,
                "banco"    => "Cli_Cel1",
                "id"       => "Cli_Cel1",
                "label"    => "Celular(1)",
                "pesquisa" => true,
                "required" => true,
                "tamanho"  => 3,
            ),
            "Cli_Contato_Cel2" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Cli_Contato_Cel2",
                "id"       => "Cli_Contato_Cel2",
                "label"    => "Contato Cel(2)",
                "pesquisa" => false,
                "tamanho"  => 3,
            ),
            "Cli_Cel2" => array(
                "tagname"  => "input",
                "class"    => 'form-control maskcel' ,
                "banco"    => "Cli_Cel2",
                "id"       => "Cli_Cel2",
                "label"    => "Celular(2)",
                "pesquisa" => false,
                "tamanho"  => 3,
            ),
            "Cli_Resp" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Cli_Resp",
                "id"       => "Cli_Resp",
                "label"    => "Responsável",
                "pesquisa" => true,
                "tamanho"  => 6,
            ),
            "Cli_Email" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Cli_Email",
                "id"       => "Cli_Email",
                "label"    => "E-mail",
                "pesquisa" => true,
                "tamanho"  => 6,
            ),
            
            "Cli_Convenio" => array(
                "tagname"      => "select",
                "class"        => 'form-control ',
                "type"         => "db",
                "banco"        => "Cli_Convenio",
                "id"           => "Cli_Convenio",
                "label"        => "Convênio",
                "custonSelect" => "tab_convenios.Conv_Nome",
                "custonFrom"   => "LEFT OUTER JOIN tab_convenios ON (tab_convenios.Conv_Cod = tab_clientes.Cli_Convenio)",
                "SQL"          => "SELECT Conv_Cod, Conv_Nome from tab_convenios",
                "SELECT_VALUE" => 'Conv_Cod' ,
                "SELECT_NAME"  => 'Conv_Nome',
                "pesquisa"     => false,
                "tamanho"      => 6,
            ),
            
            "Cli_Obs" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Cli_Obs",
                "id"       => "Cli_Obs",
                "label"    => "Observação",
                "pesquisa" => false,
                "tamanho"  => 6,
            ),
            "criado_em" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "criado_em",
                "id"       => "criado_em",
                "label"    => "Criado Em",
                "callback" => "lista_callback_data",
                "pesquisa" => true,
                "readonly" => true,
                "tamanho"  => 6,
            ),
            "usuario_cri" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "usuario_cri",
                "id"       => "usuario_cri",
                "label"    => "Usuario Criação",
                "pesquisa" => true,
                "readonly" => true,
                "tamanho"  => 6,
            ),
            "alterado_em" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "alterado_em",
                "id"       => "alterado_em",
                "label"    => "Alterado Em",
                "pesquisa" => true,
                "readonly" => true,
                "callback" => "lista_callback_data",
                "tamanho"  => 6,
            ),
            "usuario_alt" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "usuario_alt",
                "id"       => "usuario_alt",
                "label"    => "Usuario Alteração",
                "pesquisa" => true,
                "readonly" => true,
                "tamanho"  => 6,
            ),
        );


    }
    
    function lista_callback_check($vl){
        //?? COMENTADO PARA EN.... O CLIENTE
        

        $char =  "<i class='fas fa-circle'></i>";

        if ($vl == 'on' || $vl == 'ON'){
            $color = '#369939'    ;
            $this->status = true;

            
        } else {
           $color = '#b22222'      ;
           $this->status = false;
           
        }
        
        
        return "
            <span  
                style='
                    font-size : 20px;
                    color     : $color;
                '>
                $char
            </span>
        ";
    }
    
    
   function lista_callback_data($valor)
    {
        if ($valor == "0000-00-00" || $valor == "0000-00-00 00:00:00" || empty($valor)  ){
            return "";
        }
        
        return date( 'd/m/Y', strtotime( $valor ) ) ; 
    }
    
    
    function getJavascript(){
        return "
            // ?? remover
            $(document).ready(
                function(){
                    //?? MASCARAS AQUI 
                    
                    
                    $('#Cli_Data_Nasc').change();
                    $('.validate').change();

                }
            );
            
            var calcYearOld = function(birthday, target)
            {
                var date1 = birthday.valueAsDate;
                var date2 = new Date();
                var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                var diffDays = Math.ceil(timeDiff / (1000 * 60 * 60 * 24 * 365)); 
                diffDays = diffDays > 1 ? diffDays -1 : diffDays;
                document.getElementById(target).value=(diffDays);
            };


            function validarCpf(){
                alert('validando...');
            }
            
        ";
    }

   /* function valcpf(){
        // var_dump($_GET['cpf']);
       $cpf = $this->validaCPF($_GET['cpf']);
       $a = ($cpf == 1 ? 1 : 0);

       echo $a;
    }*/
}


