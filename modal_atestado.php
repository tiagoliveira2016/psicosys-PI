    <?php
            // require_once('./Class/class.gn_tabela.php');
            // require_once("fullcalendar/model/buscar.php");
           session_start();
            require_once("./header.php");
            require_once("./fullcalendar/model/buscar.php");
            makeHeather();
    ?>

    <html>
    <head>
        <meta charset="utf-8">
        <meta lang="pt-BR">
        <title> Atestados </title>
        <!-- <script src="lib/externos/jquery.min.js"></script> -->
        <!-- <script src="lib/bootstrap/js/jquery-3.3.1.min.js"></script> -->
        <!-- <script src="lib/externos/bootstrap.min.js"></script> -->
        <script src="view/js/modal_atestado.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    </head> 
    <body>   
      <div id="ModalLegenda" class="modal fade">
            <div class="modal-dialog">        
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                        <h4 id="modalTitle" class="modal-title"></h4>
                    </div> 
                    <div class="container col-xs-12" >
                        <form id="form" action="imprimir.php?tabela=atestado" method="POST">
                           <!--  <label>Nome do Cliente</label>
                            <input type="text" name="str_nome" id="str_nome" class="form-control"> -->
                            <!-- <br> -->
                             <!-- COMBOBOX CLIENTES -->
                            <label for="cliente">Selecione um cliente:</label> <br>
                            <select id="cliente" class="js-example-basic-single form-control" name="cliente">
                            <?php 
                                $a = new buscar();
                                $cli = $a->getClientes();
                            
                                    
                                $cli2 = json_decode($cli,true);
                                
                               foreach ($cli2 as $key => $value) {
                             
                                echo "<option value='".$value['Cli_Cod']."'>".$value['Cli_Nome']."</optin>

                                ";
                                

                               }
                                
                                

                            ?>
                             
                            </select><br>
                            <div class="container" style="margin-left:83%;">
                                <button type="submit" class="btn btn-success">Avançar</button>
                            </div>
                        </form>
                    </div>      
                    <div id="modal-footer" class="modal-footer"></div>    
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>