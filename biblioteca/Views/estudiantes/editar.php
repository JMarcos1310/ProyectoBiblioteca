<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo base_url(); ?>estudiantes/modificar" method="post" enctype="multipart/form-data" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="codigo">Matricula</label>
                                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                            <input id="codigo" class="form-control" type="number" name="codigo" value="<?php echo $data['codigo']; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nombre">Nombre Completo</label>
                                            <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['nombre']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                    <select name="licenciatura" id ="licenciatura">
                                        <div class="form-group">
                                            <label for="carrera">Licenciatura</label>
                                            <option value ="Informatica">Informatica</option>
                                            <option value ="Enfermeria">Enfermeria</option>
                                            <option value ="Contaduria">Contaduria</option>
                                            <input id="carrera" class="form-control" type="text" name="carrera" value="<?php echo $data['carrera']; ?>">
                                            
                                        </div>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="telefono">Télefono</label>
                                            <input id="telefono" class="form-control" type="number" name="telefono" value="<?php echo $data['telefono']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <input id="direccion" class="form-control" type="text" name="direccion" value="<?php echo $data['direccion']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Modificar</button>
                                            <a class="btn btn-danger" href="<?php echo base_url(); ?>estudiantes">Atras</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php pie() ?>