<!-- Modal -->
<form id="frmAgregarSolucionReporte" method="POST" onsubmit="return agregarSolucionReporte()">
    <div class="modal fade" id="modalAgregarSolucionReporte" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Solucion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <input type="hidden" id="idReporte" name="idReporte">
                    <label for="solucion">Soporte Encargado</label>
                    <select name="solucion" id="solucion" class="form-control" required>
                        <option value="1111">Soporte 1</option>
                        <option value="1112">Soporte 2</option>
                        <option value="1113">Soporte 3</option>
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                    
                    <!--"PARA CAMBIAR EL ESTADO DE LOS REPORTES"-->

                    <label for="estatus">Estado</label>
                    <select name="estatus" id="estatus" class="form-control">
                        <option value="0">CERRADO</option>
                        <option value="1">ABIERTO</option>
                        <option value="2">EN PROCESO</option>
                        <option value="3">NUEVO</option>
                    </select>
                  <!--  <input type="text" id="idReporte" name="idReporte" hidden>
                    <label for="soporte">Soporte</label>
                    <textarea name="soporte" id="soporte" class="form-control" required></textarea>-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-success">Guardar</button>
                </div>





            </div>
        </div>
    </div>
</form>