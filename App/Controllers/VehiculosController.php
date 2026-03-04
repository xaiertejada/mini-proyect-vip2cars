<?php

namespace App\Controllers;

use Core\View;
use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Validators\ClienteValidator;
use App\Validators\VehiculoValidator;

class VehiculosController extends \Core\Controller
{
    public function index()
    {
        $pagina = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        if ($pagina < 1) {
            $pagina = 1;
        }

        $limite = 10;
        $offset = ($pagina - 1) * $limite;

        if (isset($_GET['buscar']) && $_GET['buscar'] != '') {

            $vehiculos = Vehiculo::buscar($_GET['buscar']);
            $totalPaginas = 1;

        } else {

            $vehiculos = Vehiculo::all($limite, $offset);

            $total = Vehiculo::countAll();

            $totalPaginas = ceil($total / $limite);
        }

        View::render('layout.php');
        View::render('Vehiculos/index.php', [
            'vehiculos' => $vehiculos,
            'pagina' => $pagina,
            'totalPaginas' => $totalPaginas
        ]);
    }

    public function create()
    {
        View::render('layout.php');
        View::render('Vehiculos/create.php');
    }

    public function store()
    {
        $data = $_POST;

        $errorsCliente = ClienteValidator::validate($data);
        $errorsVehiculo = VehiculoValidator::validate($data);
        $errors = array_merge($errorsCliente, $errorsVehiculo);

        if (!empty($errors)) {
            View::render('Vehiculos/create.php', [
                'errors' => $errors,
                'old' => $data
            ]);
            return;
        }

        $cliente = Cliente::findByDocumento($data['documento']);

        if (!$cliente) {
            Cliente::create($data);
            $cliente = Cliente::findByDocumento($data['documento']);
        }

        $data['cliente_id'] = $cliente['id'];

        Vehiculo::create($data);

        header('Location: /');
        exit;
    }

    public function edit()
    {
        $id = $this->route_params['id'];
        $vehiculo = Vehiculo::findWithCliente($id);

        View::render('layout.php');
        View::render('Vehiculos/edit.php',[
            'vehiculo'=>$vehiculo
        ]);
    }

    public function update()
    {
        $id = $this->route_params['id'];
        $vehiculo = Vehiculo::findWithCliente($id);
        Vehiculo::update($id, $_POST);
        Cliente::update($vehiculo['cliente_id'], $_POST);

        header('Location:/');
        exit;
    }

    public function delete()
    {
        $id = $this->route_params['id'];
        Vehiculo::delete($id);

        header('Location:/');
        exit;
    }

}