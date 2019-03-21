
    
    function calcYearOld (birthday){
        uhasihdihasidha
        return date;
    }
    
    var calcYearOld = function(birthday)
    {

        var date1 = birthday.valueAsDate;
        var date2 = new Date();
        var timeDiff = Math.abs(date2.getTime() - date1.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 60 * 60 * 24 * 365)); 
        console.log (diffDays);
    }; 
    
    var documentoPronto = function (){
        
    }; 
    
    
    $(document).ready(documentoPronto);
    
    

    $(document).ready( function () {
        // validarCPF();
         
         $('#consultar').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese.json"
            },
             dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel',
                        {
                            extend: 'pdfHtml5','excel'
                            orientation: 'landscape',
                            pageSize: 'LEGAL',
                        
                            title:'Relatório'
                        },
                      
                    ],
          });
        
        //inicia Data table
        // $('.consultar').dataTable( );
       /* $('.consultar').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese.json"
        },

            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel',
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                
                    title:'Relatório'
                },
              
            ],

            
            });*/



        
        //Mascara CPF
        $(".maskcpf").mask('000.000.000-00', {reverse: true});
        //Mascara CNPJ
        $(".maskcnpj").mask("99.999.999/9999-99" , {reverse: true});
        //Mascara CEP
        $(".maskcep").mask('00.000-000', {reverse: true});
        //Mascara Telefone Fixo
        $(".maskfone").mask("(00) 0000-0000" , {reverse: false});
        //Mascara Celular
        $(".maskcel").mask("(00) 00000-0000" , {reverse: false});

        //calendario 
        var datepicker = $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            //dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true
        });

        
        //abre calendario ao clicar no campo
        $('.datepicker').focus(function() {
          datepicker.open(); 
        });
        
       //checkbox 
        $('.checkbox').bootstrapToggle();
        
        //  $('.validate').cpfcnpj({
        //         mask: true,
        //         validate: 'cpfcnpj',
        //         event: 'focus',
        //         // validateOnlyFocus: true,
        //         handler: '.btn',
        //         ifValid: function (input) { input.removeClass("error"); alert('valido'); },
        //         ifInvalid: function (input) { input.addClass("error"); alert('invalido');}
        //     });
      
    

    } );

   function validarCPF (){
        let prof = $('#Prof_Cnpj_Cpf');
        let cli = $('#Cli_Cpf');
        let conv = $('#Conv_Cnpj');

        if(cli)
            url = 'Validar.php?&cpf='+cli.val();

        $.ajax({
          url : url,
         type : 'post',
         
        }).done(function(msg){
            console.log(url);
            if(msg == 1)
                alert('Cpf valido');
            else
                alert('cpf invalido');    
          // $("#resultado").html(msg);
         }) 
    }



     
    function destroySession(){
       session_destroy();
    }
