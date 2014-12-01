# Sintegra PHP

Com esse pacote você poderá gerar gratuitamente o arquivo Sintegra para envio a Sefaz.

[Saiba mais sobre o Convênio 57/95](http://www1.fazenda.gov.br/confaz/confaz/convenios/icms/1995/CV057_95_Manual_de_Orientacao.htm)

### Como usar

Adicione no seu arquivo `composer.json` o seguinte registro na chave `require`

    "jansenfelipe/sintegra-php": "1.0.*@dev"

Execute

    $ composer update

Adicione o autoload.php do composer no seu arquivo PHP.

    require_once 'vendor/autoload.php';  