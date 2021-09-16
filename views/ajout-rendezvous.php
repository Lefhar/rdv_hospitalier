<div class="container">
    <div class="row p-2">

        <h1>Ajouter un rendez-vous</h1>
        <?php if (!empty($data['error'])) {
            echo '<div class="alert alert-danger" role="alert">' . $data['error'] . '</div>';
        } ?>
        <?php if(!empty($data)&&!empty($_GET['id'])){?>
        <form action="" method="post">

            <div class="form-group">
                <label for="dateHour">Ajouter un rendez-vous :  *</label>
                <input type="datetime-local" class="form-control" id="dateHour" name="dateHour"
                       value="<?php if (!empty($_POST['dateHour'])) {
                           echo $_POST['dateHour'];
                       } ?>" required>
                <input type="hidden" name="idPatients" value="<?=$_GET['id'];?>">
            </div>
            <div class="form-group row pt-2">

                <button type="submit" class="btn btn-primary">Ajouter le rendez-vous</button>
            </div>
        </form>
        <?php }else{?>
            <h2>Vous devez d'abord séléctionner un patient</h2>
            <div class="col-6">
            <a href="/listepatients" class="btn btn-warning"> Accéder à la liste des patients</a>
            </div>
        <div class="col-6">
            <a href="/ajoutpatientrendezvous" class="btn btn-warning"> Ajouter un patient et un rendez-vous</a>
        </div>
        <?php }?>
    </div>
</div>