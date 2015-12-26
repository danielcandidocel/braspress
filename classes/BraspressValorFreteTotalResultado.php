<?php

  /**
   * Classe que contém o retorno de uma consulta de valor de frete da Braspress.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @package braspress
   * @version 1.0
   * @final
   */
  final class BraspressValorFreteTotalResultado
  {

    /**
     * Contém o valor do frete
     * @var integer
     * @access private
     */
    private $valorFrete;

    /**
     * Indica se o retorno foi efetuado com sucesso.
     * @var boolean 
     * @access private
     */
    private $sucesso;

    /**
     * Contém a mensagem de erro.
     * @var string
     * @access private
     */
    private $mensagemErro;

    /**
     * Cria um objeto de retorno.
     * @param array $retorno Retorno da consulta
     * @access public
     */
    public function __construct($retorno)
    {
      $this->setValorFrete((isset($retorno['valor'])) ? $retorno['valor'] : 0);
      $this->setSucesso((isset($retorno['sucesso'])) ? $retorno['sucesso'] : FALSE);
      $this->setMensagemErro((isset($retorno['mensagem'])) ? $retorno['mensagem'] : '');
    }

    /**
     * Indica o valor do frete.
     * @param double $valorFrete Valor do frete.
     * @access private
     */
    private function setValorFrete($valorFrete)
    {
      $this->valorFrete = (double) $valorFrete;
    }

    /**
     * Indica se a consulta foi realizada com sucesso.
     * @param boolean $sucesso Indica se houve sucesso.
     * @access private
     */
    private function setSucesso($sucesso)
    {
      $this->sucesso = (boolean) $sucesso;
    }

    /**
     * Indica a mensagem de erro.
     * @param string $mensagemErro Mensagem de erro.
     * @access private
     */
    private function setMensagemErro($mensagemErro)
    {
      $this->mensagemErro = (string) $mensagemErro;
    }

    /**
     * Retorna o valor total do frete.
     * @return double
     * @access public
     */
    public function getValorFrete()
    {
      return $this->valorFrete;
    }

    /**
     * Indica o retorno da consulta.
     * @return boolean
     * @access public
     */
    public function getSucesso()
    {
      return $this->sucesso;
    }

    /**
     * Retorna a mensagem de erro, caso tenha havido.
     * @return string
     * @access public
     */
    public function getMensagemErro()
    {
      return $this->mensagemErro;
    }

  }

?>
