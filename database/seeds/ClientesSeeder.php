<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class ClientesSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'nombres' => 'Juan',
                'apellidos' => 'Perez',
                'documento' => '12345678',
                'correo' => 'juan@test.com',
                'telefono' => '999111222'
            ]
        ];

        $this->table('clientes')->insert($data)->save();
    }
}
