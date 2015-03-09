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

            if(!is_array($property->getValue($this)))
                $valor = substr($property->getValue($this), 0, $campo->tamanho);
            else
                $valor = $property->getValue($this);

            if(!is_array($valor)){
                if ($campo->tipo == 'string'){
                    $valor = str_pad($valor, $campo->tamanho, ' ', $campo->pad_type);
                }

                if ($campo->tipo == 'numeric') {
                    $valor = str_pad(Utils::unmask($valor), $campo->tamanho, '0', $campo->pad_type);
                }
            }else{
                $valorPT = "";
                
                // exit;
                foreach ($valor as $key => $value) {
                    // print_r($value);
                    $k = str_pad(Utils::unmask($key), 2, '0', $campo->pad_type);   
                    $v = str_pad(Utils::unmask($value['valor']), 8, '0', $campo->pad_type);  
                    $valorPT .= $k . $v; 
                }
                $valor = $valorPT;

            }

            $linha .= $valor;
        }

        return $linha;
    }

}
