<!-- Modal -->
<form id="frmActualizarUsuario" method="POST" onsubmit="return actualizarUsuario()">
<div class="modal fade" id="modalActualizarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" id="idUsuario" name="idUsuario" hidden>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="paternou">Apellido Paterno</label>
                        <input type="text" class="form-control" id="paternou" name="paternou" required>
                    </div>
                    
                    
                    <div class="col-sm-4">
                        <label for="nombreu">Nombre</label>
                        <input type="text" class="form-control" id="nombreu" name="nombreu" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="fechaNacimientou">Fecha de Nacimiento</label>
                        <input type="data" class="form-control" id="fechaNacimientou" name="fechaNacimientou" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="sexou">Area</label>
                        <select class="form-control" name="sexou" id="sexou" required>
                            <option value="">Selesiona el Area</option>
                            <option value="Administracion">Administracion</option>
                            <option value="Produccion">Produccion</option>
                            
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="telefonou">Telefono</label>
                        <input type="text" class="form-control" id="telefonou" name="telefonou" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="correou">Correo</label>
                        <input type="mail" class="form-control" id="correou" name="correou" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="usuariou">Usuario</label>
                        <input type="text" class="form-control" id="usuariou" name="usuariou" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="idRolu">Rol de Usuario</label>
                        <select name="idRolu" id="idRolu" class="form-control" required>
                            <option value="1">Cliente</option>
                            <option value="2">Administrador</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="ubicacionu">Ubicacion</label>
                        <select class="form-control" name="ubicacionu" id="ubicacionu" required>
                            <option value="">Selesiona el sector</option>
                            <option value="Administracion Corte y Compresion">Administracion Corte y Compresion</option>
 <option value="Administracion Produccion">Administracion Produccion</option>
 <option value="Administracion Tecnica">Administracion Tecnica</option>
 <option value="AirBag">AirBag</option>
 <option value="Almacenamiento Administracion">Almacenamiento Administracion</option>
 <option value="Almacenamiento Operativo">Almacenamiento Operativo</option>
 <option value="Comercio Exterior Administracion">Comercio Exterior Administracion</option>
 <option value="Compresion Semi Automatico">Compresion Semi Automatico</option>
 <option value="Contabilidad & Finanzas">Contabilidad & Finanzas</option>
 <option value="Corte y Compresion Automatico">Corte y Compresion Automatico</option>
 <option value="Deposito P. Terminado">Deposito P. Terminado</option>
 <option value="Entrenamiento">Entrenamiento</option>
 <option value="Informatica">Informatica</option>
 <option value="Ingenieria de Nuevo Prod. Administracion">Ingenieria de Nuevo Prod. Administracion</option>
 <option value="K/G Gsb">K/G Gsb</option>
 <option value="Limpieza y Jardineria">Limpieza y Jardineria</option>
 <option value="Linea Floor -Sub">Linea Floor -Sub</option>
 <option value="Linea Main - Sub">Linea Main - Sub</option>
 <option value="Main 1">Main 1</option>
 <option value="Main 2">Main 2</option>
 <option value="Main 3">Main 3</option>
 <option value="Main Gsb">Main Gsb</option>
 <option value="Main SU2B">Main SU2B</option>
 <option value="Mantenimiento Tecnico">Mantenimiento Tecnico</option>
 <option value="Nuevo producto">Nuevo producto</option>
 <option value="Planificacion de la Produccion">Planificacion de la Produccion</option>
 <option value="Planificacion Estrategica">Planificacion Estrategica</option>
 <option value="QC Administracion">QC Administracion</option>
 <option value="QC AirBag">QC AirBag</option>
 <option value="QC Bateria">QC Bateria</option>
 <option value="QC Corte y Compresion">QC Corte y Compresion</option>
 <option value="QC Embarque Controlado">QC Embarque Controlado</option>
 <option value="QC Extensiones 1">QC Extensiones 1</option>
 <option value="QC Floor  Gsb">QC Floor  Gsb</option>
 <option value="QC Floor 1">QC Floor 1</option>
 <option value="QC Floor 2">QC Floor 2</option>
 <option value="QC Floor SU2B">QC Floor SU2B</option>
 <option value="QC FRONT3">QC FRONT3</option>
 <option value="QC Gamma">QC Gamma</option>
 <option value="QC K/G Gsb">QC K/G Gsb</option>
 <option value="QC Kappa">QC Kappa</option>
 <option value="QC Kappa&Gamma">QC Kappa&Gamma</option>
 <option value="QC KEEPER">QC KEEPER</option>
 <option value="QC Laboratorio">QC Laboratorio</option>
 <option value="QC Main 1">QC Main 1</option>
 <option value="QC Main 2">QC Main 2</option>
 <option value="QC Main 3">QC Main 3</option>
 <option value="QC Main Gsb">QC Main Gsb</option>
 <option value="QC Main SU2B">QC Main SU2B</option>
 <option value="QC Nuevos Negocios">QC Nuevos Negocios</option>
 <option value="QC Productos Terminados">QC Productos Terminados</option>
 <option value="QC Recepcion">QC Recepcion</option>
 <option value="QC SU2B">QC SU2B</option>
 <option value="RR.HH">Recursos Humanos</option>
 <option value="Rework">Rework</option>
 <option value="Servicios Generales">Servicios Generales</option>
 <option value="Tecnico Inicial (Shijacshil)">Tecnico Inicial (Shijacshil)</option>
 <option value="Training Center 2">Training Center 2</option>
 <option value="Training Center 3">Training Center 3</option>
 <option value="Training Center 4">Training Center 4</option>
 <option value="Training Center 5">Training Center 5</option>
 <option value="Training Center1">Training Center1</option>
 </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-warning">Actualizar</button>
            </div>
        </div>
    </div>
</div>
</form>