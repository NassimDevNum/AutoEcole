<h1>Page de connexion</h1>
<form method="POST" action="<?= URL ?>validation_login"> 
    <div class="mb-3">
        <label for="NOM_CLIENT" class="form-label">Login</label>
        <input value="test3" type="text" class="form-control" id="NOM_CLIENT" name="NOM_CLIENT" required>
    </div>
    <div class="mb-3">
        <label for="MDP" class="form-label">Password</label>
        <input value="fromage23" type="password" class="form-control" id="MDP" name="MDP" required>
    </div>

    <button type="submit" class="btn btn-primary">Connexion</button>
</form>
