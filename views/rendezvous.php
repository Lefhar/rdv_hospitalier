<div class="container">
    <div class="row p-2">
        <h1>Modifier un rendez-vous</h1>
        <?php if (!empty($data['error'])) {
            echo '<div class="alert alert-danger" role="alert">' . $data['error'] . '</div>';
        } ?>
        <form action="" method="post">

            <div class="form-group">
                <strong>Nom :</strong> <?=$data['rdv']['lastname'];?>
            </div>
            <div class="form-group">
                <strong>Prénom :</strong> <?=$data['rdv']['firstname'];?>
            </div>
            <div class="form-group">
                <strong>Date de naissance :</strong> <?=$data['rdv']['birthdate'];?>
            </div>
            <div class="form-group">
                <strong>Téléphone :</strong> <?=$data['rdv']['phone'];?>
            </div>
            <div class="form-group">
                <strong>Email :</strong> <?=$data['rdv']['mail'];?>
            </div>
            <div class="form-group">
                <label for="dateHour">changer un rendez-vous :</label>
                <input type="datetime-local" class="form-control" id="dateHour" name="dateHour"
                       value="<?php if (!empty($_POST['dateHour'])) {
                           echo $_POST['dateHour'];
                       }elseif (!empty($data['rdv']['dateHour'])){ echo date("Y-m-d\TH:i:s", strtotime($data['rdv']['dateHour']));} ?>" required>
                <input type="hidden" name="idapp" value="<?php if (!empty($_POST['idapp'])) {
                    echo $_POST['idapp'];
                }elseif (!empty($data['rdv']['idapp'])){ echo $data['rdv']['idapp'];} ?>">
            </div>
            <div class="form-group row pt-2">

                <button type="submit" class="btn btn-primary">Modifier le rendez-vous</button>
            </div>
        </form>
    </div>
</div>