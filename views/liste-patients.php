<div class="container">
    <div class="row p-2">
        <?php if (!empty($data['patients'])) { ?>
                <h2>Rechercher un patient</h2>
            <form action="/searchpatients" class="row g-2">
                <div class="col-10">
                    <label for="q" class="visually-hidden"></label>
                    <input type="text"  class="form-control" id="q" name="q"
                           placeholder="Entrer un nom, prenom">
                </div>

                <div class="col-2">
                    <button type="submit" class="btn btn-primary mb-3">rechercher</button>
                </div>
            </form>
            <a class="btn btn-success" href="/ajoutpatient"> Ajouter un patient</a>
            <?php if (!empty($data['error'])) {
                echo '<div class="alert alert-danger" role="alert">' . $data['error'] . '</div>';
            } ?>
            <h1>Liste des patients</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nom de famille</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Email</th>

                    <th scope="col">Ajout RDV</th>
                    <th scope="col">Profil</th>
                    <th scope="col">Supprimer</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['patients'] as $obj) {
                    ?>
                    <tr>
                        <td><?= $obj['lastname']; ?></td>
                        <td><?= $obj['firstname']; ?></td>
                        <td><?= $obj['birthdate']; ?></td>
                        <td><?= $obj['phone']; ?></td>
                        <td><?= $obj['mail']; ?></td>
                        <td>

                            <a class="btn btn-info" href="/ajoutrendezvous&id=<?= $obj['id']; ?>">Ajouter Rdv</a>
                        </td>
                        <td>
                            <a class="btn btn-info" href="/profilpatient&id=<?= $obj['id']; ?>">Editer</a>
                        </td>
                        <td>
                            <form action="supprimerpatient" method="post">
                                <input name="page" type="hidden" value="<?php if (!empty($_GET['p'])) {
                                    echo $_GET['p'];
                                } ?>">
                                <input name="id" type="hidden" value="<?= $obj['id']; ?>">
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>

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
        <?php } else { ?>
            <h2>Aucun patient veuillez ajouter un patient</h2>
            <a class="btn btn-success" href="/ajoutpatient"> Ajouter un patient</a>
        <?php } ?>
    </div>
</div>