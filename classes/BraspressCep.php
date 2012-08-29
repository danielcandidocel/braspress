<?php

  /**
   * Classe para realizar a consulta de CEP através da Braspress.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @version 1.0
   * @final
   */
  final class BraspressCep extends Braspress
  {

    /**
     * Contém o CEP para a consulta de endereço.
     * @var string
     */
    private $cep;

    /**
     * Contém o resultado da consulta quando processada com sucesso.
     * @var BraspressCepResultado 
     */
    private $resultado;

    /**
     * Atribui o CEP para a consulta de endereço.
     * @param string $cep CEP para a consulta de endereço.
     * @throws Exception
     */
    public function setCep($cep)
    {
      if (strlen(trim($cep)) == 8)
        $this->cep = $cep;
      else
        throw new Exception('CEP inválido.');
    }

    /**
     * Processa a consulta e armazena o resultado.
     * 
     * @return boolean
     * @throws Exception 
     */
    public function processaConsulta()
    {
      //Ativa o uso de URL FOpen
      ini_set("allow_url_fopen", 1);
      ini_set("soap.wsdl_cache_enabled", 0);
      //Inicia transação junto a Braspag
      try
      {
        $soap = new SoapClient(parent::URL_CALCULADOR);
        $retorno = $soap->ConsultaCEP((double) $this->cep, (double) $this->getCnpjEmpresa());
        if ($retorno instanceof stdClass)
        {
          $servico = new BraspressCepResultado($retorno);
          $this->resultado = $servico;
          return TRUE;
        } else
          return FALSE;
      } catch (SoapFault $sf)
      {
        throw new Exception($sf->getMessage());
      }
    }

    /**
     * Retorna o resultado da consulta.
     * @return BraspressCepResultado
     */
    public function getResultado()
    {
      return $this->resultado;
    }

  }

?>
