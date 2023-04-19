
<h1>Profil de <?= $utilisateur['NOM_CLIENT']?> </h1> 
<div id='mail'>
    mail : <?= $utilisateur['MAIL'] ?>
    <button class="btn btn-primary" id="btnModifMail"> 
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
    </button>
</div>

<div id="modificationMail" class= "d-none">
    <form method="POST" action="<?= URL; ?>compte/validation_modificationMail">
        <div class="row">
            <label for="mail" class="col-2 col-form-label">Mail : </label>
            <div class="col-8">
                <input type="mail" class="form-control" name="MAIL" value="<?= $utilisateur['MAIL']?>"/>
            </div>
            <div class="col-2">
                <button class="btn btn-success" id="btnValidModifMail">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                </svg>
                </button>
            </div>
        </div>
    </form>
</div>

<div>
    <a href="<?= URL; ?>compte/modificationPassword" class="btn btn-warning">changer le mdp</a>
    <button id="btnSupCompte" class="btn btn-danger">Supprimer mon compte</button>
</div>
<div id="suppressionCompte" class="d-none m-2">
    <div class="alert alert-danger">
        Veuillez confirmer la suppression du compte. 
        <br/>
        <a href="<?= URL ?>compte/suppressionCompte" class="btn btn-danger">Je souhaite supprimer mon compte définitivement</a>
    </div>
</div>


<div id='calendar'></div>

<?php

$host = 'localhost';
$dbname = 'autoecole';
$username = 'root';
$password = '';


                
try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
} catch(PDOException $e) {
    echo $e->getMessage();
}

// Récupération des événements depuis la base de données
$req = $bdd->query('SELECT * FROM planning');
$events = [];

while ($donnees = $req->fetch()) {
    $event = [
        'title' => $donnees['N_LECON'],
        'start' => $donnees['DATE_HEURE_DEBUT'],
        'end' => $donnees['DATE_HEURE_FIN'],
       // 'backgroundColor' => $donnees['COULEUR']
    ];

    $events[] = $event;
}

// Retourne les événements au format JSON
echo json_encode($events);
?>

<script> 
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var now = new Date();
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        initialDate: now.getFullYear() + '-' + (now.getMonth() + 1).toString().padStart(2, '0') + '-' + now.getDate().toString().padStart(2, '0'),
        events: <?php echo json_encode($events); ?>
    });
    calendar.render();
    });

</script>
