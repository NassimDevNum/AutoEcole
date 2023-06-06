<!-- section Acceuil -->
     
<section id="home" style="position: relative; width: 100%; height: 100vh;">
    <div class="background-image" style="background-image: url('<?= URL; ?>public/Assets/images/background.png');
                background-position: center center;
                background-repeat: no-repeat;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                filter: blur(3px);
                opacity: 0.8;"></div>
    <div id="p-home" class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="home-title">Maîtrisez la route</h1>
                <p class="home-description">Bienvenue à Drive Master ! Nous offrons des formations de conduite de qualité, adaptées à tous les niveaux. Apprenez en toute confiance avec nos instructeurs expérimentés et commencez votre aventure sur la route dès aujourd'hui !</p>
                <?php if(Securite::estConnecte()) : ?>
                    <a href="<?= URL; ?>prendreRDV" class="btn btn-primary btn-custom">Prendre RDV</a>
                <?php else : ?>
                    <a href="<?= URL; ?>creerCompte" class="btn btn-primary btn-custom">Je m'inscris</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>







    

    <!-- section services -->

    <section id="services" class="py-5">
        <h1 class="section_title">Nos offres</h1>
        <div class="list_services">
            <div class="service">
                <img src="<?= URL; ?>public/Assets/images/Manual.png" alt="" width="50" height="50"><br>
                <h3 class="custom-bold">Permis B (boîte manuelle)</h3>
                <p>Cette formule vous offre une formation complète à la conduite de véhicules équipés d'une boîte de vitesses manuelle. Vous apprendrez non seulement à maîtriser les techniques de conduite, mais aussi à comprendre le fonctionnement de votre véhicule pour une conduite en toute sécurité. La boîte manuelle offre une plus grande maîtrise du véhicule et est universellement acceptée.</p>
                 <a href="<?= URL; ?>creerCompte"" class="read_more">S'inscrire</a>
            </div>
            <div class="service">
                <img src="<?= URL; ?>public/Assets/images/PRDN.png" alt="" width="50" height="50"><br>
                <h3 class="custom-bold">Permis B  (boîte automatique)</h3>
                <p>Cette formule est idéale pour ceux qui préfèrent se concentrer sur la route plutôt que sur le changement de vitesses. Avec une boîte de vitesses automatique, la conduite devient plus simple et plus fluide, ce qui permet de réduire le stress au volant. Notez cependant que le permis obtenu avec une boîte automatique ne vous autorise à conduire que des véhicules équipés de ce type de boîte.</p>
                 <a href="<?= URL; ?>creerCompte"" class="read_more">S'inscrire</a>
            </div>
        </div>
    </section>


    
