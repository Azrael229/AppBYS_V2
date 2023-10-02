<?php include("estructura/header.php");?>




    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gastos 2023</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
    </div>




    <!-- Content Row -->

    <!-- Pinta la Tabla Dinámica  -->
    <?php include("Request_BD/reqNumSem.php");?>

    <?php foreach($res as $row): ?>

        <!-- enlace a nueva pagina con el id del numero de semana -->
        <a href="pag.semana.php?id=<?php echo $row['numero_semana'] ?>" name="<?php echo $row['numero_semana'] ?>"class="list-group-item list-group-item-action list-group-item-light">Semana   <?php echo $row['numero_semana'] ?></a>
        <!-- Fin del enlace -->

    <?php endforeach; ?>
    <!-- Fin de la Tabla Dinámica  -->





    <!-- Content Row -->
    <!-- Content Row -->
                    

<?php include("estructura/footer.php");?>