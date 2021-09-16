<div class="container">
    <div class="row p-2">

        <h1>Ajouter un patient</h1>
        <?php if(!empty($data['error'])){echo '<div class="alert alert-danger" role="alert">'.$data['error'].'</div>';}?>
        <form action="" method="post">
            <div class="form-group">
                <label for="lastname">Nom : *</label>
                <input type="text" class="form-control" id="lastname"  name="lastname" placeholder="Votre nom de famille" value="<?php if(!empty($_POST['lastname'])){echo $_POST['lastname'];}?>"  required>
            </div>
            <div class="form-group">
                <label for="firstname">Prenom : *</label>
                <input type="text" class="form-control" id="firstname"  name="firstname"   placeholder="Votre prénom"  value="<?php if(!empty($_POST['firstname'])){echo $_POST['firstname'];}?>" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Date de naissance : *</label>
                <input type="date" class="form-control" id="birthdate"  name="birthdate"   placeholder="Votre date de naissance"  value="<?php if(!empty($_POST['birthdate'])){echo $_POST['birthdate'];}?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Téléphone :</label>
                <input type="tel" class="form-control" id="phone"  name="phone"   placeholder="Votre numéro de téléphone" pattern="[0-9]{10}" value="<?php if(!empty($_POST['firstname'])){echo $_POST['phone'];}?>">
            </div>
            <div class="form-group">
                <label for="mail">Email : *</label>
                <input type="email" class="form-control" id="mail"  name="mail"   placeholder="Votre email"  value="<?php if(!empty($_POST['mail'])){echo $_POST['mail'];}?>" required>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>
</div>