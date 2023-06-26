<?php
class EstudiantesModel extends Mysql {
    public function __construct()
    {
        parent::__construct();
    }

    public function selectEstudiante()
    {
        $sql = "SELECT * FROM estudiante";
        $res = $this->select_all($sql);
        return $res;
    }

    public function insertarEstudiante(String $codigo, String $nombre, String $carrera, String $direccion, String $telefono)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->carrera = $carrera;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $query = "INSERT INTO estudiante (codigo, nombre, carrera, direccion, telefono) VALUES (?, ?, ?, ?, ?)";
        $data = array($this->codigo, $this->nombre, $this->carrera, $this->direccion, $this->telefono);
        $this->insert($query, $data);
        return true;
    }

    public function editEstudiante(int $id)
    {
        $sql = "SELECT * FROM estudiante WHERE id = $id";
        $res = $this->select($sql);
        return $res;
    }

    public function actualizarEstudiante(String $codigo, String $nombre, String $carrera, String $direccion, String $telefono, int $id)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->carrera = $carrera;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->id = $id;
        $query = "UPDATE estudiante SET codigo = ?, nombre = ?, carrera = ?, direccion = ?, telefono = ? WHERE id = ?";
        $data = array($this->codigo, $this->nombre, $this->carrera, $this->direccion, $this->telefono, $this->id);
        $this->update($query, $data);
        return true;
    }

    public function eliminarEstudiante($id)
    {
        $sql = "DELETE FROM estudiante WHERE id = $id";
        $res = $this->execute_single_query($sql);
        return $res;
    }
}


        
/*
    class EstudiantesController {
        public function eliminarEstudiante($id) {
            // Crear una instancia del modelo
            $estudiantesModel = new EstudiantesModel();
    
            // Llamar a la función del modelo para eliminar el estudiante
            $resultado = $estudiantesModel->eliminarEstudiante($id);
    
            if ($resultado) {
                // Redireccionar a la página de listado de estudiantes o mostrar un mensaje de éxito
            } else {
                // Mostrar un mensaje de error
            }
        }
    }
   
    public function EstudianteEliminar($id){
        return $this->db->delete("estudiante", array("id" => $id));
        
        $SSQL = "DELETE FROM estudiante WHERE codigo = ?, nombre = ?, carrera = ?, direccion = ?, telefono = ?  WHERE id = ?";
        $data = array($this->codigo,  $this->nombre, $this->carrera, $this->direccion, $this->telefono, $this->id);
        $this->update($query, $data);
        return true;
        */
        
    

    /*public function EliminarEstudiante(int $estado, int $id)
    /* {
        $this->estado = $estado;
        $this->id = $id;
        $query = "UPDATE estudiante SET estado = ? WHERE id = ?";
        $data = array($this->estado, $this->id);
        $this->update($query, $data);
        return true;
    }
    -->
    */

?>