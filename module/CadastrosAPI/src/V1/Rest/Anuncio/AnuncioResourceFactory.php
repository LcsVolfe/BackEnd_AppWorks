<?php
namespace CadastrosAPI\V1\Rest\Anuncio;

class AnuncioResourceFactory
{
    public function __invoke($services)
    {
        return new AnuncioResource($services->get('AnuncioService'));
    }
}
