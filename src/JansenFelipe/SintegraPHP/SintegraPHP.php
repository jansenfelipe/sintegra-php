<?php

namespace JansenFelipe\SintegraPHP;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Collections\ArrayCollection;
use Exception;
use JansenFelipe\SintegraPHP\Layouts\Layout;
use JansenFelipe\SintegraPHP\Layouts\Registro10;
use JansenFelipe\SintegraPHP\Layouts\Registro11;
use JansenFelipe\SintegraPHP\Layouts\Registro50;
use JansenFelipe\Utils\Utils;
use ReflectionClass;

class SintegraPHP {

    private $registro10;
    private $registro11;
    private $registros50;

    function __construct() {
        $this->registros50 = new ArrayCollection();

        AnnotationRegistry::registerAutoloadNamespace(
                'JansenFelipe\SintegraPHP\Annotations', './src'
        );
    }

    public function gerar() {
        if (is_null($this->registro10))
            throw new Exception('Registro 10 não informado.');

        if (is_null($this->registro11))
            throw new Exception('Registro 11 não informado.');

        $data = $this->gerarLinha($this->registro10) . PHP_EOL;
        $data .= $this->gerarLinha($this->registro11) . PHP_EOL;

        if ($this->registros50->count() > 0) {
            foreach ($this->registros50->getValues() as $registro50) {
                $data .= $this->gerarLinha($registro50) . PHP_EOL;
            }
        }

        return $data;
    }

    private function gerarLinha(Layout $layout) {

        $reader = new AnnotationReader();
        $reflectionClass = new ReflectionClass($layout);

        $registro = $reader->getClassAnnotation($reflectionClass, 'JansenFelipe\SintegraPHP\Annotations\Registro');

        $linha = $registro->tipo;

        foreach ($reflectionClass->getProperties() as $property) {
            $campo = $reader->getPropertyAnnotation($property, 'JansenFelipe\SintegraPHP\Annotations\Campo');
            $property->setAccessible(true);

            $valor = Utils::unmask(substr($property->getValue($layout), 0, $campo->tamanho));

            if ($campo->tipo == 'string')
                $valor = str_pad($valor, $campo->tamanho, ' ', $campo->pad_type);

            if ($campo->tipo == 'numeric')
                $valor = str_pad(Utils::unmask($valor), $campo->tamanho, '0', $campo->pad_type);

            $linha .= $valor;
        }

        return $linha;
    }

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

    function addRegistro50(Registro50 $registro50) {
        $this->registros50->add($registro50);
    }

    function removeRegistro50(Registro50 $registro50) {
        $this->registros50->removeElement($registro50);
    }

}
