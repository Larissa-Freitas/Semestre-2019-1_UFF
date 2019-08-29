<html>
<head>
    <title> AD1Q1</title>
<body>
<p>TOTAL DE GASTOS DOS CLIENTES: </p><br>

<?php
/*$cliente[0] = (int)0123; $compras[0] = 14.76;
$cliente[1] = 274;  $compras[1] = 2.75;
$cliente[2] = 0123; $compras[2] = 3.80;
$cliente[3] = 274;  $compras[3] = 20.79;
$cliente[4] = 0012; $compras[4] = 1.00;
$cliente[5] = 0123; $compras[5] = 34.5;  */
/* ABAIXO O VETOR $cliente : A PRINCÍPIO EU DEIXEI OS IDENTIFICADORES EM NÚMEROS INTEIROS, POREM NA HORA DE
EXIBIR OS NÚMEROS NÃO ERAM EXIBIDOS DE FORMA CORRETA E EU NÃO SOUBE COMO CORRIGIR, ACREDITO QUE NÚMEROS INTEIROS NÃO IAM ATRAPALHAR NA HORA
DA COMPARAÇÃO PORÉM EU PRECISAVA VISUALIZAR PARA VER SE ESTAVA FUNCIONANDO CORRETAMENTE, DE QUALQUER FORMA O IDENTIFICADOR DO CLIENTE CONTINUA
SENDO UM NUMERAL, SÓ QUE EM FORMATO STRING*/

$cliente = ["0123","274","0123","274","0012","0123"]; //AQUI EU CRIEI DOIS VETORES PARA REPRESENTAR A LISTA PASSADA COMO PARAMETRO SÓ DE EXEMPLO
$compras = [14.76,2.75,3.80,20.79,1.00,34.5];

function totalGastos ($cliente,$compras) // AQUI A FUNÇÃO PEDIDA NA QUESTÃO 1 DA AD1 2019-2
{
    $temp = ""; // A FUNÇÃO DE TEMP É ARMAZENAR O IDENTIFICADOR DO CLIENTE ANTERIOR, JÁ QUE O LAÇO A CADA ITERAÇÃO VAI ME DAR UM VALOR DIFERENTE, ASSIM EU POSSO COMPARAR
    $acumulado = 0.0; // A VARIAVEL ACUMULADO ARMAZENA O VALOR TOTAL GASTO PELO CLIENTE E DEPOIS É PASSADO PARA O VETOR TOTALCOMPRAS
    $contador = 0; // ESSE CONTADOR SERVE SOMENTE PARA QUE NÃO HAVA COMPARAÇÃO ENTRE TEMP=NULL E VALOR=IDENTIFICADOR DO CLIENTE.

    asort($cliente); /* AQUI EU ORDENEI A LISTA DE IDENTIDICADORES DE CLIENTES ASSIM EU POSSO PERCORRER A LISTA DE FORMA QUE
    AS COMPRAS DO MESMO CLIENTE ESTEJAM LOCALIZADAS UMA DEPOIS DA OUTRA PRA FACILITAR NA UTILIZAÇÃO DO LAÇO FOREACH */

    foreach ($cliente as $id => $valor) {
        //echo $valor . ",".$id."<br>";
        if ($valor==$temp) //A CADA ITERAÇÃO O LAÇO CONDICIONAL VERIFICA SE O VALOR ANTERIOR É IGUAL AO ATUAL, AQUI A FACILIDADE DE SE ESTAR ORDENADO O VETOR CLIENTE.
        {
            $acumulado += $compras[$id]; // JÁ QUE O CLIENTE E A COMPRA TEM O MESMO INDICE EU POSSO UTILIZAR O INDICE DE CLIENTE PARA ARMAZENAR O VALOR DE COMPRA.
            $totalcompras[$temp] = $acumulado;

        }
        elseif ($contador == 1)
        {

            $totalcompras[$temp] = $acumulado;
            $acumulado = 0.0;
            $acumulado += $compras[$id];
            $temp = $valor;



        } else
            {
                  $acumulado += $compras[$id];
                  $temp = $valor;
                  $contador++;
             }

    }
    return $totalcompras;

}
$testefuncao = totalGastos($cliente,$compras); // AQUI APENAS UM TESTE PARA VER SE A FUNÇÃO ESTÁ COMO PEDIDO!
echo print_r($testefuncao)."<br>";



?>

</body>
