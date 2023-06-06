<h1>Prise de RDV - <?= strtoupper($utilisateur['NOM_CLIENT']).' '.$utilisateur['PRENOM_CLIENT']?> </h1>

<!-- <?php
$bdd = new PDO('mysql:host=localhost;dbname=autoecole', 'root', '');
?> -->


<form method="POST" action="<?= URL ?>compte/prendreRdv">

    <div class="mb-3">
        <label for="N_LECON" class="form-label">Leçon</label>
        <select id="N_LECON" name="N_LECON" required>
            <?php
            $stmt = $bdd->prepare("SELECT * FROM lecon");
            $stmt->execute();
            $resultats = $stmt->fetchAll(); 
            foreach($resultats as $lecon)
            {
                echo '<option value="' . $lecon['N_LECON'] . '">' . $lecon['N_LECON'] . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="N_CLIENT" class="form-label">client (à retirer)</label>
        <select id="N_CLIENT" name="N_CLIENT" required>
            <?php
            $stmt = $bdd->prepare("SELECT * FROM client");
            $stmt->execute();
            $resultats = $stmt->fetchAll(); 
            foreach($resultats as $client)
            {
                echo '<option value="' . $client['N_CLIENT'] . '">' . $client['N_CLIENT'] . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="N_MONITEUR" class="form-label">Moniteur</label>
        <select id="N_MONITEUR" name="N_MONITEUR" required>
            <?php
            $stmt = $bdd->prepare("SELECT * FROM moniteur");
            $stmt->execute();
            $resultats = $stmt->fetchAll(); 
            foreach($resultats as $moniteur)
            {
                echo '<option value="' . $moniteur['N_MONITEUR'] . '">' . $moniteur['N_MONITEUR'] . '</option>';
            }
            ?>
        </select>
<div class="mb-3">
        <label for="CODE_MODELE" class="form-label">Modele</label>
        <select id="CODE_MODELE" name="CODE_MODELE" required>
            <?php
            $stmt = $bdd->prepare("SELECT * FROM modele");
            $stmt->execute();
            $resultats = $stmt->fetchAll(); 
            foreach($resultats as $modele)
            {
                echo '<option value="' . $modele['CODE_MODELE'] . '">' . $modele['CODE_MODELE'] . '</option>';
            }
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
<!-- <?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // récupération des données du formulaire
    $N_LECON = $_POST['N_LECON'];
    $N_CLIENT = $_POST['N_CLIENT'];
    $N_MONITEUR = $_POST['N_MONITEUR'];
    $CODE_MODELE = $_POST['CODE_MODELE'];
    $DATE_HEURE_DEBUT = $_POST['DATE_HEURE_DEBUT'];
    $DATE_HEURE_FIN = $_POST['DATE_HEURE_FIN'];

    // insérer les données dans la base de données
    $stmt = $bdd->prepare("INSERT INTO planning (N_LECON, N_CLIENT, N_MONITEUR, CODE_MODELE, DATE_HEURE_DEBUT, DATE_HEURE_FIN) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$N_LECON, $N_CLIENT, $N_MONITEUR, $CODE_MODELE, $DATE_HEURE_DEBUT, $DATE_HEURE_FIN]);

    // afficher un message de succès
    echo "Données insérées avec succès dans la table planning";
}

?>


?> -->