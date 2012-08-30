<?php

  /**
   * Classe que contém o retorno de uma consulta de prazos da Braspress.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @package braspress
   * @version 1.0
   * @final
   */
  final class BraspressPrazoEntregaResultado
  {

    /**
     * Contém o prazo de entrega.
     * @var integer
     * @access private
     */
    private $prazo;

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
      $this->setPrazo((isset($retorno['prazo'])) ? $retorno['prazo'] : 0);
      $this->setSucesso((isset($retorno['sucesso'])) ? $retorno['sucesso'] : FALSE);
      $this->setMensagemErro((isset($retorno['mensagem'])) ? $retorno['mensagem'] : '');
    }

    /**
     * Indica o prazo de entrega da consulta.
     * @param integer $prazo Prazo de entrega.
     * @access private
     */
    private function setPrazo($prazo)
    {
      $this->prazo = (int) $prazo;
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
     * Retorna o prazo de entrega.
     * @return integer
     * @access public
     */
    public function getPrazo()
    {
      return $this->prazo;
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
