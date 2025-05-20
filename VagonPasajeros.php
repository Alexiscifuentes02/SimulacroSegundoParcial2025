<?php 
    class VagonPasajeros extends Vagon{
        private $cantidadMaxPasajeros;
        private $cantActualPasajeros;
        private $pesoPromedio;

        // Metodo constructor de la clase VagonPasajeros
        public function __construct($nAnio,$nLargo,$nAncho,$vagonVacio,$nPeso,$cantMax,$cantActual){
            parent::__construct($nAnio,$nLargo,$nAncho,$vagonVacio,$nPeso);
            $this->cantidadMaxPasajeros = $cantMax;
            $this->cantActualPasajeros = $cantActual;
            $this->pesoPromedio = 50;
        }

        // Metodo GET de la clase VagonPasajeros
        public function getCantidadMaxPasajeros(){
            return $this->cantidadMaxPasajeros;
        }

        public function getCantActualPasajeros(){
            return $this->cantActualPasajeros;
        }

        public function getPesoPromedio(){
            return $this->pesoPromedio;
        }

        // Metodo SET de la clase VagonPasajeros
        public function setCantidadMaxPasajeros($cantMax){
            $this->cantidadMaxPasajeros = $cantMax;
        }

        public function setCantActualPasajeros($cantActual){
            $this->cantActualPasajeros = $cantActual;
        }

        public function setPesoPromedio($nPeso){
            $this->pesoPromedio = $nPeso;
        }

        // Metodo que muestra la informacion de la clase VagonPasajeros
        public function __toString(){
            $cadena = parent::__toString();
            return $cadena."Cantidad Maxima de Pasajeros: ".$this->getCantidadMaxPasajeros()."\n".
                           "Cantidad Actual de Pasajeros: ".$this->getCantActualPasajeros()."\n".
                           "Peso Promedio: ".$this->getCantidadMaxPasajeros()."\n";
        }   

        
        //// VERIFICAR ////
        public function  calcularPesoVagon(){
            $pesoVagon = parent::calcularPesoVagon();
            $pesoPasajeros = $this->getCantActualPasajeros() * $this->getPesoPromedio();
            $pesoVagon += $pesoPasajeros;
            parent::setPesoVagon($pesoVagon);
            return $pesoVagon;
        }


       ////VERIFICAR/////
        public function incorporarPasajeroVagon($cantPasajeros){
            $agregado = false;
            $cantMax = $this->getCantidadMaxPasajeros();
            $cantActual = $this->getCantActualPasajeros();
            $espacio = $cantMax - $cantActual;
            if($cantPasajeros <= $espacio){
                $agregado = true;
                $totalPasajeros = $cantActual + $cantPasajeros;
                $this->setCantActualPasajeros($totalPasajeros);
                $this->calcularPesoVagon();
            }
            return $agregado;
        }

        // Metodo que devuelve true si el vagon se encuentra lleno
        public function vagonLleno(){
            $lleno = false;
            $cantMax = $this->getCantidadMaxPasajeros();
            $cantActual = $this->getCantActualPasajeros();
            if($cantActual >= $cantMax){
                $lleno = true;
                echo "HOLAAAAAAAA\n";
            }
            return $lleno;
        }

    }