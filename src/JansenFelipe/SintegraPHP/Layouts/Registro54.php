<?php

namespace JansenFelipe\SintegraPHP\Layouts;

use JansenFelipe\SintegraPHP\Annotations\Registro;
use JansenFelipe\SintegraPHP\Annotations\Campo;

/**
 * @Registro(tipo="54")
 */
class Registro54 extends Layout {

    /**
     * CNPJ do remetente nas entradas e do destinatário nas saídas
     * 
     * @Campo(tipo="numeric", tamanho="14")
     */
    private $documento;

    /**
     * Código do modelo da nota fiscal
     * 
     * @Campo(tipo="numeric", tamanho="2")
     */
    private $modelo;

    /**
     * Série da nota fiscal
     * 
     * @Campo(tipo="string", tamanho="3")
     */
    private $serie;

    /**
     * Número da nota fiscal
     * 
     * @Campo(tipo="numeric", tamanho="6", pad_type=STR_PAD_LEFT)
     */
    private $numeroNF;

    /**
     * Código Fiscal de Operação e Prestação
     * 
     * @Campo(tipo="numeric", tamanho="4")
     */
    private $cfop;

    /**
     * Código da Situação Tributária
     * 
     * @Campo(tipo="string", tamanho="3")
     */
    private $cst;

    /**
     * Número de ordem do item na nota fiscal
     * 
     * @Campo(tipo="numeric", tamanho="3")
     */
    private $numeroItem;

    /**
     * Código do produto ou serviço do informante
     * 
     * @Campo(tipo="string", tamanho="14")
     */
    private $codigo;

    /**
     * Quantidade do produto (com 3 decimais)
     * 
     * @Campo(tipo="numeric", tamanho="11", pad_type=STR_PAD_LEFT)
     */
    private $quantidade;

    /**
     * Valor bruto do produto (valor unitário multiplicado por quantidade) - com 2 decimais
     * 
     * @Campo(tipo="numeric", tamanho="12", pad_type=STR_PAD_LEFT)
     */
    private $valorBruto;

    /**
     * Valor do Desconto Concedido no item (com 2 decimais).
     * 
     * @Campo(tipo="numeric", tamanho="12", pad_type=STR_PAD_LEFT)
     */
    private $valorDesconto;

    /**
     * Base de cálculo do ICMS (com 2 decimais)
     * 
     * @Campo(tipo="numeric", tamanho="12")
     */
    private $valorBaseCalculo;

    /**
     * Base de cálculo do ICMS de retenção na Substituição Tributária (com 2 decimais)
     * 
     * @Campo(tipo="numeric", tamanho="12")
     */
    private $valorBaseCalculoST;

    /**
     * Valor do IPI (com 2 decimais)
     * 
     * @Campo(tipo="numeric", tamanho="12")
     */
    private $valorIPI;

    /**
     * Alíquota Utilizada no Cálculo do ICMS (com 2 decimais)
     * 
     * @Campo(tipo="numeric", tamanho="4")
     */
    private $aliquotaICMS;

    public function getDocumento() {
        return $this->documento;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getSerie() {
        return $this->serie;
    }

    public function getNumeroNF() {
        return $this->numeroNF;
    }

    public function getCfop() {
        return $this->cfop;
    }

    public function getCst() {
        return $this->cst;
    }

    public function getNumeroItem() {
        return $this->numeroItem;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getValorBruto() {
        return $this->valorBruto;
    }

    public function getValorDesconto() {
        return $this->valorDesconto;
    }

    public function getValorBaseCalculo() {
        return $this->valorBaseCalculo;
    }

    public function getValorBaseCalculoST() {
        return $this->valorBaseCalculoST;
    }

    public function getValorIPI() {
        return $this->valorIPI;
    }

    public function getAliquotaICMS() {
        return $this->aliquotaICMS;
    }

    public function setDocumento($documento) {
        $this->documento = $documento;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function setSerie($serie) {
        $this->serie = $serie;
    }

    public function setNumeroNF($numeroNF) {
        $this->numeroNF = $numeroNF;
    }

    public function setCfop($cfop) {
        $this->cfop = $cfop;
    }

    public function setCst($cst) {
        $this->cst = $cst;
    }

    public function setNumeroItem($numeroItem) {
        $this->numeroItem = $numeroItem;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = number_format($quantidade, 3, '.', '');
    }

    public function setValorBruto($valorBruto) {
        $this->valorBruto = number_format($valorBruto, 2, '.', '');
    }

    public function setValorDesconto($valorDesconto) {
        $this->valorDesconto = number_format($valorDesconto, 2, '.', '');
    }

    public function setValorBaseCalculo($valorBaseCalculo) {
        $this->valorBaseCalculo = number_format($valorBaseCalculo, 2, '.', '');
    }

    public function setValorBaseCalculoST($valorBaseCalculoST) {
        $this->valorBaseCalculoST = number_format($valorBaseCalculoST, 2, '.', '');
    }

    public function setValorIPI($valorIPI) {
        $this->valorIPI = number_format($valorIPI, 2, '.', '');
    }

    public function setAliquotaICMS($aliquotaICMS) {
        $this->aliquotaICMS = number_format($aliquotaICMS, 2, '.', '');
    }

}
