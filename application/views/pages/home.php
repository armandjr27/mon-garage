
<div class="container">
	<h1 id="title" class="text-center">Les voitures disponibles dans le garage</h1>

	<input type="search" name="search-card" id="search-card" placeholder="  Search voiture..." class="form-control form-control-sm w-25 ml-auto font-weight-bold mb-4" />

	<div class="row" id="card-car">
    <?php foreach ($voitures as $voiture) : ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card" style="height:460px;">
                <img src="<?php echo base_url('public/uploads/' . $voiture['image'] ); ?>" alt="<?php echo $voiture['marque'] . '-' . $voiture['numero']; ?>" title="<?php echo $voiture['marque'] . '-' . $voiture['numero']; ?>" class="card-img-top" loading="lazy"/>
                <div class="card-body">
                    <h4 class="card-title font-weight-bolder mb-3"><?php echo $voiture['marque']; ?></h4>
                    <p class="card-text mb-1"><strong>Couleur : </strong><?php echo $voiture['couleur']; ?></p>
                    <p class="card-text mb-1"><strong>Catégorie : </strong><?php echo $voiture['nom']; ?></p>
                    <a href="<?php echo base_url('voiture/detail/' . $voiture['id_voiture']); ?>" class="btn btn-primary btn-block mt-4">Plus d'info</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
	</div>
    <p><?php echo $links; ?></p>
</div>
