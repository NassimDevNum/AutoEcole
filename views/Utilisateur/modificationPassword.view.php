<h1>Modification du mot de pass - <?= $_SESSION['profil']['MAIL']?></h1>

<form method="POST" action="<?= URL ?>compte/validation_modificationPassword">
    <div class="mb-3">
        <label for="MDP" class="form-label">ancien mdp</label>
        <input type="password" class="form-control" id="ancienMDP" name="ancienMDP" required>
    </div>
    <div class="mb-3">
        <label for="newMDP" class="form-label">new mdp</label>
        <input type="password" class="form-control" id="newMDP" name="newMDP" required>
    </div>
    <div class="mb-3">
        <label for="confirmMDP" class="form-label">confirmation new mdp</label>
        <input type="password" class="form-control" id="confirmMDP" name="confirmMDP" required>
    </div>
    <div class="alert alert-danger d-none" id="erreur">
        Les mdp ne corresspondent pas 
    </div>
    <button type="submit" class="btn btn-primary" disabled>Valider</button>
</form>
