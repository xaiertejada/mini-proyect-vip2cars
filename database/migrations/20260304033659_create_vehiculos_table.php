<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateVehiculosTable extends AbstractMigration
{

    public function change(): void
    {
        $table = $this->table('vehiculos');

        $table
            ->addColumn('cliente_id', 'integer', ['signed' => false])
            ->addColumn('placa', 'string', ['limit' => 15])
            ->addColumn('marca', 'string', ['limit' => 80])
            ->addColumn('modelo', 'string', ['limit' => 80])
            ->addColumn('anio_fabricacion', 'year')
            ->addColumn('created_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP'
            ])

            ->addIndex(['placa'], ['unique' => true])
            ->addIndex(['cliente_id'])

            ->addForeignKey(
                'cliente_id',
                'clientes',
                'id',
                [
                    'delete' => 'CASCADE',
                    'update' => 'NO_ACTION'
                ]
            )

            ->create();
    }
}
