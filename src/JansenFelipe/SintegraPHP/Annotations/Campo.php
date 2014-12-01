<?php

namespace JansenFelipe\SintegraPHP\Annotations;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 */
class Campo extends Annotation {

    public $tipo;
    public $tamanho;
    public $pad_type = STR_PAD_RIGHT;

}
