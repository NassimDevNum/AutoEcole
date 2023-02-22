<h1>Coucou</h1>

<?php 
foreach($utilisateurs as $utilisateur) 
{
    echo $utilisateur ['NOM_CLIENT']. "-" . $utilisateur['MDP'];
}

?>