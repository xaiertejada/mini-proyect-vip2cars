<?php

namespace App\Models;

use PDO;
use Core\Model;

class Vehiculo extends Model
{

    public static function all($limit = 10, $offset = 0)
    {
        $db = static::getDB();

        $sql = "SELECT v.*, c.nombres, c.apellidos, c.documento
            FROM vehiculos v
            INNER JOIN clientes c ON v.cliente_id = c.id
            ORDER BY v.id DESC
            LIMIT :limit OFFSET :offset";

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function placaExiste($placa)
    {
        $db = static::getDB();

        $sql = "SELECT id FROM vehiculos WHERE placa = :placa LIMIT 1";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            ':placa' => $placa
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $db = static::getDB();

        // evitar placas duplicadas
        if(self::placaExiste($data['placa'])){
            return false;
        }

        $sql = "INSERT INTO vehiculos 
                (cliente_id, placa, marca, modelo, anio_fabricacion)
                VALUES
                (:cliente_id, :placa, :marca, :modelo, :anio)";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':cliente_id' => $data['cliente_id'],
            ':placa' => strtoupper($data['placa']),
            ':marca' => $data['marca'],
            ':modelo' => $data['modelo'],
            ':anio' => $data['anio_fabricacion']
        ]);
    }

    public static function buscar($termino)
    {
        $db = static::getDB();

        $sql = "SELECT v.*, c.nombres, c.apellidos, c.documento
                FROM vehiculos v
                INNER JOIN clientes c ON v.cliente_id = c.id
                WHERE v.placa LIKE :t
                OR c.documento LIKE :t
                ORDER BY v.id DESC";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            ':t' => "%$termino%"
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findWithCliente($id)
    {
        $db = static::getDB();

        $sql = "SELECT v.*, c.nombres, c.apellidos, c.documento, c.correo, c.telefono
            FROM vehiculos v
            INNER JOIN clientes c ON v.cliente_id = c.id
            WHERE v.id = :id";

        $stmt = $db->prepare($sql);
        $stmt->execute([':id'=>$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id,$data)
    {
        $db = static::getDB();

        $sql = "UPDATE vehiculos 
                SET placa=:placa,
                    marca=:marca,
                    modelo=:modelo,
                    anio_fabricacion=:anio
                WHERE id=:id";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':placa'=>strtoupper($data['placa']),
            ':marca'=>$data['marca'],
            ':modelo'=>$data['modelo'],
            ':anio'=>$data['anio_fabricacion'],
            ':id'=>$id
        ]);
    }

    public static function delete($id)
    {
        $db = static::getDB();

        $sql = "DELETE FROM vehiculos WHERE id=:id";

        $stmt = $db->prepare($sql);

        return $stmt->execute([':id'=>$id]);
    }

    public static function countAll()
    {
        $db = static::getDB();

        $sql = "SELECT COUNT(*) as total FROM vehiculos";

        $stmt = $db->query($sql);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int)$row['total'];
    }

}