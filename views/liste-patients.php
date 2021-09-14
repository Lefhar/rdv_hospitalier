<div class="container">
    <div class="row p-2">
        <?php if (!empty($data)) { ?>
                <a class="btn btn-success" href="/ajoutpatient"> Ajouter un patient</a>
            <?php if(!empty($data['error'])){echo '<div class="alert alert-danger" role="alert">'.$data['error'].'</div>';}?>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom de famille</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Supprimer</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['patients'] as $obj) {
                    ?>
                    <tr>
                        <th scope="row"><?= $obj['id']; ?></th>
                        <th scope="row"><?= $obj['lastname']; ?></th>
                        <th scope="row"><?= $obj['firstname']; ?></th>
                        <th scope="row"><?= $obj['birthdate']; ?></th>
                        <th scope="row"><?= $obj['phone']; ?></th>
                        <th scope="row"><?= $obj['mail']; ?></th>
                        <th scope="row">
                            <form action="supprimerpatient" method="post">
                                <input name="page" type="hidden" value="<?php if(!empty($_GET['p'])){ echo $_GET['p'];} ?>">
                                <input name="id" type="hidden" value="<?= $obj['id']; ?>">
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                            </th>

                    </tr>
                <?php } ?>

                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php
                    for ($i = 1; $i <= $data['countpage']; $i++) //On fait notre boucle
                    {
                        //On va faire notre condition
                        if ($i == $data['pageActuelle']) //S'il s'agit de la page actuelle...
                        {
                            ?>
                            <li class="page-item disabled"><a class="page-link" href="#"><?= $i; ?></a></li>
                            <?php
                        } else //Sinon...
                        {
                            ?>

                            <li class="page-item"><a class="page-link"
                                                     href="index.php?page=listepatients&p=<?= $i; ?>"><?= $i; ?></a>
                            </li>

                        <?php }
                    }
                    ?>
                </ul>
            </nav>
        <?php } ?>
    </div>
</div>