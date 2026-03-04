<?php

use Phinx\Seed\AbstractSeed;

class VehiculosSeeder extends AbstractSeed
{
    public function run(): void
    {

        $data = [

            [
                'cliente_id' => 1,
                'placa' => 'ABC123',
                'marca' => 'Toyota',
                'modelo' => 'Corolla',
                'anio_fabricacion' => 2018
            ],

            [
                'cliente_id' => 1,
                'placa' => 'XYZ456',
                'marca' => 'Nissan',
                'modelo' => 'Sentra',
                'anio_fabricacion' => 2020
            ],

            [
                'cliente_id' => 1,
                'placa' => 'LMN789',
                'marca' => 'Hyundai',
                'modelo' => 'Elantra',
                'anio_fabricacion' => 2017
            ]

        ];

        $vehiculos = $this->table('vehiculos');

        $vehiculos->insert($data)
            ->save();
    }
}