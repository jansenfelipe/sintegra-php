<?php

namespace JansenFelipe\SintegraPHP;

use JansenFelipe\SintegraPHP\Layouts\Registro10;
use JansenFelipe\SintegraPHP\Layouts\Registro11;
use JansenFelipe\SintegraPHP\Layouts\Registro50;
use JansenFelipe\SintegraPHP\Tipos\Emitente;
use JansenFelipe\SintegraPHP\Tipos\FinalidadeArquivo;
use JansenFelipe\SintegraPHP\Tipos\ModeloNF;
use JansenFelipe\SintegraPHP\Tipos\NaturezaOperacao;
use JansenFelipe\SintegraPHP\Tipos\Situacao;
use PHPUnit_Framework_TestCase;

class SintegraPHPTest extends PHPUnit_Framework_TestCase {

    public function testGerarLinhaRegistro10() {
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

        $linha = SintegraPHP::gerarLinha($registro10);
        $this->assertEquals('10134117520001970017498080010 FIGUEIREDO ALIMENTOS CONGELADOS LTDBelo Horizonte                MG00000000002014090120140930331', $linha);
    }

    public function testGerarLinhaRegistro11() {
        $registro11 = new Registro11();
        $registro11->setLogradouro('Rua FURTADO DE MENEZES');
        $registro11->setNumero(366);
        $registro11->setComplemento('A');
        $registro11->setBairro('SANTA ROSA');
        $registro11->setCep(31255780);
        $registro11->setResponsavel('VANIA LUCIA ZANON');
        $registro11->setTelefone(3188677083);

        $linha = SintegraPHP::gerarLinha($registro11);
        $this->assertEquals('11Rua FURTADO DE MENEZES            00366A                     SANTA ROSA     31255780VANIA LUCIA ZANON           003188677083', $linha);
    }
    
    public function testGerarLinhaRegistro50() {
        $registro50 = new Registro50();
        $registro50->setDocumento('11796602000385');
        $registro50->setIe('0022075790108');
        $registro50->setDataDocumento('20140901');
        $registro50->setUf('MG');
        $registro50->setModeloNF(ModeloNF::NOTA_FISCAL_ELETRONICA);
        $registro50->setSerieNF(1);
        $registro50->setNumeroNF(261);
        $registro50->setCfop(5102);
        $registro50->setEmitente(Emitente::PROPRIO);
        $registro50->setValorTotal('3906.00');
        $registro50->setValorOutras('3906.00');
        $registro50->setSituacao(Situacao::NORMAL);
        
        $linha = SintegraPHP::gerarLinha($registro50);
        $this->assertEquals('50117966020003850022075790108 20140901MG551  0002615102P000000039060000000000000000000000000000000000000000000000003906000000N', $linha);
    }

}
