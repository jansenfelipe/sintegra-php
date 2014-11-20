<?php

namespace JansenFelipe\SintegraPHP;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Collections\ArrayCollection;
use Exception;
use JansenFelipe\NFePHPSerialize\NfeProc\NFe\InfNFe\Det\Prod;
use JansenFelipe\NFePHPSerialize\NfeProc\NfeProc;
use JansenFelipe\SintegraPHP\Layouts\Registro10;
use JansenFelipe\SintegraPHP\Layouts\Registro11;
use JansenFelipe\SintegraPHP\Layouts\Registro50;
use JansenFelipe\SintegraPHP\Layouts\Registro54;

class SintegraPHP {

    private $notasFiscaisEntrada;
    private $notasFiscaisSaida;
    private $registro10;
    private $registro11;
    private $registros50;
    private $registros54;

    function __construct() {
        $this->notasFiscaisEntrada = new ArrayCollection();
        $this->notasFiscaisSaida = new ArrayCollection();
        $this->registros50 = new ArrayCollection();
        $this->registros54 = new ArrayCollection();

        AnnotationRegistry::registerAutoloadNamespace(
                'JansenFelipe\SintegraPHP\Annotations', './src'
        );
    }

    /*
     * Adicionar nota fiscal (Entrada ou Saida)
     */

    public function addNotaFiscal(NfeProc $nfeProc) {

        if (is_null($this->registro10))
            throw new Exception('Registro 10 não informado.');

        if ($nfeProc->NFe->infNFe->dest->CNPJ == $this->registro10->getCnpj())
            $this->notasFiscaisEntrada->add($nfeProc);

        if ($nfeProc->NFe->infNFe->emit->CNPJ == $this->registro10->getCnpj())
            $this->notasFiscaisSaida->add($nfeProc);
    }

    /*
     * Retorna a string no formato do Sintegra
     */

    public function output() {

        if (is_null($this->registro10))
            throw new Exception('Registro 10 não informado.');

        if (is_null($this->registro11))
            throw new Exception('Registro 11 não informado.');

        $data = $this->registro10->gerarLinha() . PHP_EOL;
        $data .= $this->registro11->gerarLinha() . PHP_EOL;

        $this->processarSaida();

        foreach ($this->registros50->getValues() as $registro50)
            $data .= $registro50->gerarLinha() . PHP_EOL;

        foreach ($this->registros54->getValues() as $registro54)
            $data .= $registro54->gerarLinha() . PHP_EOL;

        return $data;
    }

    /*
     * Preenche os registros com os dados das Notas Fiscais de Saida
     */

    private function processarSaida() {

        foreach ($this->notasFiscaisSaida->getValues() as $nfeProc) {

            $registros50 = array();

            /*
             * Preparação do registro 50
             */
            $reg50 = new Registro50();
            $reg50->setDocumento($nfeProc->NFe->infNFe->dest->CNPJ);
            $reg50->setIe($nfeProc->NFe->infNFe->dest->IE);
            $reg50->setDataDocumento($nfeProc->NFe->infNFe->ide->dEmi);
            $reg50->setUf($nfeProc->NFe->infNFe->dest->enderDest->UF);
            $reg50->setModeloNF($nfeProc->NFe->infNFe->ide->mod);
            $reg50->setSerieNF($nfeProc->NFe->infNFe->ide->serie);
            $reg50->setNumeroNF($nfeProc->NFe->infNFe->ide->nNF);
            $reg50->setEmitente('P');
            $reg50->setSituacao('N');


            $itens = $nfeProc->NFe->infNFe->dets;

            /*
             * Iterando itens da nota fiscal
             */
            $prod = new Prod();


            foreach ($itens as $item) {
                unset($r50);

                $prod = $item->prod;

                /*
                 * Verificando se já existe registro 50 com o CFOP do item.  
                 * Caso exista, trabalhar sob ele.
                 */
                for ($i = 0; $i < count($registros50); $i++) {
                    if ($registros50[$i]->getCfop() == $prod->CFOP) {
                        $r50 = &$registros50[$i];
                        break;
                    }
                }

                /*
                 * Caso não exista, cria um.
                 */
                if (!isset($r50)) {
                    $i = count($registros50);

                    $cloneReg50 = clone $reg50;
                    $cloneReg50->setCfop($prod->CFOP);
                    $registros50[$i] = $cloneReg50;

                    $r50 = &$registros50[$i];
                }

                /*
                 * Atualização do valor total
                 */
                $vFrete = isset($prod->vFrete) ? $prod->vFrete : 0;
                $vDesc = isset($prod->vDesc) ? $prod->vDesc : 0;

                $total = $r50->getValorTotal() + $prod->vProd + $vFrete - $vDesc;
                $r50->setValorTotal(round($total, 2));


                /*
                 * Criando registro 54
                 */
                $r54 = new Registro54();
                $r54->setDocumento($r50->getDocumento());
                $r54->setModelo($r50->getModeloNF());
                $r54->setSerie($r50->getSerieNF());
                $r54->setNumeroNF($r50->getNumeroNF());
                $r54->setCfop($prod->CFOP);

                if (isset($item->imposto->ICMS->ICMSSN102))
                    $r54->setCst('102');

                $r54->setNumeroItem($item->nItem);
                $r54->setCodigo($prod->cProd);
                $r54->setQuantidade($prod->qCom);
                $r54->setValorBruto($prod->vProd);

                $r54->setValorDesconto((21.5 / 100) * $prod->vProd); //?? Verificar isso ...

                $this->registros54->add($r54);
            }

            /*
             * Adicionando registros 50
             */
            foreach ($registros50 as $row)
                $this->registros50->add($row);
        }
    }

    /*
     * Getters e Setters
     */

    function getRegistro10() {
        return $this->registro10;
    }

    function getRegistro11() {
        return $this->registro11;
    }

    function setRegistro10(Registro10 $registro10) {
        $this->registro10 = $registro10;
    }

    function setRegistro11(Registro11 $registro11) {
        $this->registro11 = $registro11;
    }

}
