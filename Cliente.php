<!-- class cliente -->
<?php

    include_once "Conexion.php";
    // con extends hereda de conexion
    class Cliente  extends Conexion {
        // private $id_tabla;
        // private $nombre_tabla;
        public $id_tabla;
        public $nombre_tabla;


        //CRUD
        //C
        public function create(){
            $this->conectar();
            $pre= mysqli_prepare($this->con, "INSERT INTO tabla1 (id_tabla,nombre_tabla) VALUE (NULL, ?)");
            $pre->bind_param("s",$this->nombre_tabla);
            $pre->execute();
            // $res=$pre->get_result();
        }
        //U
        public function update(){
            $this->conectar();
            $pre=mysqli_prepare($this->con,"UPDATE nombre_tabla SET nombre_tabla=?  WHERE id_tabla = ?");
            echo "<br><p>Update</p><br>";
            echo "Dump de la variable pre";
            var_dump($pre);
            $pre->bind_param("s",$this->nombre_tabla);
            $pre->execute();
        }




        public static function getById($id){
            var_dump($id);
            $conexion= new Conexion();
            $conexion->conectar();

            $pre=mysqli_prepare($conexion->con,"SELECT * FROM tabla1 WHERE id=?");
            
            echo "dump de pre <br>";
            var_dump($pre);
            // $pre->bind_param("i",$id);
            $pre->execute();
            $res=$pre->get_result();
            
            var_dump($res);

            return $res->fetch_object(Cliente::class);

        }

    }


    
