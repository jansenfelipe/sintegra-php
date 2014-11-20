<?php

namespace JansenFelipe\SintegraPHP\Layouts;

use Doctrine\Common\Annotations\AnnotationReader;
use JansenFelipe\Utils\Utils;
use ReflectionClass;

class Layout {

    public function gerarLinha() {

        $reader = new AnnotationReader();
        $reflectionClass = new ReflectionClass($this);

        $registro = $reader->getClassAnnotation($reflectionClass, 'JansenFelipe\SintegraPHP\Annotations\Registro');

        $linha = $registro->tipo;

        foreach ($reflectionClass->getProperties() as $property) {
            $campo = $reader->getPropertyAnnotation($property, 'JansenFelipe\SintegraPHP\Annotations\Campo');
            $property->setAccessible(true);

            $valor = substr($property->getValue($this), 0, $campo->tamanho);

            if ($campo->tipo == 'string')
                $valor = str_pad($valor, $campo->tamanho, ' ', $campo->pad_type);

            if ($campo->tipo == 'numeric') {
                $valor = str_pad(Utils::unmask($valor), $campo->tamanho, '0', $campo->pad_type);
            }

            $linha .= $valor;
        }

        return $linha;
    }

}
