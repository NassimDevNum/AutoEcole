

<h1>Bienvenue <?php echo $utilisateur['NOM_CLIENT']; ?></h1>

<h1>Bienvenue <?= $moniteur['NOM_MONTEUR'] ?></h1>


<?php foreach ($moniteurs as $moniteur): ?>
    <p>Nom du moniteur : <?php echo $moniteur['NOM_MONTEUR']; ?></p>
<?php endforeach; ?>

<?php foreach ($lecons as $lecon): ?>
    <p>Nom du lecon : <?php echo $moniteur['NOM_LECON']; ?></p>
<?php endforeach; ?>



<form method="POST" action="<?= URL ?>compte/prendreRdv">

    <div class="mb-3">
        <label for="N_LECON" class="form-label">Leçon</label>
        <select id="N_LECON" name="N_LECON" required>
            <?php
            // $stmt = $bdd->prepare("SELECT * FROM lecon");
            // $stmt->execute();
            // $resultats = $stmt->fetchAll(); 
            // foreach($resultats as $lecon)
            // {
            //     echo '<option value="' . $lecon['N_LECON'] . '">' . $lecon['N_LECON'] . '</option>';
            // }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="N_CLIENT" class="form-label">client (à retirer)</label>
        <select id="N_CLIENT" name="N_CLIENT" required>
            <?php
            // $stmt = $bdd->prepare("SELECT * FROM client");
            // $stmt->execute();
            // $resultats = $stmt->fetchAll(); 
            // foreach($resultats as $client)
            // {
            //     echo '<option value="' . $client['N_CLIENT'] . '">' . $client['N_CLIENT'] . '</option>';
            // }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="N_MONITEUR" class="form-label">Moniteur</label>
        <select id="N_MONITEUR" name="N_MONITEUR" required>
            <?php
            // $stmt = $bdd->prepare("SELECT * FROM moniteur");
            // $stmt->execute();
            // $resultats = $stmt->fetchAll(); 
            // foreach($resultats as $moniteur)
            // {
            //     echo '<option value="' . $moniteur['N_MONITEUR'] . '">' . $moniteur['N_MONITEUR'] . '</option>';
            // }
            ?>
        </select>
<div class="mb-3">
        <label for="CODE_MODELE" class="form-label">Modele</label>
        <select id="CODE_MODELE" name="CODE_MODELE" required>
            <?php
            // $stmt = $bdd->prepare("SELECT * FROM modele");
            // $stmt->execute();
            // $resultats = $stmt->fetchAll(); 
            // foreach($resultats as $modele)
            // {
            //     echo '<option value="' . $modele['CODE_MODELE'] . '">' . $modele['CODE_MODELE'] . '</option>';
            // }
            ?>
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
</form>



