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
                            <th >Tel</th>
                            <th>Mail</th>
                            <th>Date de naissance</th>
                            <th>Rôle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($utilisateurs as $utilisateur) :?>
                            <tr>
                                <td><?= $utilisateur['NOM_CLIENT'] ?></td>
                                <td><?= $utilisateur['PRENOM_CLIENT'] ?></td>
                                <td id="tel"><?= $utilisateur['TEL'] ?>
                                <div class="col-sm-3">
          <a id="btnModifTel" href="<?= URL; ?>compte/modificationTel" class="btn btn-transparent" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
          </svg></a>
        </div>
        <div id="modificationTel" class= "col-sm-3 d-none">
          <form method="POST" action="<?= URL; ?>compte/validation_modificationTel">
            <div class="row">
              <label for="tel" class="col-2 col-form-label">tel </label>
              <div class="col-8">
                  <input type="tel" class="form-control" name="TEL" value="<?= $utilisateur['TEL']?>"/>
              </div>
              <div class="col-2">
                  <button class="btn btn-success" id="btnValidModifTel">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                  <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                  <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                  </svg>
                  </button>
              </div>
            </div>
          </form>
        </div>
      
      </td>
                                <td><p id='mail' class="text-muted mb-0"><?= $utilisateur['MAIL'] ?>
          <button class="btn btn-transparent" id="btnModifMail"> 
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
          </svg>
          </button>
          </p></td>
                                <td><?= $utilisateur['DATE_DE_NAISSANCE'] ?></td>

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
