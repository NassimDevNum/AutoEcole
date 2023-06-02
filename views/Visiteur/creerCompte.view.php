<section class="" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                <form method="POST" action="<?= URL ?>validation_creerCompte" class="mx-1 mx-md-4">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="NOM_CLIENT" name="nom" class="form-control" required>
                      <label class="form-label" for="NOM_CLIENT">Nom</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="PRENOM_CLIENT" name="prenom" class="form-control" required>
                      <label class="form-label" for="PRENOM_CLIENT">Prénom</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-calendar-alt fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="date" id="DATE_DE_NAISSANCE" name="date_naissance" class="form-control" required>
                      <label class="form-label" for="DATE_DE_NAISSANCE">Date de naissance</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="TEL" name="numero_telephone" class="form-control" required>
                      <label class="form-label" for="TEL">N° Téléphone</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="MAIL" name="mail" class="form-control" required>
                      <label class="form-label" for="MAIL">Adresse mail</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-map-marker-alt fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="ADRESSE_CLIENT" name="adresse" class="form-control" required>
                      <label class="form-label" for="ADRESSE_CLIENT">Adresse</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="MOT_DE_PASSE" name="mot_de_passe" class="form-control" required>
                      <label class="form-label" for="MOT_DE_PASSE">Mot de passe</label>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5 form-check-custom">
    <input class="form-check-input me-2" type="checkbox" value="" id="terms" name="terms" required>
    <label class="form-check-label" for="terms">
      J'accepte toutes les déclarations dans les <a href="#!">Conditions d'utilisation</a>
    </label>
</div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">S'inscrire</button>
                  </div>
                </form>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="https://pin.it/7BHY9Aw" class="img-fluid" alt="Sample image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>