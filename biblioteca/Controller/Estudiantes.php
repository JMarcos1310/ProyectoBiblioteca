<?php
class Estudiantes extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
        parent::__construct();
    }
    public function estudiantes()
    {
        $data = $this->model->selectEstudiante();
        $this->views->getView($this, "listar", $data);
    }
    public function registrar()
    {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $carrera = $_POST['carrera'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $insert = $this->model->insertarEstudiante($codigo,$nombre, $carrera, $direccion, $telefono);
        if ($insert) {
            header("location: " . base_url() . "estudiantes");
            die();    
        }
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editEstudiante($id);
        if ($data == 0) {
            $this->estudiantes();
        } else {
            $this->views->getView($this, "editar", $data);
        }
    }
    public function modificar()
    {
        $id = $_POST['id'];
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $carrera = $_POST['carrera'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $actualizar = $this->model->actualizarEstudiante($codigo, $nombre, $carrera, $direccion, $telefono, $id);
        if ($actualizar) {   
            header("location: " . base_url() . "estudiante"); 
            die();
        }
    }

    public function eliminarEstudiante($id)
    {
        $query = "DELETE FROM estudiante WHERE id = ?";
        $data = array($id);
        $this->delete($query, $data);
        return true;
    }


/*
    public function EstudianteEliminar($id)
    {
        
        $resultado=$this->EstuditesModel->EstudianteEliminar($id);
        if ($resultado) {   
            header("location: " . base_url() . "estudiante"); 
            $clase = "succes";
            die();
        }
        else
        {
            $mensaje = "Error al eliminar el alumno";
            header("location: " . base_url() . "estudiante"); 
           
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,));
            redirect("biblioteca/estudiantess/");
    }   
    
/*
    public function reingresar()
    {
        $id = $_POST['id'];
        $this->model->estadoEstudiante(1, $id);
        header("location: " . base_url() . "estudiante");
        die();
    }
    

    
    public function eliminar($estudiante){
        $resultado = $this->EstudiantesModel->eliminar($estudiante);

        $this->model->EliminarEstudiante(0, $id);

        if($resultado){
            $mensaje = "Alumno eliminado correctamente";
            $clase = "success";
        }
        else
        {
            $mensaje = "Error al eliminar el alumno";
            $clase = "danger";
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,));
            redirect("EstudianteModel");
        }

*/
    
}
?>