<?php
include('pagina.php');
?>
<html>
    <head>
        <style>
            #login a:visited {
                color: #0094ff;
            }
            #login a:link {
                color: #0094ff;   
            } 
        </style>   
    </head>
    <body> 

        <div class='login_produto'>    

            <div id='login'>
                <font class='login_titulo'>Faça o Login</font>    
                <form action=valida_login.php method=post>

                    <font class=login_letras>Login </font><br>
                    <input class='login_input'   name=login placeholder="Login"><br>
                    <?php
                    if(isset($_GET['erro'])){

                        if($_GET['erro']=="login"){
                            echo "<font class=erro_login>Usuário ou Senha incorretos !</font>";
                        }
                        
                    }
                    ?>    
                    <br>    
                    <font class=login_letras>Senha </font><br>
                    <input class=login_input name=senha type=password placeholder="Senha"><br><br><br>
                    <font class=login_reg>Ainda não é cadastrado ? Clique</font><font class=login_reg> <a href=usuario_form.php >Aqui!</a></font><br><br>
                    <input id='login_enviar' type=submit value=Entrar>

                </form>

            </div>
        </div>
    </body>
</html>  