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
     * @var double
     */
    private $cnpjEmpresa;

    /**
     * Cria um objeto da Braspress.
     * @param double $cnpjEmpresa CNPJ da empresa que possui contrato com a Braspress.
     */
    public function __construct($cnpjEmpresa)
    {
      $this->cnpjEmpresa = $cnpjEmpresa;
    }

    /**
     * Retorna o CNPJ da empresa que possui contrato com a Braspress.
     * @return double
     */
    protected function getCnpjEmpresa()
    {
      return (double) $this->cnpjEmpresa;
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
