<?php

namespace JansenFelipe\SintegraPHP;

use JansenFelipe\NFePHPSerialize\NFePHPSerialize;
use JansenFelipe\NFePHPSerialize\NfeProc\NfeProc;
use JansenFelipe\SintegraPHP\Layouts\Registro10;
use JansenFelipe\SintegraPHP\Layouts\Registro11;
use JansenFelipe\SintegraPHP\Layouts\Registro50;
use JansenFelipe\SintegraPHP\Tipos\FinalidadeArquivo;
use JansenFelipe\SintegraPHP\Tipos\NaturezaOperacao;
use PHPUnit_Framework_TestCase;

class SintegraPHPTest extends PHPUnit_Framework_TestCase {

    private $NFePHPSerialize;
    private $sintegraPHP;

    protected function setUp() {
        $this->sintegraPHP = new SintegraPHP();
        $this->NFePHPSerialize = new NFePHPSerialize();
    }

    public function testGerar() {
        $this->sintegraPHP->setRegistro10($this->getRegistro10());
        $this->sintegraPHP->setRegistro11($this->getRegistro11());

        $nfe01 = $this->NFePHPSerialize->xml2Object(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'entrada.xml'));

        $reg50 = new Registro50();
        $reg50->setDocumento($nfe01->NFe->infNFe->emit->CNPJ);
        $reg50->setIe($nfe01->NFe->infNFe->emit->IE);
        $reg50->setDataDocumento($nfe01->NFe->infNFe->ide->dEmi);
        
        //$reg50->setUf(?);     

        $this->sintegraPHP->addRegistro50($reg50);

        $linha = $this->sintegraPHP->gerar();
        echo PHP_EOL . $linha;
    }

    /*
     * Montagem do cabeçalho - Dados da Empresa
     */

    public function getRegistro10() {
        $registro10 = new Registro10();
        $registro10->setCnpj('13411752000197');
        $registro10->setIe('0017498080010');
        $registro10->setRazaoSocial('FIGUEIREDO ALIMENTOS CONGELADOS LTDA - ME');
        $registro10->setCidade('Belo Horizonte');
        $registro10->setUf('MG');
        $registro10->setDataInicial('20140901');
        $registro10->setDataFinal('20140930');
        $registro10->setCodigoConvenio(3);
        $registro10->setNaturezaOperacao(NaturezaOperacao::TOTALIDADE_DAS_OPERACOES);
        $registro10->setFinalidadeArquivo(FinalidadeArquivo::NORMAL);

        return $registro10;
    }

    /*
     * Montagem do cabeçalho - Dados adicionais da Empresa
     */

    public function getRegistro11() {
        $registro11 = new Registro11();
        $registro11->setLogradouro('Rua FURTADO DE MENEZES');
        $registro11->setNumero(366);
        $registro11->setComplemento('A');
        $registro11->setBairro('SANTA ROSA');
        $registro11->setCep(31255780);
        $registro11->setResponsavel('VANIA LUCIA ZANON');
        $registro11->setTelefone(3188677083);

        return $registro11;
    }

}
