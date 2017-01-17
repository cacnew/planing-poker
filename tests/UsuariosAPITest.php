<?php

class UsuariosAPITest extends EntityAPITest
{
    protected function setUp()
    {
        $this->entityData = [
            'nomeUsuario' => 'usuarioTeste',
            'senha' => '123456',
        ];
        $this->uri = 'api/user/';
        parent::setUp();
    }
}