<?php

namespace App\Validators;

class ClienteValidator
{
    public static function validate(array $data): array
    {
        $errors = [];

        if (empty(trim($data['nombres'] ?? ''))) {
            $errors['nombres'] = 'Los nombres son obligatorios';
        }

        if (empty(trim($data['apellidos'] ?? ''))) {
            $errors['apellidos'] = 'Los apellidos son obligatorios';
        }

        if (empty(trim($data['documento'] ?? ''))) {
            $errors['documento'] = 'El documento es obligatorio';
        } elseif (!preg_match('/^[0-9A-Za-z\-]{6,20}$/', $data['documento'])) {
            $errors['documento'] = 'Formato de documento inválido';
        }

        if (empty(trim($data['correo'] ?? ''))) {
            $errors['correo'] = 'El correo es obligatorio';
        } elseif (!filter_var($data['correo'], FILTER_VALIDATE_EMAIL)) {
            $errors['correo'] = 'Correo inválido';
        }

        if (empty(trim($data['telefono'] ?? ''))) {
            $errors['telefono'] = 'El teléfono es obligatorio';
        } elseif (!preg_match('/^[0-9+\-\s]{7,20}$/', $data['telefono'])) {
            $errors['telefono'] = 'Teléfono inválido';
        }

        return $errors;
    }
}