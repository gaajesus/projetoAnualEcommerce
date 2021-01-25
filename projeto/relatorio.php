<?php 

    $tipo = $_GET['table'];
  ini_set('display_errors', 1);
  error_reporting(E_ALL); 


require_once("fpdf/fpdf.php");
header('Content-Type: text/html;');
$str = utf8_decode($str);
$str = iconv('UTF-8', 'windows-1252', $str);
                    
$pdf= new FPDF("P","pt","A4");
 
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->Cell(0,5,"Relatorio Vendas",0,1,'L');
$pdf->Ln(8);

$header = array('ID','Cliente', 'Data', 'Preco');
include "conexao.php";
$sql=$sql = "SELECT * FROM carrinho WHERE excluido='FALSE';"; 
$resultado1=pg_query($conecta,$sql);
$afetadas=pg_affected_rows($resultado1);
$linhas=pg_fetch_array($resultado1);


for($i=0;$i<$afetadas;$i++){
    $j=$i+1;
    
    $cod_cli = $linhas['cod_cli'];
    $sql="SELECT nome_cli FROM cliente WHERE cod_cli=$cod_cli AND excluido=FALSE;";
    $resultado2=pg_query($conecta,$sql);
    $linhas1=pg_fetch_array($resultado2);
    
    $data_compra = $linhas['data_compra'];
    
    $preco = $linhas['preco_tot'];
    
    $data1 = $data1.$j.";".$linhas1['nome_cli'].";".$data_compra.";".$preco."\r\n";
    $linhas=pg_fetch_array($resultado1);
    }
echo"\n\n\n\n";
$table1=fopen("table1.txt", "w");
fwrite($table1, $data1);
fclose($table1);

$data = $pdf->LoadData('table1.txt');
$pdf->ImprovedTable($header,$data);

ob_end_clean();
$pdf->Output("Relatorio_venus.pdf","D");
 

?>
