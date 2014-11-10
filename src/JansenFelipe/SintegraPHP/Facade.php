<?php

namespace JansenFelipe\SintegraPHP;

class Facade extends \Illuminate\Support\Facades\Facade {

    protected static function getFacadeAccessor() {
        return 'sintegra_gratis';
    }

}
