<?php 
    class Locomotora{
        private $peso;
        private $velocidadMaxima;

        // Metodo constructor de la clase Locomotora
        public function __construct($nPeso,$nVelocidad){
            $this->peso = $nPeso;
            $this->velocidadMaxima = $nVelocidad;
        }

        // Metodos GET de la clase Locomotora
        public function getPeso(){
            return $this->peso;
        }

        public function getVelocidad(){
            return $this->velocidadMaxima;
        }


        // Metodos SET de la clase Vagon
        public function setPeso($nPeso){
            $this->peso = $nPeso;
        }

        public function setVelocidad($nVelocidad){
            $this->velocidadMaxima = $nVelocidad;
        }

        // Metodo que muestra la informacion de la clase Locomotora
        public function __toString(){
            return "Peso: ".$this->getPeso()."\n". 
                   "Velocidad Maxima: ".$this->getVelocidad()."\n";
        }
    }