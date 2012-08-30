<?php

  /**
   * Classe que irá conter o resultado do cálculo de frete monstrando todos 
   * os detalhes do cálculo.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @version 1.0
   * @final
   */
  final class BraspressCalculaFreteResultado
  {

    /**
     * Contém o valor total do frete.
     * @var double
     */
    private $totalFrete;

    /**
     * Contém o percentual de ICMS do frete.
     * @var double
     */
    private $icms;

    /**
     * Contém o valor do ICMS do frete.
     * @var double
     */
    private $valorIcms;

    /**
     * Contém o valor do frete por peso.
     * @var double
     */
    private $fretePeso;

    /**
     * Contém o valor do frete por valor.
     * @var double
     */
    private $freteValor;

    /**
     * Contém a taxa de cadastro da seção.
     * @var double
     */
    private $taxaSecaoCad;

    /**
     * Contém a taxa de pedágio.
     * @var double
     */
    private $taxaPedagio;

    /**
     * Contém a taxa de despacho.
     * @var double
     */
    private $taxaDespacho;

    /**
     * Contém a taxa de ITR.
     * @var double
     */
    private $taxaITR;

    /**
     * Contém outras taxas.
     * @var double
     */
    private $taxaOutros;

    /**
     * Contém a taxa de ademe.
     * @var double
     */
    private $taxaAdeme;

    /**
     * Contém o valor do subtotal do frete.
     * @var double
     */
    private $subtotal;

    /**
     * Contém a mensagem de erro, caso tenha havido
     * @var string
     */
    private $mensagemErro;

    /**
     * Contém o prazo de entrega do frete.
     * @var double
     */
    private $prazoEntrega;

    /**
     * Indica se a consulta foi realizada com sucesso.
     * @var boolean
     */
    private $sucesso;

    /**
     * Cria um objeto de resultado.
     * @param stdClass $retorno Retorno da Braspress.
     */
    public function __construct(stdClass $retorno)
    {
      $this->setTotalFrete(isset($retorno->TOTALFRETE) ? $retorno->TOTALFRETE : 0);
      $this->setIcms(isset($retorno->ICMS) ? $retorno->ICMS : 0);
      $this->setValorIcms(isset($retorno->VALORICMS) ? $retorno->VALORICMS : 0);
      $this->setFretePeso(isset($retorno->FRETEPESO) ? $retorno->FRETEPESO : 0);
      $this->setFreteValor(isset($retorno->FRETEVALOR) ? $retorno->FRETEVALOR : 0);
      $this->setTaxaSecaoCad(isset($retorno->TXSECCAD) ? $retorno->TXSECCAD : 0);
      $this->setTaxaPedagio(isset($retorno->TXPEDAGIO) ? $retorno->TXPEDAGIO : 0);
      $this->setTaxaDespacho(isset($retorno->TXDESPACHO) ? $retorno->TXDESPACHO : 0);
      $this->setTaxaITR(isset($retorno->TXITR) ? $retorno->TXITR : 0);
      $this->setTaxaOutros(isset($retorno->TXOUTROS) ? $retorno->TXOUTROS : 0);
      $this->setTaxaAdeme(isset($retorno->TXADEME) ? $retorno->TXADEME : 0);
      $this->setSubtotal(isset($retorno->SUBTOTAL) ? $retorno->SUBTOTAL : 0);
      $this->setPrazoEntrega(isset($retorno->PRAZOENTREGA) ? $retorno->PRAZOENTREGA : 0);
      $mensagemErro = trim(isset($retorno->MSGERRO) ? $retorno->MSGERRO : '');
      $this->setMensagemErro(($mensagemErro == 'OK') ? '' : $mensagemErro);
      $this->setSucesso($mensagemErro == 'OK');
    }

    /**
     * Informa o valor total do frete.
     * @param double $totalFrete Valor total do frete.
     */
    private function setTotalFrete($totalFrete)
    {
      $this->totalFrete = (double) $totalFrete;
    }

    /**
     * Informa o percentual de ICMS do frete.
     * @param double $icms Percentual de ICMS
     */
    private function setIcms($icms)
    {
      $this->icms = (double) $icms;
    }

    /**
     * Informa o valor do ICMS do frete.
     * @param double $valorIcms Valor do ICMS do frete.
     */
    private function setValorIcms($valorIcms)
    {
      $this->valorIcms = (double) $valorIcms;
    }

    /**
     * Informa o valor do frete por peso.
     * @param double $fretePeso Valor do frete por peso.
     */
    private function setFretePeso($fretePeso)
    {
      $this->fretePeso = (double) $fretePeso;
    }

    /**
     * Informa o valor do frete por valor.
     * @param double $freteValor Valor do frete por valor.
     */
    private function setFreteValor($freteValor)
    {
      $this->freteValor = (double) $freteValor;
    }

    /**
     * Informa o valor da taxa da seção cadastro.
     * @param double $taxaSecaoCad Taxa da seção cadastro.
     */
    private function setTaxaSecaoCad($taxaSecaoCad)
    {
      $this->taxaSecaoCad = (double) $taxaSecaoCad;
    }

    /**
     * Informa o valor da taxa de pedágio.
     * @param double $taxaPedagio Taxa de pedágio.
     */
    private function setTaxaPedagio($taxaPedagio)
    {
      $this->taxaPedagio = (double) $taxaPedagio;
    }

    /**
     * Informa o valor da taxa de despacho.
     * @param double $taxaDespacho Taxa de despacho.
     */
    private function setTaxaDespacho($taxaDespacho)
    {
      $this->taxaDespacho = (double) $taxaDespacho;
    }

    /**
     * Informa o valor da taxa de ITR.
     * @param double $taxaITR Taxa de ITR.
     */
    private function setTaxaITR($taxaITR)
    {
      $this->taxaITR = (double) $taxaITR;
    }

    /**
     * Informa o valor das outras taxas.
     * @param double $taxaOutros Outras taxas.
     */
    private function setTaxaOutros($taxaOutros)
    {
      $this->taxaOutros = (double) $taxaOutros;
    }

    /**
     * Informa o valor da taxa de ademe.
     * @param double $taxaAdeme Taxa de ademe.
     */
    private function setTaxaAdeme($taxaAdeme)
    {
      $this->taxaAdeme = (double) $taxaAdeme;
    }

    /**
     * Informa o valor do subtotal do frete.
     * @param double $subtotal Valor do subtotal do frete.
     */
    private function setSubtotal($subtotal)
    {
      $this->subtotal = (double) $subtotal;
    }

    /**
     * Informa a mensagem de erro, caso tenha havido erro.
     * @param string $mensagemErro Mensagem de erro, caso tenha havido erro.
     */
    private function setMensagemErro($mensagemErro)
    {
      $this->mensagemErro = (string) $mensagemErro;
    }

    /**
     * Informa o prazo de entrega do frete.
     * @param double $prazoEntrega Prazo de entrega do frete.
     */
    private function setPrazoEntrega($prazoEntrega)
    {
      $this->prazoEntrega = (double) $prazoEntrega;
    }

    /**
     * Indica se a consulta foi concluída com sucesso.
     * @param boolean $sucesso Indica se a consulta foi concluída com sucesso.
     */
    private function setSucesso($sucesso)
    {
      $this->sucesso = (boolean) $sucesso;
    }

    /**
     * Retorna o valor total do frete.
     * @return double
     */
    public function getTotalFrete()
    {
      return $this->totalFrete;
    }

    /**
     * Retorna o percentual de ICMS.
     * @return double
     */
    public function getIcms()
    {
      return $this->icms;
    }

    /**
     * Retorna o valor do ICMS.
     * @return double
     */
    public function getValorIcms()
    {
      return $this->valorIcms;
    }

    /**
     * Retorna o valor do frete por peso.
     * @return double
     */
    public function getFretePeso()
    {
      return $this->fretePeso;
    }

    /**
     * Retorna o valor do frete por valor.
     * @return double
     */
    public function getFreteValor()
    {
      return $this->freteValor;
    }

    /**
     * Retorna o valor da taxa de seção cadastro.
     * @return double
     */
    public function getTaxaSecaoCad()
    {
      return $this->taxaSecaoCad;
    }

    /**
     * Retorna o valor da taxa de pedágio.
     * @return double
     */
    public function getTaxaPedagio()
    {
      return $this->taxaPedagio;
    }

    /**
     * Retorna o valor da taxa de despacho.
     * @return double
     */
    public function getTaxaDespacho()
    {
      return $this->taxaDespacho;
    }

    /**
     * Retorna o valor da taxa de ITR.
     * @return double
     */
    public function getTaxaITR()
    {
      return $this->taxaITR;
    }

    /**
     * Retorna o valor das outras taxas.
     * @return double
     */
    public function getTaxaOutros()
    {
      return $this->taxaOutros;
    }

    /**
     * Retorna o valor da taxa de ademe.
     * @return double
     */
    public function getTaxaAdeme()
    {
      return $this->taxaAdeme;
    }

    /**
     * Retorna o valor do subtotal do frete.
     * @return double
     */
    public function getSubtotal()
    {
      return $this->subtotal;
    }

    /**
     * Retorna a mensagem de erro, caso tenha havido erro.
     * @return string
     */
    public function getMensagemErro()
    {
      return $this->mensagemErro;
    }

    /**
     * Retorna o prazo de entrega do frete.
     * @return double
     */
    public function getPrazoEntrega()
    {
      return $this->prazoEntrega;
    }

    /**
     * Indica se a consulta foi concluída com sucesso.
     * @return boolean
     */
    public function getSucesso()
    {
      return $this->sucesso;
    }

  }

?>
