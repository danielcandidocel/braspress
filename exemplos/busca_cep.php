<?php

  /**
   * Contém um exemplo de utilização da classe de consulta de CEP da Braspress.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @version 1.0 
   */
  //Ajusta a codificação e o tipo do conteúdo
  header('Content-type: text/txt; charset=utf-8');

  //Importa as classes
  require '../classes/Braspress.php';
  require '../classes/BraspressCep.php';
  require '../classes/BraspressCepResultado.php';

  try
  {
    //Cria o objeto
    $consulta = new BraspressCep(00000000000000);
    $consulta->setCep('89050100');
    if ($consulta->processaConsulta())
    {
      $retorno = $consulta->getResultado();
      //Se teve erro
      if ($retorno->getSucesso())
      {
        //Imprime o resultado
        echo 'Logradouro....: ' . $retorno->getLogradouro() . PHP_EOL;
        echo 'Bairro........: ' . $retorno->getBairro() . PHP_EOL;
        echo 'Cidade........: ' . $retorno->getCidade() . PHP_EOL;
        echo 'UF............: ' . $retorno->getUf() . PHP_EOL;
      } else
        echo 'Ocorreu um erro. Mensagem: ' . $retorno->getMensagemErro() . PHP_EOL . PHP_EOL;
    } else
      echo 'Ocorreu um erro, tente novamente mais tarde.' . PHP_EOL;
  } catch (Exception $e)
  {
    echo 'Ocorreu um erro ao processar sua solicitação. Erro: ' . $e->getMessage() . PHP_EOL;
  }
?>
