<div class="container">
    <div class="row p-2">
        <h1>Listes des rendez-vous</h1>
        <?php if (!empty($data)) { ?>

            <?php if(!empty($data['error'])){echo '<div class="alert alert-danger" role="alert">'.$data['error'].'</div>';}?>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nom de famille</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Email</th>
                    <th scope="col">RDV</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Supprimer</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['patients'] as $obj) {
                    ?>
                    <tr>
                        <td><?= $obj['lastname']; ?></td>
                        <td ><?= $obj['firstname']; ?></td>
                        <td ><?= $obj['birthdate']; ?></td>
                        <td ><?= $obj['phone']; ?></td>
                        <td ><?= $obj['mail']; ?></td>
                        <td ><?= $obj['dateHour']; ?></td>

                        <td >
                            <a  class="btn btn-info" href="/changerdv&id=<?= $obj['idapp']; ?>">Editer</a>
                        </td>
                        <td>
                            <form action="supprimerpatient" method="post">
                                <input name="page" type="hidden" value="<?php if(!empty($_GET['p'])){ echo $_GET['p'];} ?>">
                                <input name="id" type="hidden" value="<?= $obj['idapp']; ?>">
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
                                                     href="index.php?page=listerendezvous&p=<?= $i; ?>"><?= $i; ?></a>
                            </li>

                        <?php }
                    }
                    ?>
                </ul>
            </nav>
        <?php }else{ ?>
            <h2>Aucun rendez-vous accéder à la liste des patients ?</h2>
            <a class="btn btn-success" href="/listepatients"> Accéder à la liste des patients</a>
        <?php }?>
    </div>
</div>