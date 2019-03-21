 <?php
        // require_once('./Class/class.gn_tabela.php');
        // require_once("fullcalendar/model/buscar.php");
        require_once("header.php");
        // makeHeather();
 ?> 

    <html>
    <head>
        <meta charset="utf-8">
        <meta lang="pt-BR">
        <title> Eventos Psicosys </title>

    </head> 
    <body>   
      <div id="ModalLegenda" class="modal fade">
            <div class="modal-dialog">        
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                        <h4 id="modalTitle" class="modal-title"></h4>
                    </div> 
                    <div class="container">
                        <i class="fas fa-circle" style="color:#4c6ca0"></i>
                        <label>Consultas Agendadas</label><br>

                        <i class="fas fa-circle" style="color:#369939"></i>
                        <label>Consultas Atendidas</label><br>

                        <i class="fas fa-circle" style="color:#ff4945"></i>
                        <label>Desistencias</label><br>

                        <i class="fas fa-circle" style="color:#8b2e0f"></i>
                        <label>Faltas</label>



                         <!-- if(event.STATUS == 'A')
                            element.css('background-color', '#4c6ca0');
                        else if(event.STATUS == 'D')
                            element.css('background-color', '#ff4945');
                        else if(event.STATUS == 'F')
                            element.css('background-color', '#8b2e0f');
                        else
                            element.css('background-color', '#3eab2d'); -->
                    </div>      
                    <div id="modal-footer" class="modal-footer"></div>    
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>