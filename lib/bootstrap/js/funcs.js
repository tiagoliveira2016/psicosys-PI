var req;

function buscarUsuarios(valor){
    //Verificando Browser
    if(window.XMLHttpRequest){
        req = new XMLHttpRequest();
    }
    else {
        req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    //Arquivo PHP juntamente com o valor digitado no campo
    var url = "usuarioController?valor="+valor;


    //Chama o metodo open  para processar a requisição
    req.open("Get" , url , true);

    
    // Quando o objeto recebe o retorno, chamamos a seguinte função;
    req.onreadystatechange = function() {
        // Exibe a mensagem "Buscando Usuarios..." enquanto carrega
        if(req.readyState == 1) {
            document.getElementById('usuarioDados').innerHTML = 'Buscando Usuarios...';
        }

        // Verifica se o Ajax realizou todas as operações corretamente
	    if(req.readyState == 4 && req.status == 200) {
            var resposta = req.responseText;


            // Abaixo colocamos a(s) resposta(s) na div resultado
            document.getElementById('usuarioDados').innerHTML = resposta;
        }
    }

    req.send(null);
}