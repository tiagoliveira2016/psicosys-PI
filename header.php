<?php
    // session_start();
    
    function makeHeather(){
        
        ?>
        <head>    
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Pagina Inicial</title>
            
            <!-- Includes -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
            <!-- <script src="lib/bootstrap/js/npm.js"></script> -->
            <script src="lib/externos/jquery.min.js"></script>
            <script src="lib/bootstrap/js/jquery-3.3.1.min.js"></script>
            <script src="lib/externos/bootstrap.min.js"></script>
           
            <!-- //?? MASCARAS AQUI  -->
            <script src="lib/js/index.js"></script>
            <script src="lib/externos/jQuery-Mask/src/jquery.mask.js"></script>

            <!-- Calendario -->
            <link rel="stylesheet" type="text/css" href="lib/externos/datetimepicker/jquery.datetimepicker.css"/ >
            
            <!-- datepicker -->
            <script type="text/javascript" charset="utf8" src="lib/externos/datepicker/jquery-ui.min.js"></script>
            <link rel="stylesheet" type="text/css" href="lib/externos/datepicker/jquery-ui.min.css"/ >

            <!-- DataTables -->
            <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css"> -->
            <link href="lib/externos/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
            
            <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script> -->
            <script type="text/javascript" charset="utf8" src="lib/externos/datatables/js/jquery.dataTables.min.js"></script>
            
            <!-- <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->


           <!--  
            
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script> -->
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>
            <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
            <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
            <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            



            <!-- Checkbox -->
            <script type="text/javascript" charset="utf8" src="lib/externos/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
            <link rel="stylesheet" type="text/css" href="lib/externos/bootstrap-toggle/css/bootstrap-toggle.min.css"/ >

            
            <!--FONT- AWESOME  -->
            <script src="lib/externos/fontawesome/js/all.js"></script>   
            <link href="lib/externos/fontawesome/css/all.css" rel="stylesheet">
            <!-- <script type="text/javascript" charset="utf8" src="lib/externos/datatables/json/portuguese.json"></script> -->

             <!-- CPF VALIDATOR -->
              <script src="lib/externos/CPFValidator/jquery.cpfcnpj.js"></script>   


            
            
           <!--  <link rel="stylesheet" href="lib/externos/fastsearch-master/dist/fastselect.min.css">
            <script src="lib/externos/fastsearch-master/dist/fastselect.standalone.js"></script> -->
          <!--   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->




           <!-- Estilos paginas -->
            <link rel="stylesheet" type="text/css" media="screen" href="lib/bootstrap/css/PsicoSysCss.css"/>
            <link rel="stylesheet" type="text/css" media="screen" href="lib/bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="lib/externos/bootstrap.min.css">
            <meta http-equiv="cache-control" content="max-age=0" />
            <meta http-equiv="cache-control" content="no-cache" />
            <meta http-equiv="expires" content="0" />
            <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
            <meta http-equiv="pragma" content="no-cache" />


            
        </head>
        <body>  


            <!--********************************Inicio Menu ********************** -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!--Link para pagina incial com nome do sistema -->
                    <div class="navbar-header">
                        <a href="menuPrincipal.php">
                            <img src="img/logo_PsicoSys.png" height="45px"  />
                        </a>
                    </div>
                    
                    <!-- Buttons para Atalhos -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
                    <!-- DropDown Opções Profissionais -->
                        <ul class="nav navbar-nav">
                         

                            <?php
                            $disabled = 'disabled';



                                $operacaoes = array(
                                    "Cadastrar",
                                    "Pesquisar",
                                );
                                
                                $tabelas = array(
                                    "Cliente"     ,
                                    "Profissional" ,
                                    "Convenio"    ,
                                    "Usuario"     ,
                                    "tpConsulta",
                                    "Sala",
                                   
                                );
                                
                                foreach ($operacaoes as $operacao) {
                                    echo "
                                        <li class='dropdown'>
                                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>$operacao <span class='caret'></span></a>
                                            <ul class='dropdown-menu'>";
                                                foreach ($tabelas as $tabela) {
                                                    if($_SESSION['tipo'] == 'ADMINISTRATIVO' || $_SESSION['tipo'] == 'SISTEMA' )
                                                        echo "<li><a href='$operacao.php?tabela=$tabela'>$tabela</a></li>";
                                                    else
                                                        echo "<li onclick='bloqueio()'><a>$tabela</a></li>";
                                                }
                                            echo "</ul>
                                            </li> ";
                                }

                                // Agenda
                                echo "
                                    <li class='dropdown'>
                                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Agendar<span class='caret'></span></a>
                                            <ul class='dropdown-menu'>";

                                            if($_SESSION['tipo'] == 'ADMINISTRATIVO' || $_SESSION['tipo'] == 'SISTEMA' ){
                                                echo "<li >
                                                        <a href='./home_calendar.php' >Calendário</a>
                                                      </li>";          
                                            }
                                            else{ 
                                                echo  "<li onclick='bloqueio()'>
                                                            <a>Calendário</a>
                                                       </li>";
                                            }
                                            echo "<li>
                                                    <a href='Pesquisar.php?tabela=Consulta'>Consulta Agenda</a>
                                                 </li>

                                            </ul>
                                    </li> ";
                                
                                
                                
                                
                                // Serviços
                                 // var_dump( $_SESSION);

                                    echo "
                                        <li class='dropdown'>
                                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Serviços<span class='caret'></span></a>
                                            <ul class='dropdown-menu'>";
                                                
                                            if($_SESSION['tipo'] == 'PSICOLOGO' || $_SESSION['tipo'] == 'PSIQUIATRA' || $_SESSION['tipo'] == 'SISTEMA' ){
                                                echo  "
                                                    <li >
                                                        <a href='./modal_atestado.php' >Atestado</a>
                                                    </li>
                                                    <li >
                                                        <a href='Cadastrar.php?tabela=Prontuario' >Prontuário</a>
                                                    </li>
                                                    <li >
                                                        <a href='Pesquisar.php?tabela=Prontuario' >Consulta Prontuário</a>
                                                    </li>";
                                            }
                                            else{
                                                echo  "
                                                    <li onclick='bloqueio()'>
                                                        <a >Atestado</a>
                                                    </li>
                                                    <li onclick='bloqueio()'>
                                                        <a >Prontuário</a>
                                                    </li>
                                                    <li onclick='bloqueio()'>
                                                        <a>Consulta Prontuário</a>
                                                    </li>";
                                            }
                                            
                                         echo  "</ul>
                                        </li> ";
 
                                
                                 $operacaoes4 = array(
                                   
                                    "Gerar",
                                    
                                );
                                
                                $tabelas4 = array(
                                   
                                    "Relatorios",
                                    "Graficos"
                                );
                                
                                // foreach ($operacaoes4 as $operacao4) {
                                    echo "
                                        <li class='dropdown'>
                                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Financeiro<span class='caret'></span></a>
                                                <ul class='dropdown-menu'>
                                            ";
                                            if($_SESSION['tipo'] == 'ADMINISTRATIVO' || $_SESSION['tipo'] == 'SISTEMA'){
                                                echo "
                                                        <li >
                                                                <a href='./modal_relatorio.php' >Relatórios</a>
                                                        </li>
                                                         <li class='dropdown-submenu'>
                                                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Indicadores</a>
                                                            <ul class='dropdown-menu'>
                                                            <li><a href='./modal_tdc.php' >Quantidades de Consultas Geral</a></li>
                                                            </ul>
                                                        </li>

                                                        ";
                                            }
                                            else{
                                                echo "<li onclick='bloqueio()'>
                                                        <a >Relatórios</a>
                                                      </li>";
                                            }
                                                
                                    echo"
                                            </ul>
                                        </li> ";
                                
/*
                                    echo "
                                        <li class='dropdown'>
                                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>$operacao3 <span class='caret'></span></a>
                                            <ul class='dropdown-menu'>


                                            <li >
                                                <a href='./home_prontuario.php' >Prontuário</a>
                                            </li>

                                            ";
                                    echo "
                                        <li >
                                            <a href='./docs/DECLARAÇÃO.pdf' >Atestado</a>
                                        </li>
                                    </ul>
                                         </li> ";
*/                                         
                                // }
                                
                            ?>
                            </ul>
                            <ul class="navbar-right" style='margin-top:10px; margin-bottom:0px'>
                                <form action="index.php">
                                    <button class="btn btn-danger" action="index.php" onclick="destroySession()">
                                        Sair
                                    </a>
                                </form>
                            </ul>
                            <ul class="navbar-right" style='margin-top:10px; margin-bottom:0px' >
                                <b>Usuario Online: <?php echo ucfirst($_SESSION['login']); ?></b>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            

            
        </body>

        <script>
            function bloqueio (){
                alert('Você não tem acesso a esse modulo!');
            }
        </script>
        <?php
        
    }

    