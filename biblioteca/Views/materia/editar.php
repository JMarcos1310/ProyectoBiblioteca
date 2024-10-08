<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo base_url(); ?>materia/modificar" method="post" enctype="multipart/form-data" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nombre">Materia</label>
                                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                            <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['materia']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Modificar</button>
                                            <a class="btn btn-danger" href="<?php echo base_url(); ?>materia" type="button">Atras</a>
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