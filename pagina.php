<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">  
        <link rel='shortcut icon' href="imgs/icon.png" type="image/png">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Renapecar Veiculos</title>
    </head>
<body>
    
    <?php
        session_start();
        if(isset($_SESSION['idUsuario'])){    
            if(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] == "admin"){
                echo "<a href='homeAdmin.php' ><Button id='homeAdmin'>Home Admin</button></a>";

            }
        }  
    ?>
    
    <div id="topoCima">
    <?php
            
        
            echo "<a href='index.php'><font id=nome_pag>Renapecar</font>";
        
            if(isset($_SESSION['idUsuario'])){
                echo "<a href='home.php'><font class='entrou'>Minha Conta</font>";
                echo "<font class='entrou' > | </font>";
                echo "<a href=deslogar.php><font class='entrou'>Sair</font></a>";
            }else{
                echo "<a href='login.php'><font class='entraa'>Login</font>";
                echo "<font class='entraa' > | </font>";
                echo "<a href=usuario_form.php><font class='entraa'>Registrar</font></a>";
            }
    ?> 
    </div>
    
    <div id="topoBaixo">
        <?php
            echo "<a href='index.php'>
                <button id='btinftopo'>Home</button>
            </a> ";
        
            echo "<a href='veiculos.php'>
                <button id='btInfComprar'>Comprar</button>
            </a> ";
        
            echo" <form action=veiculos.php method=get >";
            echo"     <input id=buscar name=buscar>";
            echo" <input id=bBuscar  value=Buscar>";
            echo" </form>";
              ?>
    </div>
</body>
</html>
