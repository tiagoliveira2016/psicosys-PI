<?php 
    session_start();
        require_once("header.php");
        makeHeather();
?>
<style>
body{
    background-image: url("img/6.jpg");
    background-repeat: no-repeat; 
   
    
}
</style>
    <div class="TextoInicial">
        <h1>Bem Vindo ao <?php echo ucfirst($_SESSION['login']);?>!</h1> 
        
    </div>
  
