<?php encabezado() ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h5 class="text-center">Alumnos</h5>
            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-primary mb-2" type="button" data-toggle="modal" data-target="#nuevoEstudiante"><i class="fas fa-user-plus"></i></button>
                  
                    <a href = "http://localhost/importar/index.php">
                    <button class="btn btn-primary mb-2" type="button"  name="Cargar excel"> Cargar Excel<i i></button>
                    </a>

                    <div class="table-responsive">
                        <table class="table table-light mt-4" id="table">
                            <thead class="thead-dark">
                                <tr>
                                    
                                    <th>Matricula</th>
                                    <th>Nombre Completo</th>
                                    <th>Licenciatura</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $estudiante) {
                                    if ($estudiante['estado'] == 1) {
                                        $estado = '<span class="badge-success p-1 rounded">Activo</span>';
                                    } else {
                                        $estado = '<span class="badge-danger p-1 rounded">Inactivo</span>';
                                    }
                                ?>
                                    <tr>
                                     
                                        <td><?php echo $estudiante['codigo']; ?></td>
                                        <td><?php echo $estudiante['nombre']; ?></td>
                                        <td><?php echo $estudiante['carrera']; ?></td>
                                        <td><?php echo $estudiante['telefono']; ?></td>
                                        <td><?php echo $estudiante['direccion']; ?></td>
                                        <td><?php echo $estado; ['estado']; ?></td>
                                      
                                        <td><a href="<?php  ?>estudiantes?id=<?php echo $estudiante['id'] ?>"><i class="Eliminar"></i></a>
                                        <form method="POST" action="<?php echo base_url(); ?>estudiantes">
    <input type="hidden" name="id" value="<?php echo $estudiante['id']; ?>">
    <button type="submit">Eliminar</button>
</form>
       
                                            <a class="btn btn-primary" href="<?php echo base_url() ?>estudiantes/editar?id=<?php echo $estudiante['id'] ?>"><i class="fas fa-edit"></i></a>
                                            <?php if ($estudiante['estado'] == 1) { ?>
                                                
                                            <?php } else { ?>
                                                <form method="post" action="<?php echo base_url() ?>estudiantes" class="d-inline reingresar">
                                                    <input type="hidden" name="id" value="<?php echo $estudiante['id']; ?>">
                                                    <button class="btn btn-success" type="submit"><i class="fas fa-audio-description"></i></button>
                                                </form>
                                            <?php } ?>
                                            
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="nuevoEstudiante" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="my-modal-title">Registro Estudiante</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>estudiantes/registrar" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="codigo">Matricula</label>
                                    <input id="codigo" class="form-control" type="number" name="codigo" required placeholder="Matricula del estudiante">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre Completo</label>
                                    <input id="nombre" class="form-control" type="text" name="nombre" required placeholder="Nombre completo">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="carrera">Licenciatura</label>
                                    <input id="carrera" class="form-control" type="text" name="carrera" required placeholder="Carrera">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="telefono">Télefono</label>
                                    <input id="telefono" class="form-control" type="number" name="telefono" required placeholder="Teléfono">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input id="direccion" class="form-control" type="text" name="direccion" required placeholder="Dirección">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Registrar</button>
                                    <button class="btn btn-danger" type="button" data-dismiss="modal">Atras</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php pie() ?>