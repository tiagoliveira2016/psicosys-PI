$(document).ready( function () {
	datepicker();

	 
});



function datepicker(){
	
	$('.data').datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });

        
    //abre calendario ao clicar no campo
    $('.data').focus(function() {
	      datepicker.open(); 
    });
}