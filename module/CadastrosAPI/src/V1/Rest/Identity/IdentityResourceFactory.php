<?php
namespace CadastrosAPI\V1\Rest\Identity;

class IdentityResourceFactory
{
    public function __invoke($services)
    {
        return new IdentityResource($services->get('IdentityService'));
    }
}
