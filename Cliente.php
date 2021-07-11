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
            // $pre=mysqli_prepare($this->con,"UPDATE nombre_tabla SET nombre_tabla=?  WHERE id_tabla = ?;");
            
            $pre=mysqli_prepare($this->con,"UPDATE tabla1 SET id_tabla=null, nombre_tabla=?  WHERE id_tabla = ?");
            
            echo "<br><p>Hace el Update</p><br> ";
            echo "Dump de la variable pre <br> ";
            var_dump($pre);
            echo "<br>";
            $pre->bind_param("is",$this->id_tabla,$this->nombre_tabla);
            var_dump($pre);
            $pre->execute();
        }

        /* public function delete(){
        $this->conectar();
        $pre=mysqli_prepare($this->con,"DELETE FROM tabla1 WHERE id_tabla=?");
        $pre->bind_param("i",$this->id_tabla);
        // $pre->execute();
        } */



        public function all(){
            $conex= new Conexion();
            $conex-> conectar();
            $pre=mysqli_prepare($conex->con,"SELECT * FROM tabla1" );
            $pre->execute();
            $res=$pre->get_result();
            $clientes=[];
            while ($cliente=$res->fetch_object(Cliente::class))
            array_push($clientes,$cliente);
            var_dump($clientes);
            return $clientes; 
        }





        public static function getById($id){
            var_dump($id);
            
            $conexion= new Conexion();
            $conexion->conectar();

            $pre=mysqli_prepare($conexion->con,"SELECT * FROM tabla1 WHERE id_tabla=?");
            
            // echo "dump de pre  con el contenido de la consulta <br>";
            // echo "esto es el "
            // var_dump($pre);
            
            // echo "<br>";
            $pre->bind_param("i",$id);
            // var_dump($pre);
            // falla en bool?
            
            $pre->execute();
            $res=$pre->get_result();
            
            var_dump($res);

            return $res->fetch_object(Cliente::class);

        }

    }


    
