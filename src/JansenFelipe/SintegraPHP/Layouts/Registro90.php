<?php

namespace JansenFelipe\SintegraPHP\Layouts;

use JansenFelipe\SintegraPHP\Annotations\Registro;
use JansenFelipe\SintegraPHP\Annotations\Campo;

/**
 * @Registro(tipo="90")
 */
class Registro90 extends Layout {

    /**
     * CGC/MF do informante - CNPJ 
     * 
     * @Campo(tipo="numeric", tamanho="14")
     */
    private $cgcMF;

    /**
     * Inscrição Estadual do informante
     * 
     * @Campo(tipo="string", tamanho="14")
     */
    private $inscricaoEstadual;

    /**
     * Tipo de registro que será totalizado pelo próximo campo
     * 
     * @Campo(tipo="numeric", tamanho="2")
     */
    private $tipoTotalizado;

    /**
     * Total de registros do tipo informado no campo anterior
     * 
     * @Campo(tipo="numeric", tamanho="8")
     */
    private $totalRegistro;

    /**
     * Total de registros 90 do arquivo
     * 
     * @Campo(tipo="numeric", tamanho="1")
     */
    private $totalRegistro90;

    
    public function getCgcMF()
    {
        return $this->cgcMF;
    }    
    public function getInscricaoEstadual()
    {
        return $this->inscricaoEstadual;
    } 
    public function getTipoTotalizado()
    {
        return $this->tipoTotalizado;
    }
    public function getTotalRegistro()
    {
        return $this->totalRegistro;
    }
    public function getTotalRegistro90()
    {
        return $this->totalRegistro90;
    }
     
    public function setTotalRegistro90($totalRegistro90)
    {
        return $this->totalRegistro90 = $totalRegistro90;
    }
    public function setTotalRegistro($totalRegistro)
    {
        return $this->totalRegistro = $totalRegistro;
    }
    public function setTipoTotalizado($tipoTotalizado)
    {
        return $this->tipoTotalizado = $tipoTotalizado;
    }
    public function setInscricaoEstadual($inscricaoEstadual)
    {
        return $this->inscricaoEstadual = $inscricaoEstadual;
    }
    public function setCgcMF($cgcMF)
    {
        return $this->cgcMF = $cgcMF;
    }
    
    
    
    

}
