<?php
namespace CadastrosAPI\V1\Rest\Prestador;

class PrestadorResourceFactory
{
    public function __invoke($services)
    {
        return new PrestadorResource($services->get('PrestadorService'));
    }
}
