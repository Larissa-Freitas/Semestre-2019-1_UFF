
<html>
<head>
    <title> AD1Q3</title>
<body>
<p>TESTE: </p><br>
<?php


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