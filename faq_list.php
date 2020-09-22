<?php
include('pagina.php');
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styleloko.css">
        <style>   
            #faq_produto a:visited {
                color: #0094ff;
            }
            #faq_produto a:link {
                color: #0094ff;   
            } 
        </style>
    </head>
    <body>
        <?php
        include ("conectar.php");
        
        echo "<div id=faq_produto>";

        echo "<div class=div_faq_titulo_per>FAQ</div>";
        echo "<div class=div_faq_dentro>";
        echo "<div class=div_faq_titulo_duv>Duvidas mais frequentes</div>";
        echo "<div class=linha_horizontal_faq></div>";

        $sqlQuery = "select * from faq";

        
        $resultPag = $conn->query($sqlQuery) or die($conn->error);

        while($result = $resultPag->fetch_array()){
                $resultadoRegistro[0]=$result["perguntaPt"];    
                $resultadoRegistro[1]=$result["respostaPt"];
                $resultadoRegistro[2]=$result["idFaq"];    
            
                echo "<a href=faq_duvida.php?questionId=$resultadoRegistro[2]>";
                echo "<p><img id=icon_faq width=15 height=15  src='imagens/faq.png'><font class=pergunta_faq> $resultadoRegistro[0]</font>";
                echo "</p></a>";  
        }
        echo "</div>"; 
        echo"</div>";

        ?>

    </body>
</html>