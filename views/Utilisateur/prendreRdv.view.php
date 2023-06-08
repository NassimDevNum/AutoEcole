<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-6 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Prendre RDV</p>

                <form class="mx-1 mx-md-4" method="POST" action="<?= URL ?>compte/validation_prendreRdv">

                  <div class="mb-3">
                    <label for="NOM_LECON" class="form-label">Leçon</label>
                    <select id="NOM_LECON" name="NOM_LECON" class="form-control" required>
                    <?php foreach ($lecons as $lecon): ?>
                      <option value="<?= $lecon['NOM_LECON'] ?>"><?= $lecon['NOM_LECON'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="NOM_MONITEUR" class="form-label">Moniteur</label>
                    <select id="NOM_MONITEUR" name="NOM_MONITEUR" class="form-control" required>
                    <?php foreach ($moniteurs as $moniteur): ?>
                      <option value="<?= $moniteur['NOM_MONITEUR'] ?>"><?= $moniteur['NOM_MONITEUR'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="NOM_MODELE" class="form-label">Modele</label>
                    <select id="NOM_MODELE" name="NOM_MODELE" class="form-control" required>
                    <?php foreach ($modeles as $modele): ?>
                      <option value="<?= $modele['NOM_MODELE'] ?>"><?= $modele['NOM_MODELE'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="DATE_HEURE_DEBUT">Date et heure debut</label>
                    <input type="datetime-local" id="DATE_HEURE_DEBUT" name="DATE_HEURE_DEBUT" class="form-control">
                  </div>

                  <div class="mb-3">
                    <label for="DATE_HEURE_FIN">Date et heure fin</label>
                    <input type="datetime-local" id="DATE_HEURE_FIN" name="DATE_HEURE_FIN" class="form-control">
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Valider</button>
                  </div>

                </form>

              </div>

              <div class="col-md-6 d-flex align-items-center order-1 order-lg-2">
                <img src="<?= URL ?>public/Assets/images/rdv.png" class="img-fluid" alt="Sample image">
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>










<!-- 
<form method="POST" action="<?= URL ?>compte/prendreRdv">
    <div class="mb-3">
        <label for="NOM_LECON" class="form-label">Leçon</label>
        <select id="NOM_LECON" name="NOM_LECON" required>
        <?php foreach ($lecons as $lecon): ?>
    <option value="<?= $lecon['NOM_LECON'] ?>"><?= $lecon['NOM_LECON'] ?></option>
<?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="N_MONITEUR" class="form-label">Moniteur</label>
        <select id="N_MONITEUR" name="N_MONITEUR" required>
        <?php foreach ($moniteurs as $moniteur): ?>
            <option value="<?= $moniteur['NOM_MONTEUR'] ?>"><?= $moniteur['NOM_MONTEUR'] ?></option>
<?php endforeach; ?>
        </select>
    </div>
<div class="mb-3">
        <label for="NOM_MODELE" class="form-label">Modele</label>
        <select id="NOM_MODELE" name="NOM_MODELE" required>
        <?php foreach ($modeles as $modele): ?>
            <option value="<?= $modele['NOM_MODELE'] ?>"><?= $modele['NOM_MODELE'] ?></option>
<?php endforeach; ?>
        </select>
    </div>


<label for="DATE_HEURE_DEBUT">Date et heure debut</label>
<input type="datetime-local" id="DATE_HEURE_DEBUT" name="DATE_HEURE_DEBUT">

<br>
<br>

<label for="DATE_HEURE_FIN">Date et heure fin</label>
<input type="datetime-local" id="DATE_HEURE_FIN" name="DATE_HEURE_FIN">

<br>
<br>

    <button type="submit" class="btn btn-primary" >Valider</button>
</form> -->
