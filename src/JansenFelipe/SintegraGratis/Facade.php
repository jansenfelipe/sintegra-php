<?php

namespace JansenFelipe\SintegraGratis;

class Facade extends \Illuminate\Support\Facades\Facade {

    protected static function getFacadeAccessor() {
        return 'sintegra_gratis';
    }

}
