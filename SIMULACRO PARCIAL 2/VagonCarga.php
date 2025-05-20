<?php 
    class VagonCarga extends Vagon{
        private $pesoMaximo;
        private $pesoActual;
        private $indice;

        // Metodo constructor de la clase VagonCarga
        public function __construct($nAnio,$nLargo,$nAncho,$vagonVacio,$nPeso,$pesoMaximo,$actPeso){
            parent::__construct($nAnio,$nLargo,$nAncho,$vagonVacio,$nPeso);
            $this->pesoMaximo = $pesoMaximo;
            $this->pesoActual = $actPeso;
            $this->indice = 0.2 * $actPeso;
        }

        // Metodo GET de la clase VagonCarga
        public function getPesoMaximo(){
            return $this->pesoMaximo;
        }

        public function getPesoActual(){
            return $this->pesoActual;
        }

        public function getIndice(){
            return $this->indice;
        }

        // Metodo SET de la clase VagonPasajeros
        public function setPesoMaximo($maxPeso){
            $this->pesoMaximo = $maxPeso;
        }

        public function setPesoActual($actPeso){
            $this->pesoActual = $actPeso;
        }

        public function setIndice($nIndice){
            $this->indice = $nIndice;
        }

        // Metodo que muestra la informacion de la clase VagonPasajeros
        public function __toString(){
            $cadena = parent::__toString();
            return $cadena." Peso Maximo para Transportar: ".$this->getPesoMaximo()."\n". 
                           " Peso Carga Transportada: ".$this->getPesoActual()."\n". 
                           " Indice: ".$this->getIndice()."\n";
        }

        //// VERIFICAR ////
        public function  calcularPesoVagon(){
            $pesoVagon = parent::calcularPesoVagon();
            $indice = $this->getIndice();
            $pesoActual = $this->getPesoActual();
            $pesoVagon += $indice + $pesoActual;
            parent::setPesoVagon($pesoVagon);
            return $pesoVagon;
        }

        /////
        public function  incorporarCargaVagon($cantCarga){
            $agregado = false;
            $cantMax = $this->getPesoMaximo();
            $cantActual = $this->getPesoActual();
            $espacio = $cantMax - $cantActual;
            if($cantCarga <= $espacio){
                $agregado = true;
                $totalCarga = $cantCarga + $cantActual;
                $this->setPesoActual($totalCarga);
                $this->calcularPesoVagon();
            }
            return $agregado;
        }

        // Metodo que devuelve true si el vagon se encuentra lleno
        public function vagonLleno(){
            $lleno = false;
            $cantMax = $this->getPesoMaximo();
            $cantActual = $this->getPesoActual();
            if($cantActual >= $cantMax){
                $lleno = true;
            }
            return $lleno;
        }
    }