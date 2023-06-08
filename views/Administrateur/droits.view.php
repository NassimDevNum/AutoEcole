<section class="" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Gestion des droits</p>

                <table class="table mx-1 mx-md-4">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Mail</th>
                            <th>Rôle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($utilisateurs as $utilisateur) :?>
                            <tr>
                                <td><?= $utilisateur['NOM_CLIENT'] ?></td>
                                <td><?= $utilisateur['PRENOM_CLIENT'] ?></td>
                                <td><?= $utilisateur['MAIL'] ?></td>
                                <td>
                                    <?php if($utilisateur['ROLE'] === "administrateur"): ?>
                                        <?= $utilisateur['ROLE'] ?>
                                    <?php else : ?>
                                        <form method="POST" action="<?= URL ?>administration/validation_modificationRole">
                                            <input type="hidden" name="NOM_CLIENT" value="<?= $utilisateur['NOM_CLIENT']?>">    
                                            <select class="form-select" name="ROLE" onchange="confirm('Confirmez vous la modification du rôle ?') ? submit(): document.location.reload()">
                                                <option value="utilisateur" <?= $utilisateur['ROLE'] === "utilisateur" ? "selected" : ""?>>Utilisateur</option>
                                                <option value="administrateur" <?= $utilisateur['ROLE'] === "administrateur" ? "selected" : ""?>>Administrateur</option>
                                            </select>
                                        </form>
                                    <?php endif;?>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
