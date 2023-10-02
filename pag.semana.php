<?php include("estructura/header.php");?>




<?php include("Request_BD/reqUnaSemana.php");?>

 

<!------- cards dias de la  semana -------------->

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach($resultado as $row): ?>


            <div class="col">
                <div class="card h-100">

        <!-- Sección azul con la fecha  ----------------------------->
                    <h4 class="card-title text-center bg-info-subtle"><?php echo $row['fecha']; ?> </h4>

        <!-- header Actividades accion click = abre modal para agregar actividad -->
                    
                    <div class="card-header" data-bs-toggle="modal" data-bs-target="#nuevaActividadModal" onclick="escribir_fecha_modal(<?php echo $row['ID']; ?>)">
                                        
                        <h5>Actividades</h5>
                        
                    </div>
                
                    <div class="card-body">
                        <!-- Este codigo php hace la peticion a la base de datos a todas las actividades de acuerdo al id de fecha  -->
                        <?php
                        $id_fecha = $row['ID']; 
                        require ("configuracion/conexion.php");
            
                        $statement = $conexion->prepare("SELECT * FROM actividades WHERE ID_fecha = $id_fecha");
                        $statement->execute();
                    
                        $res = $statement->fetchAll();
                        ?>
                        <table class="table table-hover table table-sm">
                            <tr>
                                <th scope="col">Cliente</th>
                                <th scope="col">O.S.</th>
                                <th scope="col">hora inicial</th>
                                <th scope="col">hora final</th>
                            </tr>
                            <?php foreach($res as $fila):?>
                            <tr>
                                <td><?php echo $fila['cliente'] ?></td>
                                <td><?php echo $fila['os'] ?></td>
                                <td><?php echo $fila['hora_inicial'] ?></td>
                                <td><?php echo $fila['hora_final'] ?></td>
                                <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg></td>
                            </tr>
                            <?php endforeach;?>
                        </table>
                    </div> 
        <!--- Card seccion GASTOS ---------------------------------->
                    <div class="card-header" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <h5>Gastos</h5>
                    </div>

                    <div class="card-body">
                    <?php
                        $id_fecha = $row['ID']; 
                        require ("configuracion/conexion.php");
            
                        $statement = $conexion->prepare("SELECT * FROM gastos WHERE fecha = $id_fecha");
                        $statement->execute();
                    
                        $res = $statement->fetchAll();
                        ?>
                        <table class="table table-hover table table-sm">
                            <tr>
                                <th scope="col">Concepto</th>
                                <th scope="col">Total</th>
                                <th scope="col">Forma de Pago</th>
                            </tr>
                            <?php foreach($res as $fila):?>
                            <tr>
                                <td><?php echo $fila['concepto'] ?></td>
                                <td>$ <?php echo $fila['total'] ?>.00</td>
                                <td><?php echo $fila['tipo_pago'] ?></td>
                                <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg></td>
                            </tr>
                            <?php endforeach;?>
                        </table>
                            
                    </div> 
        <!-- Card seccion FOOTER ---------------------------->
                    <div class="card-footer">
                                                
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-------FIN cards dias de la  semana ----------------------------------->



<?php include("estructura/footer.php");?>