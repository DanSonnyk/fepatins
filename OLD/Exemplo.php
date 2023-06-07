<?php

  include_once 'class.Validacao.php';
  $validacao = new Validacao();

  // Valores válidos
  $cpf  = '11144477735';
  $cnpj = '42252848000158';
  
  echo '<br />Valores válidos<br />';
  echo $cpf . '<br />';
  echo $cnpj . '<br />';
  echo '----------------------<br />';
  
  if($validacao->validaCPF($cpf))
    echo 'CPF OK<br />';
  else
  {
    echo 'CPF ERROR<br />';
    echo $validacao->erroCPF . '<br />';
  }

  if($validacao->validaCNPJ($cnpj))
    echo 'CNPJ OK<br />';
  else
  {
    echo 'CNPJ ERROR<br />';
    echo $validacao->erroCNPJ . '<br />';
  }
  
  
  // Valores inválidos
  $cpf  = '01234567890';
  $cnpj = '42252848000000';
  
  echo '<br />Valores inválidos<br />';
  echo $cpf . '<br />';
  echo $cnpj . '<br />';
  echo '----------------------<br />';

  if($validacao->validaCPF($cpf))
    echo 'CPF OK<br />';
  else
  {
    echo 'CPF ERROR<br />';
    echo $validacao->erroCPF . '<br />';
  }

  if($validacao->validaCNPJ($cnpj))
    echo 'CNPJ OK<br />';
  else
  {
    echo 'CNPJ ERROR<br />';
    echo $validacao->erroCNPJ . '<br />';
  }

?>
