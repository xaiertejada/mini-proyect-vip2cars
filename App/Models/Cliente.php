<?php

namespace App\Models;

use PDO;
use Core\Model;

class Cliente extends Model
{

    public static function all()
    {
        $db = static::getDB();

        $sql = "SELECT * FROM clientes ORDER BY id DESC";

        $stmt = $db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $db = static::getDB();

        $sql = "INSERT INTO clientes (nombres, apellidos, documento, correo, telefono)
                VALUES (:nombres, :apellidos, :documento, :correo, :telefono)";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':nombres' => $data['nombres'],
            ':apellidos' => $data['apellidos'],
            ':documento' => $data['documento'],
            ':correo' => $data['correo'],
            ':telefono' => $data['telefono']
        ]);
    }

    public static function findByDocumento(string $documento)
    {
        $db = static::getDB();

        $sql = "SELECT * FROM clientes WHERE documento = :documento LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->execute([':documento' => $documento]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public static function update($id,$data)
    {
        $db = static::getDB();

        $sql = "UPDATE clientes
            SET nombres=:nombres,
                apellidos=:apellidos,
                documento=:documento,
                correo=:correo,
                telefono=:telefono
            WHERE id=:id";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':nombres'=>$data['nombres'],
            ':apellidos'=>$data['apellidos'],
            ':documento'=>$data['documento'],
            ':correo'=>$data['correo'],
            ':telefono'=>$data['telefono'],
            ':id'=>$id
        ]);
    }

}