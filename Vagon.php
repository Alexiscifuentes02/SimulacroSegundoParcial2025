<?php
    class Vagon{
        private $anioInstalacion;
        private $largo;
        private $ancho;
        private $pesoVagon;
        private $pesoVagonVacio;

        // Metodo constructor de la clase Vagon
        public function __construct($nAnio,$nLargo,$nAncho,$vagonVacio){
            $this->anioInstalacion = $nAnio;
            $this->largo = $nLargo;
            $this->ancho = $nAncho;
            $this->pesoVagonVacio = $vagonVacio;
            $this->pesoVagon = $vagonVacio;
        }

        // Metodos GET de la clase Vagon
        public function getAnioInstalacion(){
            return $this->anioInstalacion;
        }

        public function getLargoVagon(){
            return $this->largo;
        }

        public function getAnchoVagon(){
            return $this->ancho;
        }

        public function getVagonVacio(){
            return $this->pesoVagonVacio;
        }

        public function getPesoVagon(){
            return $this->pesoVagon;
        }


        // Metodos SET de la clase Vagon
        public function setAnioInstalacion($nAnio){
            $this->anioInstalacion = $nAnio;
        }

        public function setLargoVagon($nLargo){
            $this->largo = $nLargo;
        }

        public function setAnchoVagon($nAncho){
            $this->ancho = $nAncho;
        }

        public function setVagonVacio($vagonVacio){
            $this->pesoVagonVacio  = $vagonVacio;
        }

        public function setPesoVagon($nPeso){
            $this->pesoVagon  = $nPeso;
        }

        // Metodo que muestra la informacion de la clase Vagon
        public function __toString(){
            return "Anio de Instalacion: ".$this->getAnioInstalacion()."\n". 
                   "Largo del Vagon: ".$this->getLargoVagon()."\n".
                   "Ancho del Vagon: ".$this->getAnchoVagon()."\n".
                   "Peso del Vagon vacio: ".$this->getPesoVagon()."\n". 
                   "Peso del Vagon: ".$this->getPesoVagon()."\n\n";
        }

        public function calcularPesoVagon(){
            $pesoVagon = $this->getPesoVagon();
            return $pesoVagon;
        } 

        public function vagonLleno(){
            $estaCompleto = true;
            return $estaCompleto;
        }

        
    }
