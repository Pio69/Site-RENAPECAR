<?php
include('pagina.php');
?>
<html>   
    <body>
    <?php
          //validar tipoUsuario, para n passar tipo sem ser admin :)
        if(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] != "admin"){
            header("location:login.php?erro=permissao");
        }

        echo "<div id=Admin_home_produto>"; 

        echo "<center>";
        
        echo "<div id=Admin_home_divbuti>";

        echo "<font class=Admin_gerenciamento>Gerenciamento</font>";

        echo "<a href='veiculo_list.php'><button class='Admin_home_buti'>LISTAR VEICULOS</button></a><br>";

        echo "<a href='marca_list.php'><button class='Admin_home_buti'>LISTAR MARCAS</button></a><br>";

        echo "<a href='usuario_list.php'><button class='Admin_home_buti'>LISTAR USUARIO</button></a><br>";

        echo "<a href='deslogar.php'><button class='Admin_home_buti'>Sair</button></a>";

        echo "</div></center>";
        
        echo "</div>";
    ?>
    </body>    
</html>    