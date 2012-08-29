<?php

  /**
   * Classe base para os serviços de cálculo de frete da Braspress.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @version 1.0
   * @abstract
   */
  abstract class Braspress
  {
    /**
     * URL do calculador de frete da Braspress.
     */

    const URL_CALCULADOR = 'http://tracking.braspress.com.br/wscalculafreteisapi.dll/wsdl/IWSCalcFrete?wsdl';

    /**
     * Contém o CNPJ da empresa que possui contrato com a Braspress.
     * @var string
     */
    private $cnpjEmpresa;

    /**
     * Cria um objeto da Braspress.
     * @param string $cnpjEmpresa CNPJ da empresa que possui contrato com a Braspress.
     */
    public function __construct($cnpjEmpresa)
    {
      $this->cnpjEmpresa = $cnpjEmpresa;
    }

    /**
     * Retorna o CNPJ da empresa que possui contrato com a Braspress.
     * @return type
     */
    protected function getCnpjEmpresa()
    {
      return $this->cnpjEmpresa;
    }

    /**
     * Realiza o processamento da consulta.
     * 
     * @return boolean 
     * @abstract
     */
    abstract public function processaConsulta();
  }

?>
