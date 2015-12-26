<?php

  /**
   * Classe para realizar a consulta de prazo de entrega através de dois ceps.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @package braspress
   * @version 1.0
   * @final
   */
  final class BraspressPrazoEntrega extends Braspress
  {

    /**
     * Contém o CEP de origem.
     * @var double
     * @access private
     */
    private $cepOrigem;

    /**
     * Contém o CEP de destino.
     * @var double
     * @access private
     */
    private $cepDestino;

    /**
     * Contém o resultado da consulta.
     * @var BraspressPrazoEntregaResultado
     * @access private
     */
    private $resultado;

    /**
     * Informa o CEP de origem para a pesquisa.
     * @param double $cepOrigem CEP de origem.
     * @access public
     * @throws Exception
     */
    public function setCepOrigem($cepOrigem)
    {
      if (strlen(trim($cepOrigem)) == 8)
        $this->cepOrigem = $cepOrigem;
      else
        throw new Exception('CEP de origem inválido.');
    }

    /**
     * Informa o CEP de destino para a pesquisa.
     * @param double $cepDestino CEP de destino.
     * @access public
     * @throws Exception
     */
    public function setCepDestino($cepDestino)
    {
      if (strlen(trim($cepDestino)) == 8)
        $this->cepDestino = $cepDestino;
      else
        throw new Exception('CEP de destino inválido.');
    }

    /**
     * Processa a consulta e retorna VERDADEIRO se foi concluída com sucesso.
     * @return boolean
     * @access public
     */
    public function processaConsulta()
    {
      //Ativa o uso de URL FOpen
      ini_set("allow_url_fopen", 1);
      ini_set("soap.wsdl_cache_enabled", 0);
      //Inicia transação junto a Braspag
      try
      {
        //Verifica se o sistema está online
        if (@fopen(parent::URL_CALCULADOR, 'r'))
        {
          $soap = new SoapClient(parent::URL_CALCULADOR);
          $retorno = $soap->ConsultaPrazoEntrega((double) $this->cepOrigem, (double) $this->cepDestino, (double) $this->getCnpjEmpresa());
          $resultado = array(
            'prazo' => $retorno,
            'sucesso' => TRUE,
            'mensagem' => '',
          );
          $servico = new BraspressPrazoEntregaResultado($resultado);
          $this->resultado = $servico;
        } else
          return FALSE;
      } catch (SoapFault $sf)
      {
        $resultado = array(
          'prazo' => 0,
          'sucesso' => FALSE,
          'mensagem' => $sf->getMessage(),
        );
        $servico = new BraspressPrazoEntregaResultado($resultado);
        $this->resultado = $servico;
      }
      return TRUE;
    }

    /**
     * Retorna o resultado da consulta.
     * @return BraspressPrazoEntregaResultado
     * @access public
     */
    public function getResultado()
    {
      return $this->resultado;
    }

  }

?>
