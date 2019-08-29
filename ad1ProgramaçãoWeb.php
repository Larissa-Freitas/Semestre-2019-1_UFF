Larissa Freitas da Silva -

<html>
<head>
    <title> AD1Q1</title>
<body>
<p>TOTAL DE GASTOS DOS CLIENTES: </p><br>

<?php



/*
Suponha que você tenha sido encarregado de escrever uma função
que calcule, para cada cliente, quanto foi seu gasto total no mês. A função recebe
como parâmetro a lista das compras realizadas no mês por todos os clientes do
supermercado. Essa lista é representada por dois parâmetros: um vetor com os
identificadores dos clientes (cada cliente tem um identificador numérico único) que
realizaram cada compra e outro com os valores de cada compra. Assim, para obter os
dados da ​i-ésima compra, a função deve consultar a ​i-ésima posição do primeiro vetor
para descobrir o cliente que fez a compra e a ​i-ésima posição do segundo vetor para
descobrir o valor da compra.
Nestas condições, a função deve retornar um novo vetor indexado pelo identificador
dos clientes em que cada posição contenha a soma de todas as compras realizadas
por aquele cliente no mês. Escreva essa função em PHP.

*/
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



<html>
<head>
    <title> AD1Q2</title>
<body>
<p>TESTES:  </p><br>
<?php
/*
​Suponha agora que você seja encarregado de desenvolver algumas
funções relacionadas à parte de cadastro de novos clientes. Em particular, você deve
desenvolver uma função que teste se o CPF provido pelo usuário é válido. Você recebe
instruções para que essa verificação seja feita em três partes:
1. Uma função que verifique se o formato (isto é, quantidade de algarismos e
caracteres separadores) do CPF está correta.
2. Uma função que remova qualquer separador de um CPF com formato válido, se
esse existir (isto é, a função deverá remover quaisquer caracteres do CPF que
não sejam algarismos decimais).
3. Uma função que faça a validação dos dígitos verificadores do CPF.
Nestas condições, pede-se:
a) (1,0 ponto) ​Escreva em PHP a função de verificação de formato ​usando
expressões regulares​. Um CPF tem formato válido se for da forma
DDD.DDD.DDD-DD ou DDDDDDDDDDD, onde cada ‘D’ denota um algarismo
decimal. Sua função deverá receber o CPF na forma de uma string e retornar 1,
caso o formato esteja correto ou 0 caso contrário.
b) (1,0 ponto) ​Escreva em PHP uma função que receba um CPF na forma de uma
string e remova os pontos e traço (se houver), retornando uma nova string
composta apenas pelos números.
c) (1,5 pontos) ​Escreva em PHP uma função que verifique se os dígitos
verificadores de um CPF (recebido na forma de uma string contendo apenas os
números) estão corretos. Os dígitos verificadores de um CPF são os dois últimos
e são calculados da seguinte forma:
Primeiro dígito verificador:
1. Pegue os 9 primeiros dígitos do CPF e multiplique cada um por pesos
decrescentes, começando do 10 (ou seja, o primeiro dígito do CPF será
multiplicado por 10, o segundo por 9 e assim sucessivamente).
2. Some os resultados das multiplicações do passo anterior.
3. Faça a divisão inteira dessa soma por 11, e guarde o resto.
4. Se o resto da divisão for:
a. Menor que 2, então o primeiro dígito verificador é 0.
b. Maior ou igual 2, então o primeiro dígito verificador é ​(11 - resto)​.
Segundo dígito verificador:
5. Pegue os 10 primeiros dígitos do CPF (incluindo o primeiro dígito verificador) e
multiplique cada um por pesos decrescentes, começando do 11 (ou seja, o
primeiro dígito do CPF será multiplicado por 11, o segundo por 10 e assim
sucessivamente).6. Some os resultados das multiplicações do passo anterior.
7. Faça a divisão inteira dessa soma por 11, e guarde o resto.
8. Se o resto da divisão for:
a. Menor que 2, então o segundo dígito verificador é 0.
b. Maior ou igual 2, então o segundo dígito verificador é ​(11 - resto)​.

*/
//ABAIXO CPF'S PARA TESTES QUE ESTÃO AO FINAL DO CÓDIGO
$cpf = "161.141.217-08";
$cpf2 = "16114121708";
$cpf3 = "167";

//------------------------------------------------------
function verificaFormato ($cpf) //QUESTÃO 2 LETRA A:
{

    if (( preg_match("/^[0-9]{3}(\.[0-9]{3})(\.[0-9]{3})(\-[0-9]{2})?$/",$cpf)) == 1)
    {
        return 1;

    }elseif ( preg_match("/^[0-9]{11}?$/",$cpf) == 1)
    {
        return 1;
    }else{
        return 0;
    }

}

function removePontos($cpf) //QUESTÃO 2 LETRA B:
{
    $num = "";
    for ($i=0;$i<strlen($cpf);$i++)
    {
        if (($cpf[$i] != ".") && ($cpf[$i] != "-"))
        {
            $num.=$cpf[$i];
        }
    }
    return $num;
}

