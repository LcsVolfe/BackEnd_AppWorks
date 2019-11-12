<?php
namespace CadastrosAPI\V1\Rest\Usuario;

class UsuarioResourceFactory
{
    public function __invoke($services)
    {
        return new UsuarioResource($services->get('UsuarioService'));
    }
}
