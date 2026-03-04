<?php

namespace App\Validators;

class VehiculoValidator
{
    public static function validate(array $data): array
    {
        $errors = [];

        if (empty(trim($data['placa'] ?? ''))) {
            $errors['placa'] = 'La placa es obligatoria';
        } elseif (!preg_match('/^[A-Z0-9\-]{5,10}$/i', $data['placa'])) {
            $errors['placa'] = 'Formato de placa inválido';
        }

        if (empty(trim($data['marca'] ?? ''))) {
            $errors['marca'] = 'La marca es obligatoria';
        }

        if (empty(trim($data['modelo'] ?? ''))) {
            $errors['modelo'] = 'El modelo es obligatorio';
        }

        if (empty($data['anio_fabricacion'])) {
            $errors['anio_fabricacion'] = 'El año es obligatorio';
        } else {
            $anio = (int)$data['anio_fabricacion'];
            $actual = (int)date('Y');
            if ($anio < 1950 || $anio > $actual) {
                $errors['anio_fabricacion'] = 'Año inválido';
            }
        }

        return $errors;
    }
}