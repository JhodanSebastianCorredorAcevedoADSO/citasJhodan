<?php

namespace Adso\controllers;

use Adso\Libs\controller;

class ProfileController extends Controller{

    function index()
    {
        $data = [
            "titulo" => "Imagenes",
            "subtitulo" => "Subir Imagenes",
            "menu" => true  
        ];
        
        $this->view('imagenes/update', $data, 'app');
    }

    function validate()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verificar si se ha cargado un archivo
            if (isset($_FILES["fileTest"]) && $_FILES["fileTest"]["error"] == UPLOAD_ERR_OK) {

                $uploadDir = dirname(__FILE__) . "/files"; 
                $uploadFile = $uploadDir . basename($_FILES["fileTest"]["name"]);

                // Mover el archivo desde la ubicación temporal a la ubicación deseada
                if (move_uploaded_file($_FILES["fileTest"]["tmp_name"], $uploadFile)) {

                    echo "El archivo se ha cargado correctamente.";

                } else {
                    echo "Hubo un error al subir el archivo.";
                }
                
            } else {
                echo "No se seleccionó ningún archivo o se produjo un error.";
            }
        }
    }

}