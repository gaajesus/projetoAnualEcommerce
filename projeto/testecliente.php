<?php
    include "conexao.php";
    $sql = "SELECT * FROM cliente WHERE excluido=false"; 
    $exec = pg_query($conecta,$sql);
    $numrows = pg_affected_rows($exec);
    
    if($numrows > 0){
        for($i=0; $i<$numrows; $i++){
            $row = pg_fetch_array($exec);
            echo "<br>".$row['cod_cli'];
            echo $row['email_cli'];
            echo $row['nome_cli'];
        }
    }
?>
