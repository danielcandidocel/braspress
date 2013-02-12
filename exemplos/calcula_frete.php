<?php

  /**
   * Contém um exemplo de utilização da classe de calculo total de frete da Braspress.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @version 1.0 
   */
  //Ajusta a codificação e o tipo do conteúdo
  header('Content-type: text/txt; charset=utf-8');

  //Importa as classes
  require '../classes/Braspress.php';
  require '../classes/BraspressCalculaFrete.php';
  require '../classes/BraspressCalculaFreteResultado.php';

  try
  {
    //Cria o objeto
    $consulta = new BraspressCalculaFrete(00000000000000);
    $consulta->setIdOrigem(2);
    $consulta->setCepOrigem(89010130);
    $consulta->setCepDestino(88095001);
    $consulta->setDocumentoDestino(00000000000);
    $consulta->setTipoFrete(Braspress::TIPO_FRETE_RODOVIARIO);
    $consulta->setPeso(1500);
    $consulta->setValorNF(123);
    $consulta->setVolume(1);

    if ($consulta->processaConsulta())
    {
      $retorno = $consulta->getResultado();
      //Se teve erro
      if ($retorno->getSucesso())
      {
        //Imprime o resultado
        echo 'Valor total do frete............: ' . number_format($retorno->getTotalFrete(), 2, ',', '.') . PHP_EOL;
        echo 'Percentual de ICMS..............: ' . number_format($retorno->getIcms(), 0, ',', '.') . '%' . PHP_EOL;
        echo 'Valor do ICMS...................: ' . number_format($retorno->getValorIcms(), 2, ',', '.') . PHP_EOL;
        echo 'Valor do frete peso.............: ' . number_format($retorno->getFretePeso(), 2, ',', '.') . PHP_EOL;
        echo 'Valor do frete valor............: ' . number_format($retorno->getFreteValor(), 2, ',', '.') . PHP_EOL;
        echo 'Valor da taxa de seção cadastro.: ' . number_format($retorno->getTaxaSecaoCad(), 2, ',', '.') . PHP_EOL;
        echo 'Valor da taxa de pedágio........: ' . number_format($retorno->getTaxaPedagio(), 2, ',', '.') . PHP_EOL;
        echo 'Valor da taxa de despacho.......: ' . number_format($retorno->getTaxaDespacho(), 2, ',', '.') . PHP_EOL;
        echo 'Valor da taxa de ITR............: ' . number_format($retorno->getTaxaITR(), 2, ',', '.') . PHP_EOL;
        echo 'Valor da taxa de ademe..........: ' . number_format($retorno->getTaxaAdeme(), 2, ',', '.') . PHP_EOL;
        echo 'Valor das outras taxas..........: ' . number_format($retorno->getTaxaOutros(), 2, ',', '.') . PHP_EOL;
        echo 'Valor do subtotal do frete......: ' . number_format($retorno->getSubtotal(), 2, ',', '.') . PHP_EOL;
        echo 'Prazo de entrega................: ' . $retorno->getPrazoEntrega() . PHP_EOL;
      } else
        echo 'Ocorreu um erro. Mensagem: ' . $retorno->getMensagemErro() . PHP_EOL . PHP_EOL;
    } else
      echo 'Ocorreu um erro, tente novamente mais tarde.' . PHP_EOL;
  } catch (Exception $e)
  {
    echo 'Ocorreu um erro ao processar sua solicitação. Erro: ' . $e->getMessage() . PHP_EOL;
  }
?>
