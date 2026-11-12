<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>CRUD CodeIgniter</title>
</head>

<body>
    <div class="container mt-4">
        <h1>CRUD con CodeIgniter 4 --UNAP--</h1>

        <!-- Formulario de registro -->
        <div class="row mt-3">
            <div class="col-sm-12">
                <form method="POST" action="<?php echo base_url('/crear') ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="paterno">Apellido paterno</label>
                        <input type="text" name="paterno" id="paterno" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="materno">Apellido materno</label>
                        <input type="text" name="materno" id="materno" class="form-control" required>
                    </div>
                    <button class="btn btn-primary mt-2">Guardar</button>
                </form>
            </div>
        </div>

        <hr>

        <!-- Listado de personas -->
        <h2>Listado de personas</h2>
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered mt-2">
                        <thead class="thead-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido paterno</th>
                                <th>Apellido materno</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($datos)): ?>
                                <?php foreach ($datos as $key): ?>
                                    <tr>
                                        <td><?php echo $key['nombre'] ?></td>
                                        <td><?php echo $key['paterno'] ?></td>
                                        <td><?php echo $key['materno'] ?></td>
                                        <td>
                                            <a href="<?php echo base_url('/obtenerNombre/' . $key['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('/eliminar/' . $key['id']) ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">No hay registros</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje === '1') {
            swal(':D', 'Agregado con éxito!', 'success');
        } else if (mensaje === '0') {
            swal(':(', 'Fallo al agregar!', 'error');
        } else if (mensaje === '2') {
            swal(':D', 'Actualizado con éxito!', 'success');
        } else if (mensaje === '3') {
            swal(':(', 'Fallo al actualizar!', 'error');
        } else if (mensaje === '4') {
            swal(':D', 'Eliminado con éxito!', 'success');
        } else if (mensaje === '5') {
            swal(':(', 'Fallo al eliminar!', 'error');
        }
    </script>
</body>
</html>

