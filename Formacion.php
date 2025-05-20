<?php 
    class Formacion{
        private $objetoLocomotora;
        private $arrayVagones;
        private $maxVagones;

        // Metodo constructor de la clase Formacion
        public function __construct($objLocomotora,$maxVagones){
            $this->objetoLocomotora = $objLocomotora ;
            $this->arrayVagones = [];
            $this->maxVagones = $maxVagones;
        }

        // Metodos GET de la clase Formacion
        public function getObjetoLocomotora(){
            return $this->objetoLocomotora;
        }

        public function getArrayVagones(){
            return $this->arrayVagones;
        }

        public function getMaxVagones(){
            return $this->maxVagones;
        }


        // Metodos SET de la clase Formacion
        public function setObjetoLocomotora($objLocomotora){
            $this->objetoLocomotora = $objLocomotora;
        }

        public function setArrayVagones($colVagones){
            $this->arrayVagones = $colVagones;
        }

        public function setMaxVagones($maxVagones){
            $this->maxVagones = $maxVagones;
        }


        // Metodo que muestra la informacion de la clase Formacion
        public function __toString(){
            return "Locomotora: \n".$this->getObjetoLocomotora()."\n". 
                   "Vagones: \n".$this->mostrarVagones()."\n".
                   "Maximo de Vagones: ".$this->getMaxVagones()."\n";
        }


        // Metodo que muestra la coleccion de Cuotas
        public function mostrarVagones(){
            $cadena = "";
            $vagones = $this->getArrayVagones();
            foreach($vagones as $vagon){
                $cadena = $cadena. $vagon. "\n";
            }
            return $cadena;
        }

        /* Metodo que recibe la cantidad de pasajeros que se desea incorporar a la formación y busca 
        dentro de la colección de vagones aquel vagón capaz de incorporar esa cantidad de pasajeros*/
        public function incorporarPasajeroFormacion($cantPasajeros){
            $hayVagon = false;
            $encontrado = false;
            $i = 0;
            $colVagones = $this->getArrayVagones();
            if(is_array($colVagones)){
                $cantVagones = count($colVagones);
                while($i < $cantVagones && !$encontrado){
                        $unVagon = $colVagones[$i];
                        if($unVagon instanceof VagonPasajeros){
                            $incorporaPasajero = $unVagon->incorporarPasajeroVagon($cantPasajeros);
                            if($incorporaPasajero){
                                $encontrado = true;
                            }
                        }
                        $i++;
                }
            }  
                
            if($encontrado){
                $hayVagon = true;
            }

            return $hayVagon;
        }

        // Metodo que recibe por parámetro un objeto vagón y lo incorpora a la formación
        public function incorporarVagonFormacion($objVagon){
            $incorporado = false;
            $colVagones = $this->getArrayVagones();
            if(is_array($colVagones)){
                $cantVagones = count($colVagones);
                if($cantVagones < $this->getMaxVagones()){
                    array_push($colVagones,$objVagon);
                    $this->setArrayVagones($colVagones);                
                    $incorporado = true;
                }
            }
            return $incorporado;
        }

        /* Metodo que recorre la colección de vagones y retorna un valor que represente el promedio de 
        pasajeros por vagón que se encuentran en la formación */
        public function promedioPasajeroFormacion(){
            $totalPasajeros = 0;
            $cantVagones = 0;
            $promedio = 0;
            $colVagones = $this->getArrayVagones();
            foreach($colVagones as $vagon){
                if($vagon instanceof VagonPasajeros){
                    $cantPasajeros = $vagon->getCantActualPasajeros();
                    $totalPasajeros += $cantPasajeros;
                    $cantVagones++;
                }
            }

            if($cantVagones != 0){
                $promedio = $totalPasajeros / $cantVagones;
            }
            
            return $promedio;
        }

        // Metodo que retorna el peso de la formación completa
        public function pesoFormacion(){
            $pesoTotal = 0;
            $colVagones = $this->getArrayVagones();
            foreach($colVagones as $vagon){
                $pesoTotal += $vagon->calcularPesoVagon();
            }

            return $pesoTotal; 
        }

        // Metodo que retorna el primer vagón de la formación que aún no se encuentra completo
        public function retornarVagonSinCompletar(){
            $colVagones = $this->getArrayVagones();
            $encontrado = false;
            $i = 0;
            $vagon = null;
            if(is_array($colVagones)){
                while($i < count($colVagones) && !$encontrado){
                    $estaLleno = $colVagones[$i]->vagonLleno();
                    if(!$estaLleno){
                        $vagon = $colVagones[$i];
                        $encontrado = true;
                    }
                    $i++;
                }
            }
            return $vagon;
        }
    }