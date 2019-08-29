<html>
<head>
    <title> AD1Q2</title>
<body>
<p>TESTES:  </p><br>
<?php
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


