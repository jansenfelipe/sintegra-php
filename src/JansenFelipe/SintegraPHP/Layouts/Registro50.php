<?php

namespace JansenFelipe\SintegraPHP\Layouts;

use JansenFelipe\SintegraPHP\Annotations\Registro;
use JansenFelipe\SintegraPHP\Annotations\Campo;

/**
 * @Registro(tipo="50")
 */
class Registro50 extends Layout{

    /**
     * CNPJ do remetente nas entradas e do destinatário nas saídas
     * 
     * @Campo(tipo="numeric", tamanho="14")
     */
    private $documento;

    /**
     * Inscrição estadual do remetente nasentradas e do destinatário nas saídas
     * 
     * @Campo(tipo="string", tamanho="14")
     */
    private $ie;

    /**
     * Data de emissão na saída ou de recebimento na entrada
     * 
     * @Campo(tipo="numeric", tamanho="8")
     */
    private $dataDocumento;

    /**
     * Sigla da Unidade da Federação do remetente nas entradas e do destinatário nas saídas
     * 
     * @Campo(tipo="string", tamanho="2")
     */
    private $uf;

    /**
     * Código do modelo da nota fiscal
     * 
     * @Campo(tipo="numeric", tamanho="2")
     */
    private $modeloNF;

    /**
     * Série da nota fiscal
     * 
     * @Campo(tipo="string", tamanho="3")
     */
    private $serieNF;

    /**
     * Número da nota fiscal
     * 
     * @Campo(tipo="numeric", tamanho="6", pad_type=STR_PAD_LEFT)
     */
    private $numeroNF;

    /**
     * Código Fiscal de Operação e Prestação
     * 
     * @Campo(tipo="numeric", tamanho="4", pad_type=STR_PAD_LEFT)
     */
    private $cfop;

    /**
     * Emitente da nota fiscal (P-próprio/T-terceiros)
     * 
     * @Campo(tipo="string", tamanho="1")
     */
    private $emitente;

    /**
     * Valor total da nota fiscal (com 2 decimais)
     * 
     * @Campo(tipo="numeric", tamanho="13", pad_type=STR_PAD_LEFT)
     */
    private $valorTotal;

    /**
     * Base de cálculo do ICMS (com 2 decimais)
     * 
     * @Campo(tipo="numeric", tamanho="13", pad_type=STR_PAD_LEFT)
     */
    private $baseDeCalculoIcms;

    /**
     * Montante do imposto (com 2 decimais)
     * 
     * @Campo(tipo="numeric", tamanho="13", pad_type=STR_PAD_LEFT)
     */
    private $valorIcms;

    /**
     * Valor amparado por isenção ou não incidência (com 2 decimais)
     * 
     * @Campo(tipo="numeric", tamanho="13", pad_type=STR_PAD_LEFT)
     */
    private $valorAmparado;

    /**
     * Valor que não confira débito ou crédito do ICMS (com 2 decimais)
     * 
     * @Campo(tipo="numeric", tamanho="13", pad_type=STR_PAD_LEFT)
     */
    private $valorOutras;

    /**
     * Alíquota do ICMS (com 2 decimais)
     * 
     * @Campo(tipo="numeric", tamanho="4", pad_type=STR_PAD_LEFT)
     */
    private $aliquotaIcms;

    /**
     * Situação da nota fiscal
     * 
     * @Campo(tipo="string", tamanho="1")
     */
    private $situacao;

    public function getDocumento() {
        return $this->documento;
    }

    public function getIe() {
        return $this->ie;
    }

    public function getDataDocumento() {
        return $this->dataDocumento;
    }

    public function getUf() {
        return $this->uf;
    }

    public function getModeloNF() {
        return $this->modeloNF;
    }

    public function getSerieNF() {
        return $this->serieNF;
    }

    public function getNumeroNF() {
        return $this->numeroNF;
    }

    public function getCfop() {
        return $this->cfop;
    }

    public function getEmitente() {
        return $this->emitente;
    }

    public function getValorTotal() {
        return $this->valorTotal;
    }

    public function getBaseDeCalculoIcms() {
        return $this->baseDeCalculoIcms;
    }

    public function getValorIcms() {
        return $this->valorIcms;
    }

    public function getValorAmparado() {
        return $this->valorAmparado;
    }

    public function getValorOutras() {
        return $this->valorOutras;
    }

    public function getAliquotaIcms() {
        return $this->aliquotaIcms;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function setDocumento($documento) {
        $this->documento = $documento;
    }

    public function setIe($ie) {
        $this->ie = $ie;
    }

    public function setDataDocumento($dataDocumento) {
        $this->dataDocumento = $dataDocumento;
    }

    public function setUf($uf) {
        $this->uf = $uf;
    }

    public function setModeloNF($modeloNF) {
        $this->modeloNF = $modeloNF;
    }

    public function setSerieNF($serieNF) {
        $this->serieNF = $serieNF;
    }

    public function setNumeroNF($numeroNF) {
        $this->numeroNF = $numeroNF;
    }

    public function setCfop($cfop) {
        $this->cfop = $cfop;
    }

    public function setEmitente($emitente) {
        $this->emitente = $emitente;
    }

    public function setValorTotal($valorTotal) {        
        $this->valorTotal = number_format($valorTotal, 2, '.', '');
    }

    public function setBaseDeCalculoIcms($baseDeCalculoIcms) {
        $this->baseDeCalculoIcms = $baseDeCalculoIcms;
    }

    public function setValorIcms($valorIcms) {
        $this->valorIcms = $valorIcms;
    }

    public function setValorAmparado($valorAmparado) {
        $this->valorAmparado = $valorAmparado;
    }

    public function setValorOutras($valorOutras) {
        $this->valorOutras = $valorOutras;
    }

    public function setAliquotaIcms($aliquotaIcms) {
        $this->aliquotaIcms = $aliquotaIcms;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

}