function verificaDigitos($cpf)//QUESTÃO 2 LETRA C:
{
    $primDigit = intval($cpf[9],10);
    $segDigit = intval($cpf[10],10);
    $soma=0;
    $cont=0;
    $cont1=0;

    $soma = (((int)$cpf[0]*10)+((int)$cpf[1]*9)+((int)$cpf[2]*8)+((int)$cpf[3]*7)+((int)$cpf[4]*6)+((int)$cpf[5]*5)+((int)$cpf[6]*4)+((int)$cpf[7]*3)+((int)$cpf[8]*2));

    $resto = $soma % 11;

    if ($resto < 2)
    {
        if ($primDigit == 0);
        $cont++;
    }elseif ($resto >= 2)
    {
        if ($primDigit == (11-$resto))
        {
            $cont++;
        }
    }

    $soma = (((int)$cpf[0]*11)+((int)$cpf[1]*10)+((int)$cpf[2]*9)+((int)$cpf[3]*8)+((int)$cpf[4]*7)+((int)$cpf[5]*6)+((int)$cpf[6]*5)+((int)$cpf[7]*4)+((int)$cpf[8]*3)+((int)$cpf[9]*2));
    $resto = $soma % 11;

    if ($resto < 2)
    {
        if ($segDigit == 0);
        $cont1++;
    }elseif ($resto >= 2)
    {
        if ($segDigit == (11-$resto))
        {
            $cont1++;
        }
    }

    if ($cont == 1 && $cont1 == 1)
    {
        return true;

    }else{
        return false;
    }

}



//---------ABAIXO EXEMPLOS PARA TESTES DAS FUNÇÕES---------------------
$numero1 = verificaDigitos($cpf2);
if ($numero1)
{
    echo "verdadeiro <br>";
}else{
    echo "falso<br>";
}

//-----------------------------------------------------------------------

$numero = removePontos($cpf);
echo $numero."<br>";

//-------------------------------------------------------------------------

$result = verificaFormato($cpf);
$result2 = verificaFormato($cpf3);
$result3 = verificaFormato($cpf2);
echo $result."<br>";
echo $result2."<br>";
echo $result3."<br>";



?>

</body>



<html>
<head>
    <title> AD1Q3</title>
<body>
<p>TESTE: </p><br>
<?php

/*
Considere agora a parte do sistema que diz respeito ao controle de
estoque. Suponha que você seja encarregado de criar uma classe em PHP que modele
o estoque. Sua classe deverá armazenar um conjunto de produtos presentes no
estoque e sua quantidade. Sua classe deverá ainda fornecer métodos para a adição de
novos produtos ao estoque e para a remoção de produtos do estoque (por exemplo,
para o caso de uma venda).
Além disso, cada produto por sua vez deve ser representado por uma segunda classe
Produto​. São informações necessárias uma descrição textual, um tipo (considere os
tipos: bebida, alimento perecível, alimento não perecível e produtos de limpeza), um
prazo de validade (em número de dias) e um valor unitário. A classe deverá prover
métodos para a mudança do valor unitário.
Implemente ambas as classes em PHP.

*/


class Estoque
{
    var $produtos;
    var $quantidade;
    var $cont;

    function Estoque()
    {
        $this->cont = 0;
    }

    function addProduto($produto,$qtd)
    {
        $this->produtos[$this->cont] = $produto;
        $this->quantidade[$this->cont] = $qtd;
        $this->cont++;
    }

    function removerProduto($produto)
    {
        foreach ($this->produtos as $ref => $prod)
        {
            if ($produto == $prod)
            {
                unset($this->produtos[$ref]);
                unset($this->quantidade[$ref]);
                $this->cont--;
            }
        }
    }


}

class Produto
{
    var $descricao;
    var $tipo;
    var $validade;
    var $valorUn;

    function Produto ($des,$t,$val,$vun)
    {
        $this->descricao = $des;
        $this->tipo = $t;
        $this->validade = $val;
        $this->valorUn = $vun;
    }

    function alterarValor($valor)
    {
        $this->valorUn = $valor;
    }
}
//----------ABAIXO TESTANDO AS CLASSES-----------------------

$refrigerante = new Produto("coca-cola original","bebida",365,3.80);
$maca = new Produto("fruta","alimento perecível",5,0.3);
$desinfetante = new Produto("limpar casa","produtos de limpeza",365,2.00);



$est = new Estoque();
$est->addProduto($refrigerante,12);
$est->addProduto($maca,10);
$est->addProduto($desinfetante,50);

echo print_r($est->produtos)."<br>";
echo print_r($est->quantidade)."<br>";

$est->removerProduto($maca);
$desinfetante->alterarValor(100.00);

echo print_r($est->produtos)."<br>";
echo print_r($est->quantidade)."<br>";
?>

</body>
