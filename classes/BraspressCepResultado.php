<?php

  /**
   * Classe que irá conter o resultado de uma consulta remota de CEP através do 
   * webservice da Braspress.
   *  
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @version 1.0
   * @final
   */
  final class BraspressCepResultado
  {

    /**
     * Contém o logradouro do endereço.
     * @var string
     */
    private $logradouro;

    /**
     * Contém a cidade do endereço.
     * @var string
     */
    private $cidade;

    /**
     * Contém a unidade federativa do endereço.
     * @var string
     */
    private $uf;

    /**
     * Contém o bairro do endereço.
     * @var string
     */
    private $bairro;

    /**
     * Contém a mensagem de erro, caso tenha havido algum erro.
     * @var string
     */
    private $mensagemErro;

    /**
     * Indica se a consulta retornou com sucesso.
     * @var boolean
     */
    private $sucesso;

    /**
     * Cria um objeto de resultado.
     * @param stdClass $retorno Retorno da Braspress.
     */
    public function __construct(stdClass $retorno)
    {
      $this->setLogradouro(isset($retorno->Endereco) ? $retorno->Endereco : '');
      $this->setCidade(isset($retorno->Cidade) ? $retorno->Cidade : '');
      $this->setUf(isset($retorno->UF) ? $retorno->UF : '');
      $this->setBairro(isset($retorno->Bairro) ? $retorno->Bairro : '');
      $mensagemErro = trim(isset($retorno->MsgErro) ? $retorno->MsgErro : '');
      $this->setMensagemErro(($mensagemErro == 'OK') ? '' : $mensagemErro);
      $this->setSucesso($mensagemErro == 'OK');
    }

    /**
     * Informa o logradouro do endereço.
     * @param string $logradouro Logradouro do endereço.
     */
    private function setLogradouro($logradouro)
    {
      $this->logradouro = (string) $logradouro;
    }

    /**
     * Informa a cidade do endereço.
     * @param string $cidade Cidade do endereço.
     */
    private function setCidade($cidade)
    {
      $this->cidade = (string) $cidade;
    }

    /**
     * Informa a unidade federativa do endereço.
     * @param string $uf Unidade federativa do endereço.
     */
    private function setUf($uf)
    {
      $this->uf = (string) $uf;
    }

    /**
     * Informa o bairro do endereço.
     * @param string $bairro Bairro do endereço.
     */
    private function setBairro($bairro)
    {
      $this->bairro = (string) $bairro;
    }

    /**
     * Informa a mensagem de erro, caso tenha havido.
     * @param string $mensagemErro Mensagem de erro, caso tenha havido.
     */
    private function setMensagemErro($mensagemErro)
    {
      $this->mensagemErro = (string) $mensagemErro;
    }

    /**
     * Indica se a consulta retornou com sucesso.
     * @param boolean $sucesso A consulta retornou com sucesso.
     */
    private function setSucesso($sucesso)
    {
      $this->sucesso = (boolean) $sucesso;
    }

    /**
     * Retorna o logradouro do endereço.
     * @return string
     */
    public function getLogradouro()
    {
      return $this->logradouro;
    }

    /**
     * Retorna a cidade do endereço.
     * @return string
     */
    public function getCidade()
    {
      return $this->cidade;
    }

    /**
     * Retorna a unidade federativa do endereço.
     * @return string
     */
    public function getUf()
    {
      return $this->uf;
    }

    /**
     * Retorna o bairro do endereço.
     * @return string
     */
    public function getBairro()
    {
      return $this->bairro;
    }

    /**
     * Retorna a mensagem de erro, caso tenha havido.
     * @return string
     */
    public function getMensagemErro()
    {
      return $this->mensagemErro;
    }

    /**
     * Retorna se a consulta foi realizada com sucesso.
     * @return boolean
     */
    public function getSucesso()
    {
      return $this->sucesso;
    }

  }

?>
