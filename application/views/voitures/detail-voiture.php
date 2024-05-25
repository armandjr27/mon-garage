<div class="col-md-5 mx-auto mt-3 mb-5">
    <h2 class="text-center font-weight-bolder mt-3 mb-3">Fiche voiture</h2>
    <div class="card">
    <img src="<?php echo base_url('public/uploads/' . $voiture['image'] ); ?>" alt="<?php echo $voiture['marque'] . '-' . $voiture['numero']; ?>" title="<?php echo $voiture['marque'] . '-' . $voiture['numero']; ?>" class="card-img-top" loading="lazy" />
        <div class="card-body ">
            <ul class="lead">
                <li> <span class="font-weight-bold font-italic">ID</span> : <?php echo $voiture['id_voiture']; ?></li>
                <li> <span class="font-weight-bold font-italic">Marque</span> : <?php echo $voiture['marque']; ?></li>
                <li> <span class="font-weight-bold font-italic">Numero</span> : <?php echo $voiture['numero']; ?></li>
                <li> <span class="font-weight-bold font-italic">Couleur</span> : <?php echo $voiture['couleur']; ?></li>
                <li> <span class="font-weight-bold font-italic">Catégorie</span> : <?php echo $voiture['nom']; ?></li>
                <li> <span class="font-weight-bold font-italic">Description</span> : <?php echo $voiture['description']; ?></li>
                <li> <span class="font-weight-bold font-italic">Date de création</span> : <?php echo $voiture['date_creation']; ?></li>
            </ul>
            <a href="<?php echo base_url('home'); ?>" class="btn btn-outline-secondary float-right mt-3"><i class="fas fa-arrow-circle-left fa-sm fa-fw"></i> Retour</a>
        </div>
    </div>
</div>