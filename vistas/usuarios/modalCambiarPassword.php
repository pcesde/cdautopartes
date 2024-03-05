<form id="frmCambiarPassword" method="POST" action="guardar_contrasena.php" onsubmit="return cambiarPassword()">
    <div class="modal fade" id="modalCambiarPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="nuevaPassword">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="nuevaPassword" name="nuevaPassword" required minlength="8">
                        </div>
                        <div class="col-sm-4">
                            <label for="confirmarPassword">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="confirmarPassword" name="confirmarPassword" required minlength="8">
                        </div>
                    </div>
                    <!-- Agregar mensajes de error si es necesario -->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>
