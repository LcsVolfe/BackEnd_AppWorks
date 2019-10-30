

API Padrão
==============================


Requerimentos
------------

Veja o arquivo [composer.json](composer.json) .

Instalação
------------

### Na pasta do projeto executar


```bash
$ composer install
```

### Todos os métodos

Habilitando o método de desenvolvedor

```bash
$ composer development-enable
```

Inicializando o servidor:

```bash
$ php -S 0.0.0.0:8080 -ddisplay_errors=0 -t public public/index.php
# ou use o composer alias:
$ composer serve
```

Gerando migrações:

```bash
$ composer migrations-generate
```

Executando migrações:

```bash
$ composer migrations-execute
```

Voltando para migração anterior:

```bash
$ composer migrations-execute first
```

Verificando status das migrações:

```bash
$ composer migrations-status
```

Autenticação usuário root
--------

```bash
POST /oauth HTTP/1.1
Accept: application/json
Authorization: Basic dGVzdGNsaWVudDp0ZXN0cGFzcw==
Content-Type: application/json

{
    "grant_type": "password",
    "username": "root",
    "password": "root"
}
```

Criar um novo módulo
--------

Criar pasta dentro do diretório module com o nome do módulo, exemplo "Core".
Dentro da pasta Core, criar diretório config e diretório src. Dentro do diretório config, criar arquivo
"module.config.php" como a namespace do módulo, que é o mesmo nome do diretório "Core", o código do arquivo ficará
assim:

```bash
<?php
namespace Core;

return [];

```

Dentro da pasta src do módulo Core (ou qualquer outro módulo) criar o arquivo "Module.php", e nele adicionar
o seguinte código: 

```bash
<?php

namespace Core;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
```

O nome "Core" deve ser substituido pelo nome do módulo.

Após isso, deve-se adicionar a namespace do módulo nas configurações globais,
na pasta config da raiz do projeto existe um arquivo chamado "modules.config.php"
esse arquivo contém a namespace de todos os módulos que são carregados na aplicação,
a namespace do módulo criado deve ser adicionada lá, o arquivo, com o nosso exemplo "Core", ficará dessa forma:

```bash
<?php

return [
    'Zend\Cache',
    'Zend\Form',
    'Zend\Db',
    'Zend\Filter',
    'Zend\Hydrator',
    'Zend\InputFilter',
    'Zend\Paginator',
    'Zend\Router',
    'Zend\Validator',
    'ZF\Apigility',
    'ZF\Apigility\Documentation',
    'ZF\ApiProblem',
    'ZF\Configuration',
    'ZF\OAuth2',
    'ZF\MvcAuth',
    'ZF\Hal',
    'ZF\ContentNegotiation',
    'ZF\ContentValidation',
    'ZF\Rest',
    'ZF\Rpc',
    'ZF\Versioning',
    'DoctrineModule',
    'DoctrineORMModule',
    'Application',
    'Core'
];

```

Após essas configurações deve-se adicionar o módulo no autoload que fica no arquivo "composer.json" na raiz do projeto

```bash
...
  "autoload": {
        "psr-4": {
            "Application\\": "module/Application/src/",
            "Core\\": "module/Core/src/"
        }
    },
    ...
```

E para finalizar, deve-se executar o comando no terminal, na raiz do projeto:


```bash
composer dump-autoload
```

Ferramentas para Qualidade
--------

Instalar:

```bash
$ composer require --dev squizlabs/php_codesniffer
```

O phpcs faz uma verificação no padrão do código e o phpunit é responsável pelos tests unitários:

```bash
# Executar CS:
$ composer cs-check
# Corrigir erros de padrão:
$ composer cs-fix
# Executar testes com phpunit:
$ composer test
```
