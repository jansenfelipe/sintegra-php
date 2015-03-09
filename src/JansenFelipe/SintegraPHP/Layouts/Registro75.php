<?php

namespace JansenFelipe\SintegraPHP\Layouts;

use JansenFelipe\SintegraPHP\Annotations\Registro;
use JansenFelipe\SintegraPHP\Annotations\Campo;

/**
 * @Registro(tipo="75")
 */
class Registro75 extends Layout {

    /**
     * Data inicial do período de validade das informações
     * 
     * @Campo(tipo="numeric", tamanho="8")
     */
    private $dataInicial;

    /**
     * Data final do período de validade das informações
     * 
     * @Campo(tipo="numeric", tamanho="8")
     */
    private $dataFinal;

    /**
     * Código do produto ou serviço utilizado pelo contribuinte
     * 
     * @Campo(tipo="string", tamanho="14")
     */
    private $codigo;

    /**
     * Codificação da Nomenclatura Comum do Mercosul
     * 
     * @Campo(tipo="string", tamanho="8")
     */
    private $ncm;

    /**
     * Descrição do produto ou serviço
     * 
     * @Campo(tipo="string", tamanho="53")
     */
    private $descricao;

    /**
     * Unidade de medida de comercialização do produto ( un, kg, mt, m3, sc, frd, kWh, etc..)
     * 
     * @Campo(tipo="string", tamanho="6")
     */
    private $unidadeMedida;

    /**
     * Alíquota do IPI do produto (com 2 decimais)
     * 
     * @Campo(tipo="numeric", tamanho="5")
     */
    private $aliquotaIPI;

    /**
     * Alíquota do ICMS aplicável a mercadoria ou serviço nas operações ou prestações internas ou naquelas que se tiverem iniciado no exterior (com 2 decimais)
     * 
     * @Campo(tipo="numeric", tamanho="4")
     */
    private $aliquotaICMS;

    /**
     * % de Redução na base de cálculo do ICMS, nas operações internas (com 2 decimais)
     * 
     * @Campo(tipo="numeric", tamanho="5")
     */
    private $reducaoBaseICMS;

    /**
     * Base de Cálculo do ICMS de substituição tributária (com 2 decimais)
     * 
     * @Campo(tipo="numeric", tamanho="13", pad_type=STR_PAD_LEFT)
     */
    private $baseICMS;

    public function getDataInicial()
    {
        return $this->dataInicial;
    }
        
    public function getDataFinal()
    {
       return $this->dataFinal;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }
     
    public function getNcm()
    {
        return $this->ncm;
    }
     
    public function getDescricao()
    {
        return $this->descricao;
    }
     
    public function getUnidadeMedida()
    {
        return $this->unidadeMedida;
    }
     
    public function getAliquotaIPI()
    {
        return $this->aliquotaIPI;
    }
     
    public function getAliquotaICMS()
    {
        return $this->aliquotaICMS;
    }

    public function getReducaoBaseICMS()
    {
        return $this->reducaoBaseICMS;
    }
     
    public function getBaseICMS()
    {
        return $this->baseICMS;
    }
     

    public function setDataInicial($dataInicial)
    {
        return $this->dataInicial = $dataInicial;
    }

    public function setDataFinal($dataFinal)
    {
       return $this->dataFinal = $dataFinal;
    }  

    public function setCodigo($codigo)
    {
        return $this->codigo = $codigo;
    }

    public function setNcm($ncm)
    {
        return $this->ncm = $ncm;
    }

    public function setDescricao($descricao)
    {
        return $this->descricao = $descricao;
    }

    public function setUnidadeMedida($unidadeMedida)
    {
        return $this->unidadeMedida = $unidadeMedida;
    }

    public function setAliquotaIPI($aliquotaIPI)
    {
        return $this->aliquotaIPI = $aliquotaIPI;
    }

    public function setAliquotaICMS($aliquotaICMS)
    {       
        return $this->aliquotaICMS = $aliquotaICMS;
    }

    public function setReducaoBaseICMS($reducaoBaseICMS)
    {
        return $this->reducaoBaseICMS = $reducaoBaseICMS;
    }

    public function setBaseICMS($baseICMS)
    {
        return $this->baseICMS = $baseICMS;
    }
}
