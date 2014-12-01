<?php

namespace JansenFelipe\SintegraPHP;

use JansenFelipe\NFePHPSerialize\NFePHPSerialize;
use JansenFelipe\SintegraPHP\Layouts\Registro10;
use JansenFelipe\SintegraPHP\Layouts\Registro11;
use JansenFelipe\SintegraPHP\Tipos\FinalidadeArquivo;
use JansenFelipe\SintegraPHP\Tipos\NaturezaOperacao;
use PHPUnit_Framework_TestCase;

class Teste01 extends PHPUnit_Framework_TestCase {
    
    /*
     * O objetivo dessa suite é gerar o arquivo Sintegra lendo
     * apenas uma NFe de saída. O registro 88 deverá ser gerado
     * nesse caso.
     */
    
    private $NFePHPSerialize;
    private $sintegraPHP;

    protected function setUp() {
        $this->sintegraPHP = new SintegraPHP();
        $this->NFePHPSerialize = new NFePHPSerialize();
    }

    public function testGerarSintegra() {
        
        //Configuração..
        $this->sintegraPHP->setRegistro10($this->getRegistro10());
        $this->sintegraPHP->setRegistro11($this->getRegistro11());

        //Carregando xml..
        $xml = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'notafiscal.xml');
        
        //Parser..
        $notaFiscal = $this->NFePHPSerialize->xml2Object($xml);

        //Adicionando Nota Fiscal e gerando o output
        $this->sintegraPHP->addNotaFiscal($notaFiscal);
        $output = $this->sintegraPHP->output();
  
        //Carregando Sintegra correto para testar o $output
        $sintegra = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'sintegra.txt');
        file_put_contents('/var/www/sintegra-php/tests/teste01/output.txt', addslashes($output));    
        $this->assertEquals(addslashes($sintegra), addslashes($output));
    }

    /*
     * Montagem do cabeçalho - Dados da Empresa
     */

    public function getRegistro10() {
        $registro10 = new Registro10();
        $registro10->setCnpj('13411752000197');
        $registro10->setIe('0017498080010');
        $registro10->setRazaoSocial('FIGUEIREDO ALIMENTOS CONGELADOS LTDA - ME');
        $registro10->setCidade('BELO HORIZONTE');
        $registro10->setUf('MG');
        $registro10->setDataInicial('20140901');
        $registro10->setDataFinal('20140930');
        $registro10->setFax('3188677083');
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
        $registro11->setLogradouro('RUA FURTADO DE MENEZES');
        $registro11->setNumero(366);
        $registro11->setComplemento('A');
        $registro11->setBairro('SANTA ROSA');
        $registro11->setCep(31255780);
        $registro11->setResponsavel('VANIA LUCIA ZANON');
        $registro11->setTelefone(3188677083);

        return $registro11;
    }

}
