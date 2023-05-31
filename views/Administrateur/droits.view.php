<h1>Page de gestions des droits de l'utilisateur</h1>

<table class="table ">
    <thead>
        <tr>
            <th>Login</th>
            <th>Mail</th>
            <th>Rôle</th>
        </tr>
        <?php foreach ($utilisateurs as $utilisateur) :?>
            <tr>
                <td><?= $utilisateur['NOM_CLIENT'] ?></td>
                <td><?= $utilisateur['MAIL'] ?></td>
                <td><?php if($utilisateur['ROLE'] === "administrateur"): ?></td>
                    <td><?= $utilisateur['ROLE'] ?></td>
                    <?php else : ?>
                        <form method="POST" action="<?= URL ?>administration/validation_modificationRole">
                            <input type="hidden" name="NOM_CLIENT" value="<?= $utilisateur['NOM_CLIENT']?>">    
                        <select class="form-select" name="ROLE" onchange="confirm('Confirmez vous la modification du rôle ?') ? submit(): document.location.reload()">
                                <option value="utilisateur" <?= $utilisateur['ROLE'] === "utilisateur" ? "selected" : ""?>>Utilisateur</option>
                                <option value="Sutilisateur" <?= $utilisateur['ROLE'] === "Sutilisateur" ? "selected" : ""?>>Super Utilisateur</option>
                                <option value="administrateur" <?= $utilisateur['ROLE'] === "administrateur" ? "selected" : ""?>>Administrateur</option>
                        </form>
                    <?php endif;?>
                </tr>
        <?php endforeach;?>
    </thead>
</table>