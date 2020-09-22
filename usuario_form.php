<?php
include('pagina.php');
?>
<html>
    <head>
        <style>
            #user_form{
                position: relative;
                top:40;    
            }
        </style>
    </head>
    <body>
        <div class='usuario_form_produto'>
            <?php 
            
            $id = (isset($_GET['id']) ? $_GET['id'] : "");
            
            if(isset($_GET['id'])){
                include ("conectar.php");

                if($_SESSION['idUsuario'] != $id && $_SESSION['tipoUsuario'] != "admin"){
                    header("location:login.php?erro=permissao");
                }
                    
                $sqlQuery = "select * from usuario where usuario.idUser =$id;";

                $resultUser = $conn->query($sqlQuery) or die($conn->error);
                
                while($result = $resultUser->fetch_array()){

                    $resultadoRegistro[0] = $id;
                    $resultadoRegistro[1] = $result["nome"];
                    $resultadoRegistro[2] = $result["login"];
                    $resultadoRegistro[3] = $result["senha"];
                    $resultadoRegistro[4] = $result["tipo"];
                    $resultadoRegistro[6] = $result["cpf"];
                    $resultadoRegistro[7] = $result["dataDeNascimento"];    
                    $resultadoRegistro[8] = $result["endereco"];
                    $resultadoRegistro[9] = $result["cep"];
                    $data= date('d-m-Y', strtotime($resultadoRegistro[7]));    
                }

            }else{
                $resultadoRegistro[0] = "";
                $resultadoRegistro[1] = "";
                $resultadoRegistro[2] = "";
                $resultadoRegistro[3] = "";
                $resultadoRegistro[4] = "";
                $resultadoRegistro[6] = "";
                $resultadoRegistro[7] = "";        
                $resultadoRegistro[8] = ""; 
                $resultadoRegistro[9] = "";
                $resultadoRegistro[10] = "";       
            }

            echo "<div class=div_usuario_form>";

            if(!(isset($_GET['id']))){ 
                echo "<div class=div_form_titulo><font class='usuario_titulo'>Cadastro</font></div>";
            }else{
                echo "<div class=div_form_titulo><font class='usuario_titulo'>Alterar</font></div>";
            }

            if(isset($_SESSION['idUsuario'])){
                if($_SESSION['tipoUsuario'] != "admin" or $id != ""){    
                    echo " <form id=user_form action=usuario_post.php?id=$id method=post >"; 
                } 
                echo "<form id=user_form action=usuario_post.php?id=".$_SESSION['idUsuario']." method=post >";    
            }else{    
                echo "<form id=user_form action=usuario_post.php method=post >";
            }   

            echo "
                    <p>
                    <font class='usuario_form_letras_nome'>Nome</font>



                    </p>
                    <p>
                    <input class='usuario_form_input_nome' name=nome value='$resultadoRegistro[1]' placeholder=Nome></p>
                    ";
            echo "
       <p>

       <font class='usuario_form_letras_endereco'> Endereço</font>

       <font class='usuario_form_letras_cep'>CEP</font>

       </p>

       <p>

       <input class='usuario_form_input_endereco' name=endereco placeholder=Endereço value='$resultadoRegistro[8]'>

       <input class='usuario_form_input_cep' name=cep placeholder=CEP value='$resultadoRegistro[9]' >

       </p>";

            echo "
        <p>

        <font class='usuario_form_letras_login'>Login</font>

        <font class='usuario_form_letras_senha'>Senha</font>

        </p>

        <p>

        <input class='uusuario_form_input_login' name=login placeholder=Login value='$resultadoRegistro[2]'>

        <input class='usuario_form_input_senha' type=password name=senha
        placeholder=Senha value='$resultadoRegistro[3]' >

        </p>";

            if($resultadoRegistro[6] != "" ){
                echo "<p><font class='usuario_form_letras_cpf'>CPF</font></p><p><input class='usuario_form_input_cpf'  readonly name=cpf value=$resultadoRegistro[6]></p>";
            }else{
                echo "
        <p><font class='usuario_form_letras_cpf'>CPF</font></p><p><input class='usuario_form_input_cpf' name=cpf placeholder='Somente números' value='$resultadoRegistro[6]' ></p>";}

            if($resultadoRegistro[7] == ""){

                echo "
        <p><font class='usuario_form_letras_dia'>Dia</font><font class='usuario_form_letras_mes'>Mês</font>
        <font class='usuario_form_letras_ano'>Ano</font></p>";

                echo "<p>
                        <input class='usuario_form_input_dia' name=dia placeholder=Dia >
                        <select class='usuario_form_select_mes' name='mes'>";

                echo "<option value='01'>Janeiro</option>";

                echo "<option value='02'>Fevereiro</option>";

                echo "<option value='03'>Março</option>";

                echo "<option value='04'>Abril</option>";

                echo "<option value='05'>Maio</option>";

                echo "<option value='06'>Junho</option>";

                echo "<option value='07'>Julho</option>";

                echo "<option value='08'>Agosto</option>";

                echo "<option value='09'>Setembro</option>";

                echo "<option value='10'>Outubro</option>";

                echo "<option value='11'>Novembro</option>";

                echo "<option value='12'>Dezembro</option>";

                echo "</select>";

                echo "<input class='usuario_form_input_ano'  name=ano placeholder=Ano >
                     </p>";
            }

            if(isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario']=="admin"){
                echo "<p>
                        <font class='usuario_form_letras_tipo'>
                            Tipo
                        </font>
                    </p>
                    <p>
                        <select class='usuario_form_inputzao' name='tipo'>
                    </p>";
                echo "<option value='admin' ".($resultadoRegistro[4] == "admin" ? "selected" : "").">Admin</option>";
                echo "<option value='usuario' ".($resultadoRegistro[4] == "usuario" ? "selected" : "").">Usuario</option>";
                echo "</select>";
            }
            echo "<p>
                    <input id='usuario_form_enviar'  type=submit value=Enviar>
                </p>
                </form>";
            echo "</div>";
            ?>
        </div>
    </body>

</html>