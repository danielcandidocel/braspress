<?php

  /**
   * Classe que contém o retorno de uma consulta de prazos da Braspress.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @version 1.0
   * @final
   */
  final class BraspressPrazoEntregaResultado
  {

    /**
     * Contém o prazo de entrega.
     * @var integer
     */
    private $prazo;

    /**
     * Indica se o retorno foi efetuado com sucesso.
     * @var boolean 
     */
    private $sucesso;

    /**
     * Contém a mensagem de erro.
     * @var string
     */
    private $mensagemErro;

    /**
     * Cria um objeto de retorno.
     * @param array $retorno Retorno da consulta
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
     */
    private function setPrazo($prazo)
    {
      $this->prazo = (int) $prazo;
    }

    /**
     * Indica se a consulta foi realizada com sucesso.
     * @param boolean $sucesso Indica se houve sucesso.
     */
    private function setSucesso($sucesso)
    {
      $this->sucesso = (boolean) $sucesso;
    }

    /**
     * Indica a mensagem de erro.
     * @param string $mensagemErro Mensagem de erro.
     */
    private function setMensagemErro($mensagemErro)
    {
      $this->mensagemErro = (string) $mensagemErro;
    }

    /**
     * Retorna o prazo de entrega.
     * @return integer
     */
    public function getPrazo()
    {
      return $this->prazo;
    }

    /**
     * Indica o retorno da consulta.
     * @return boolean
     */
    public function getSucesso()
    {
      return $this->sucesso;
    }

    /**
     * Retorna a mensagem de erro, caso tenha havido.
     * @return type
     */
    public function getMensagemErro()
    {
      return $this->mensagemErro;
    }

  }

?>
