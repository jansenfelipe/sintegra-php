<?php

namespace JansenFelipe\SintegraPHP;

use Doctrine\Common\Annotations\AnnotationReader;
use JansenFelipe\SintegraPHP\Annotations\Campo;
use JansenFelipe\SintegraPHP\Annotations\Registro;
use ReflectionClass;

class SintegraPHP {

    public static function gerarLinha($layout) {
        new Registro(array());
        new Campo(array());

        $reader = new AnnotationReader();
        $reflectionClass = new ReflectionClass($layout);

        $registro = $reader->getClassAnnotation($reflectionClass, 'JansenFelipe\SintegraPHP\Annotations\Registro');

        $linha = $registro->tipo;

        foreach ($reflectionClass->getProperties() as $property) {
            $campo = $reader->getPropertyAnnotation($property, 'JansenFelipe\SintegraPHP\Annotations\Campo');
            $property->setAccessible(true);

            $valor = substr($property->getValue($layout), 0, $campo->tamanho);

            if ($campo->tipo == 'string')
                $valor = str_pad($valor, $campo->tamanho, ' ', $campo->pad_type);

            if ($campo->tipo == 'numeric')
                $valor = str_pad($valor, $campo->tamanho, '0', $campo->pad_type);

            $linha .= $valor;
        }

        return $linha;
    }

}
