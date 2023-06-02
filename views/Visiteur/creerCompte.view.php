<section class="min-vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Créer un compte</h2>

              <form method="POST" action="<?= URL ?>login">

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" name="nom" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Nom</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example2cg" name="prenom" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example2cg">Prénom</label>
                </div>

                <div class="row">
                  <div class="form-outline col-sm-6 mb-2">
                    <input type="date" id="form3Example3cg" name="date_naissance" class="form-control" />
                    <label class="form-label" for="form3Example3cg">Date de naissance</label>
                  </div>

                  <div class="form-outline col-sm-6 mb-2">
                    <input type="text" id="form3Example4cg" name="telephone" class="form-control" />
                    <label class="form-label" for="form3Example4cg">N° Téléphone</label>
                  </div>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example5cg" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example5cg">Adresse mail</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example6cg" name="adresse" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example6cg">Adresse</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example7cg" name="password" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example7cg">Mot de passe</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example8cg" name="confirm_password" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example8cg">Confirmation du mot de passe</label>
                </div>

                <div class="form-check form-check-custom d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" name="terms" value="" id="form2Example3cg" />
                    <label class="form-check-label" for="form2Example3g">
                        J'accepte toutes les déclarations dans les <a href="#!" class="text-body"><u>Conditions d'utilisation</u></a>
                    </label>
                </div>


                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-primary btn-block btn-lg gradient-custom-4 text-body">S'inscrire</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Avez-vous un compte existant ? <a href="<?= URL; ?>login"
                    class="fw-bold text-body"><u>Connectez-vous</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

