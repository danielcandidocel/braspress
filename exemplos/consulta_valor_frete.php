<?php

  /**
   * Contém um exemplo de utilização da classe de valor total do frete da Braspress.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @version 1.0 
   */
  //Ajusta a codificação e o tipo do conteúdo
  header('Content-type: text/txt; charset=utf-8');

  //Importa as classes
  require '../classes/Braspress.php';
  require '../classes/BraspressValorFreteTotal.php';
  require '../classes/BraspressValorFreteTotalResultado.php';

  try
  {
    //Cria o objeto
    $consulta = new BraspressValorFreteTotal(83008425000174);
    $consulta->setIdOrigem(2);
    $consulta->setCepOrigem(89010130);
    $consulta->setCepDestino(88095001);
    $consulta->setDocumentoDestino(02632783950);
    $consulta->setTipoFrete(Braspress::TIPO_FRETE_RODOVIARIO);
    $consulta->setPeso(1500);
    $consulta->setValorNF(123);
    $consulta->setVolume(1);

    if ($consulta->processaConsulta())
    {
      $retorno = $consulta->getResultado();
      if ($retorno->getSucesso())
        echo 'Valor..: ' . number_format($retorno->getValorFrete(), 2, ',', '.') . PHP_EOL;
      else
        echo 'Ocorreu um erro. Mensagem: ' . $retorno->getMensagemErro() . PHP_EOL . PHP_EOL;
    } else
      echo 'Ocorreu um erro, tente novamente mais tarde.' . PHP_EOL;
  } catch (Exception $e)
  {
    echo 'Ocorreu um erro ao processar sua solicitação. Erro: ' . $e->getMessage() . PHP_EOL;
  }
?>
