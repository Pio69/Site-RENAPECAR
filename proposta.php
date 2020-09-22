
<?php
include("pagina.php");
?>
<html>
	<head>
        <meta charset="utf-8"> 
	</head>
	<body>
        <div id=proposta_form_produto>
            <div class=divDentro>
                <center>
                    <p>
                        <div class="letraPropostaTitulo">
                             <font>Mande sua Proposta</font>
                        </div>
                    </p>

                    <p>
                        <div class="letraProposta">
                             <font>Nome</font>
                        </div>
                    </p>

                    <p>
                        <input class=inputProposta name=buscar>
                    </p> 

                    <p>
                       <div class=letraProposta>
                           <font>E-mail</font>
                        </div>
                    </p>

                    <p>
                        <input class=inputProposta type="email" name=buscar>
                    </p>

                    <p>
                        <div class=letraProposta>
                            <font>Telefone</font>
                        </div>
                    </p>

                    <p>
                        <input class=inputProposta name=buscar>
                    </p> 

                    <p>
                        <div class=letraProposta>                       <font>Proposta</font>
                        </div>
                    </p>

                    <p>
                        <textarea class=textAreaProposta></textarea>
                    </p>  
                    <p>
                        <?php
                            $id = (isset($_GET['idVeh']) ? $_GET['idVeh'] : "");

                            if($id == ""){
                                header("location:veiculos.php");    
                            }  

                            echo "<a href='veiculo.php?id=$id'>
                                    <input id=btProposta type=submit name=buscar>
                                </a>"
                        ?>
                    </p>
                </center>
            </div>
        </div>
    </body>
</html>