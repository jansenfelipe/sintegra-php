<?php

namespace JansenFelipe\SintegraPHP\Layouts;

use JansenFelipe\SintegraPHP\Tipos\FinalidadeArquivo;
use JansenFelipe\SintegraPHP\Tipos\NaturezaOperacao;
use JansenFelipe\SintegraPHP\Annotations\Registro;
use JansenFelipe\SintegraPHP\Annotations\Campo;

/**
 * @Registro(tipo="10")
 */
class Registro10 {

    /**
     * @Campo(tipo="string", tamanho="14")
     */
    private $cnpj;

    /**
     * @Campo(tipo="string", tamanho="14")
     */
    private $ie;

    /**
     * @Campo(tipo="string", tamanho="35")
     */
    private $razaoSocial;

    /**
     * @Campo(tipo="string", tamanho="30")
     */
    private $cidade;

    /**
     * @Campo(tipo="string", tamanho="2")
     */
    private $uf;

    /**
     * @Campo(tipo="numeric", tamanho="10")
     */
    private $fax;

    /**
     * @Campo(tipo="numeric", tamanho="8")
     */
    private $dataInicial;

    /**
     * @Campo(tipo="numeric", tamanho="8")
     */
    private $dataFinal;

    /**
     * @Campo(tipo="string", tamanho="1")
     */
    private $codigoConvenio;

    /**
     * @Campo(tipo="string", tamanho="1")
     */
    private $naturezaOperacao = NaturezaOperacao::TOTALIDADE_DAS_OPERACOES;

    /**
     * @Campo(tipo="string", tamanho="1")
     */
    private $finalidadeArquivo = FinalidadeArquivo::NORMAL;

    public function getCodigoConvenio() {
        return $this->codigoConvenio;
    }

    public function getFinalidadeArquivo() {
        return $this->finalidadeArquivo;
    }

    public function getNaturezaOperacao() {
        return $this->naturezaOperacao;
    }

    public function getRazaoSocial() {
        return $this->razaoSocial;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getIe() {
        return $this->ie;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getUf() {
        return $this->uf;
    }

    public function getDataInicial() {
        return $this->dataInicial;
    }

    public function getDataFinal() {
        return $this->dataFinal;
    }

    public function getFax() {
        return $this->fax;
    }

    public function setCodigoConvenio($codigoConvenio) {
        $this->codigoConvenio = $codigoConvenio;
    }

    public function setFinalidadeArquivo($finalidadeArquivo) {
        $this->finalidadeArquivo = $finalidadeArquivo;
    }

    public function setNaturezaOperacao($naturezaOperacao) {
        $this->naturezaOperacao = $naturezaOperacao;
    }

    public function setRazaoSocial($razaoSocial) {
        $this->razaoSocial = $razaoSocial;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function setIe($ie) {
        $this->ie = $ie;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setUf($uf) {
        $this->uf = $uf;
    }

    public function setDataInicial($dataInicial) {
        $this->dataInicial = $dataInicial;
    }

    public function setDataFinal($dataFinal) {
        $this->dataFinal = $dataFinal;
    }

    public function setFax($fax) {
        $this->fax = $fax;
    }

}
