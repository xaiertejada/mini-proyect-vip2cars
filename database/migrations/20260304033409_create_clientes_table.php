<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateClientesTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('clientes');

        $table
            ->addColumn('nombres', 'string', ['limit' => 120])
            ->addColumn('apellidos', 'string', ['limit' => 120])
            ->addColumn('documento', 'string', ['limit' => 20])
            ->addColumn('correo', 'string', ['limit' => 150])
            ->addColumn('telefono', 'string', ['limit' => 20])
            ->addColumn('created_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP'
            ])

            ->addIndex(['documento'], ['unique' => true])
            ->addIndex(['correo'], ['unique' => true])

            ->create();
    }
}