<?php
    include_once 'Vagon.php';
    include_once 'VagonCarga.php';
    include_once 'VagonPasajeros.php';
    include_once 'Locomotora.php';
    include_once 'Formacion.php';

    //|1|
    $objetoLocomotora = new Locomotora(188000,140);

    //|2|
    $objetoVagon1 = new VagonPasajeros(2000,80,30,15000,30,25);
    $objetoVagon2 = new VagonCarga(2001,30,201,15000,90000,55000);
    $objetoVagon3 = new VagonPasajeros(2002,140,230,15000,50,50);

    //|3|
    $objetoFormacion = new Formacion($objetoLocomotora,10);

    $vagonIncorporado1 = $objetoFormacion->incorporarVagonFormacion($objetoVagon1);
    if($vagonIncorporado1){
        echo "Vagon Incorporado\n";
    }else{
        echo "No se pudo incorporar el vagon\n";
    }

    $vagonIncorporado2 = $objetoFormacion->incorporarVagonFormacion($objetoVagon2);
    if($vagonIncorporado2){
        echo "Vagon Incorporado\n";
    }else{
        echo "No se pudo incorporar el vagon\n";
    }



    //|4|
    $incorporado = $objetoFormacion->incorporarPasajeroFormacion(6);
    if($incorporado){
        echo "Los pasajeros fueron incorporados \n";
    }else{
        echo "No se pudieron incorporar los pasajeros \n";
    }

    //|5|
    print_r($objetoVagon1);
    print_r($objetoVagon2);
    print_r($objetoVagon3);

    //|6|
    $incorporado = $objetoFormacion->incorporarPasajeroFormacion(14);
    if($incorporado){
        echo "Los pasajeros fueron incorporados \n";
    }else{
        echo "No se pudieron incorporar los pasajeros \n";
    }

    //|7|
    print_r($objetoLocomotora);

    //|8|
    $promedio = $objetoFormacion->promedioPasajeroFormacion();
    echo "El Promedio es: ".$promedio."\n";

    //|9|
    $pesoFormacion = $objetoFormacion->pesoFormacion();
    echo "Peso Formacion: ".$pesoFormacion."\n";

    //|10|
    print_r($objetoVagon1);
    print_r($objetoVagon2);
    print_r($objetoVagon3);

    // ||
    $vagon = $objetoFormacion->retornarVagonSinCompletar();
    echo "Vagon que no se encuentra lleno: \n\n".$vagon;

    
