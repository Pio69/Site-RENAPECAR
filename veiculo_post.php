<?php
    session_start();	
    include ("conectar.php");

    if(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] != "admin"){
        header("location:login.php?erro=permissao");
    }

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $ano = $_POST['ano'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $kilometracao = $_POST['kilometracao'];
    $foto = $_FILES['foto'];

    $id = (isset($_GET['id']) ? $_GET['id'] : "");

    $insert = 0;

    if(isset($id) && $id != ""){
        $sqlQuery = "update carro set nome='$nome', preco=$preco, marca_idMarca='$marca',ano='$ano', modelo='$modelo' , kilometracao='$kilometracao' where idCarro=$id";
           echo $sqlQuery;
    }else{
        $sqlQuery ="insert into carro(nome,preco,ano,marca_idMarca,modelo,kilometracao) values('$nome',$preco,'$ano','$marca','$modelo',$kilometracao)";
        $insert = 1;

        echo $sqlQuery;
    }

    $exec = mysqli_query($conn, $sqlQuery);

    //se tiver imagem 
        if (!empty($foto["name"])) {
            //valida tipo da imagem
            if( !preg_match( '/^image\/(jpeg|jpg|png|gif|bmp|svg)$/' , $foto[ 'type' ] ) ){
                echo "IMAGEM INVÁLIDA"; //header mensagem de erro
            }else{
                //tira a extensão da imagem
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
                //grava no banco (sem imagem)
                //mysql_query($sqlQuery); //executar a query lá de cima
                //pega o ultimo id inserido (caso necessário)
                $id = ($id != "" ? $id : mysqli_insert_id ($conn));
                //concatena id do usuario no nome da imagem + extensão
                $nome_imagem = $id." - veiculo.";
                $nome_imagem_delete = $nome_imagem."*";
                $nome_imagem = $nome_imagem .  $ext[1];
                //query pra gravar a imagem
                $query = "update carro set foto='$nome_imagem' where idCarro=$id";
                //grava a imagem no banco
                mysqli_query($conn, $query);
                //especificação do caminho da imagem
                $caminho_imagem = "imgs/carros/" . $nome_imagem;
                $caminho_imagem_delete = "imgs/carros/" . $nome_imagem_delete;
                //valida se já existe imagem
                if (file_exists($nome_imagem_delete)) {
                    //deleta a imagem
                    unlink(glob($nome_imagem_delete));
                }
                //move nova imagem para o caminho
                move_uploaded_file($foto["tmp_name"], $caminho_imagem);
            }
        }

    if($insert == 1){
        header("location:descricao_form.php?idVeh=$id");  
    }else{
        header("location:veiculo_list.php");
    }
?>