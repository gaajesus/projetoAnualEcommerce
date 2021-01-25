<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Cadastro produtos</title>
</head>
<body>
    <?php
        include "conexao.php";
        $nome = $_POST['nome_prod'];
        $categoria = $_POST['categoria'];
        $preco = (float)$_POST['preco'];
        $desconto = $_POST['desconto'];
        $estoque = $_POST['estoque'];
        $imagem = $_POST['imagem'];
        $excluido = 'FALSE';
        $in_diretorio = "imagens/catalogo/";
        $IsUpOK = 1;
        $sql="insert into produto
            values(DEFAULT,
            '$nome',
            $categoria,
            $preco,
            '$excluido',
            '$imagem',
            $desconto,
            $estoque);";
        $resultado=pg_query($conecta,$sql);
        $qtde=pg_affected_rows($resultado);
        if($qtde > 0)
        {
            $sql="select MAX(cod_prod) as cod from produto where excluido != 'TRUE';";
            $result=pg_query($conecta,$sql);
            $linha = pg_fetch_array($result);
        }
        else
        {
            echo "<script type='text/javascript'>alert('IMAGEM SEM TAMANHO!!!')</script>";
             $sql="DELETE from produtos where cod_prod = $id;";
                    $resultado=pg_query($conecta,$sql);
                    $qtde=pg_affected_rows($resultado);
                    if($qtde>0)
                    {
                        echo "<script type='text/javascript'>alert('Erro!!!')</script>";
                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=produtos.php'>";
                    }
            header("Location: cadproduto.php?erro=1");
            exit;
        }
        if(isset($_FILES['imagem']))
        {
            //imagem
            $path_parts = pathinfo($_FILES['imagem']['name']);
            $dir = $in_diretorio . $linha['cod'] . "." . $path_parts['extension'];
            $check = getimagesize($_FILES['imagem']['tmp_name']);
            if(!$check){
                
                $id = $linha['cod']; 
                $sql="DELETE from produto where cod_prod = $id;";
                //echo $sql;
                    $resultado=pg_query($conecta,$sql);
                    $qtde=pg_affected_rows($resultado);
                    if($qtde>0)
                    {
                        echo "<script type='text/javascript'>alert('Erro!!!')</script>";
                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=produtos.php'>";
                    }
                
                
                echo "<script type='text/javascript'>alert('IMAGEM SEM TAMANHO!!!')</script>";
                header("Location: cadproduto.php?erro=1");
                exit;
                $IsUpOK = 0;
            }
            if(file_exists($dir))
            {
                //header("Location: cadproduto.php?erro=1");
                exit;
                echo "<script type='text/javascript'>alert('Arquivo já existe!!!')</script>";
                $IsUpOK = 0;
            }
            if($IsUpOK == 0)
            {
                header("Location: cadproduto.php?erro=1");
                exit;
                echo "<script type='text/javascript'>alert('Erro na gravação!!!')</script>";
            }
            else
            {
                $cod = $linha['cod'];
                $tmp_name = $_FILES['imagem']['tmp_name'];
                if(move_uploaded_file($tmp_name, $dir))
                {
                    $sql="UPDATE produto SET imagem = '$dir' WHERE cod_prod = $cod ";
                    $resultado=pg_query($conecta,$sql);
                    $qtde=pg_affected_rows($resultado);
                    if($qtde>0)
                    {
                        echo "<script type='text/javascript'>alert('Produto Gravado!!!')</script>";
                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=produtos.php'>";
                    }
                }else
                {
                    $id = $linha['cod'];
                    $sql="DELETE from produto where cod_prod = $id;";
                    $resultado=pg_query($conecta,$sql);
                    $qtde=pg_affected_rows($resultado);
                    if($qtde>0)
                    {
                        echo "<script type='text/javascript'>alert('Erro!!!')</script>";
                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=produtos.php'>";
                    }
                    echo $sql;
                    header("Location: cadproduto.php?erro=1");
                    exit;
                }
            }
            pg_close($conecta);
        }
    /*  if ($linhas > 0)
        {
                require("produtos.php");
            ?>
            <script>
            alert("Produto cadastrado com sucesso!!");
        </script>
    <?php
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=produtos.php'>";
        }
        else
            echo "<script type='text/javascript'>alert('DEU RUIM !!!')</script>";
            pg_close($conecta);*/
    ?>
 </body>
