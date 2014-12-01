<?php

namespace JansenFelipe\SintegraPHP\Layouts;

use JansenFelipe\SintegraPHP\Annotations\Registro;
use JansenFelipe\SintegraPHP\Annotations\Campo;

/**
 * @Registro(tipo="11")
 */
class Registro11 extends Layout{

    /**
     * @Campo(tipo="string", tamanho="34")
     */
    private $logradouro;

    /**
     * @Campo(tipo="numeric", tamanho="5", pad_type=STR_PAD_LEFT)
     */
    private $numero;

    /**
     * @Campo(tipo="string", tamanho="22")
     */
    private $complemento;

    /**
     * @Campo(tipo="string", tamanho="15")
     */
    private $bairro;

    /**
     * @Campo(tipo="string", tamanho="8")
     */
    private $cep;

    /**
     * @Campo(tipo="string", tamanho="28")
     */
    private $responsavel;

    /**
     * @Campo(tipo="numeric", tamanho="12", pad_type=STR_PAD_LEFT)
     */
    private $telefone;

    public function getLogradouro() {
        return $this->logradouro;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getResponsavel() {
        return $this->responsavel;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

}
