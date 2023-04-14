<h1>Prendre un cours - <?= $_SESSION['profil']['NOM_CLIENT']?></h1>


<form method="POST" action="<?= URL ?>compte/newCours">

    <div class="mb-3">
        <label for="N_LECON" class="form-label">Leçon</label>
        <select id="N_LECON" name="N_LECON" required>
            <?php

            $bdd = new PDO('mysql:host=localhost;dbname=autoecole', 'root', '');
       
             $stmt = $bdd->prepare("SELECT * FROM lecon");
             $stmt->execute();
             $resultats = $stmt->fetchAll();
             
             
             foreach($resultats as $lecon) {
                 echo '<option value="' . $lecon['N_LECON'] . '">' . $lecon['N_LECON'] . '</option>';
             }     
            
            ?>

        </select>
    </div>


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
    
    <button type="submit" class="btn btn-primary" disabled>Valider</button>
</form>
