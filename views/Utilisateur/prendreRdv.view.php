
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
</form>
