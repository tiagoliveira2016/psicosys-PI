

 <!-- Includes -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
	<link rel="stylesheet" type="text/css" media="screen" href="lib/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="lib/externos/bootstrap.min.css">
	<script src="lib/bootstrap/js/npm.js"></script>
	<script src="lib/externos/jquery.min.js"></script>
	<script src="lib/bootstrap/js/jquery-3.3.1.min.js"></script>
	<script src="lib/externos/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="lib/bootstrap/css/PsicoSysCss.css"/>

	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />

<style>
body{
    background-image: url("img/6.jpg");
    background-repeat: no-repeat; 
   
    
}

.vertical-offset-100{
    padding-top:15%;
}
</style>
<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Login do Usuário</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="POST" action="Class/class.login.php">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Login" name="login" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Senha" name="senha" id="senha" type="password" value="">
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember You"> Lembrar minha senha
			    	    	</label>
			    	    </div>
			    		<input class="btn btn-lg btn-primary btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>