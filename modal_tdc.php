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
                        <h4 id="modalTitle" class="modal-title">Quantidade de Consultas por Dia</h4>
                    </div> 
                     
                    <form id="form" action="indicador.php?tabela=indicador_tdc" method="POST">
                        <div class="modal-body">
                            <label for="tipo">Tipo</label>
                            <select value="" name="tipo" id="tipo" class="form-control">
                                <option value="M">Mensal</option>
                                <option value="D">Diário</option>
                            </select><br>
                            
                            <label for="status">Status desejado:</label>
                            <select value="" name="status" id="status" class="form-control">
                                <option value="C">Consultas Efetuadas</option>
                                <option value="A">Consultas Agendadas</option>
                                <option value="D">Desistências e Faltas</option>
                                <option value="T">Geral</option>
                            </select><br>
                            <label for="dataini">De Data:</label>
                            <input type="date" name="dataini" id="dataini" class="form-control datepicker" required="true">
                            <br>
                            <label for="datafim">Até Data:</label>
                            <input type="date" name="datafim" id="datafim" class="form-control datepicker" required="true">
                        </div>    
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Gerar Indicador</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>  
                        </div>     
                    </form>
                </div>      
                       
            </div>
        </div>
    </body>
</html>