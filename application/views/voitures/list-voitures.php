
<div class="container">
	<h1 id="title" class="text-center">Gestion de voitures</h1>

    <a href="<?php echo base_url('voiture/ajouter'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Nouveau voiture</a>

	<input type="search" name="search-voiture" id="search-voiture" placeholder="  Search voiture..." class="form-control form-control-sm w-25 ml-auto font-weight-bold mb-2" />

	<table class="table table-bordered table-hover table-sm mb-5">
		<thead class="bg-dark text-light">
			<tr>
				<th>ID</th>
				<th>Image</th>
				<th>Marque</th>
				<th>Numéro Matricule</th>
				<th>Couleur</th>
				<th>Catégorie</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="list-car">
			<?php foreach ($voitures as $voiture): ?>
			<tr>
				<td class="text-center align-content-center"><?php echo $voiture['id_voiture']; ?></td>
				<td class="text-center"><img src="<?php echo base_url('public/uploads/' . $voiture['image'] ); ?>" alt="<?php echo $voiture['marque'] . '-' . $voiture['numero']; ?>" title="<?php echo $voiture['marque'] . '-' . $voiture['numero']; ?>" width="111"/></td>
				<td class="align-content-center"><?php echo $voiture['marque']; ?></td>
				<td class="align-content-center"><?php echo $voiture['numero']; ?></td>
				<td class="align-content-center"><?php echo $voiture['couleur']; ?></td>
				<td class="align-content-center"><?php echo $voiture['nom']; ?></td>
				<td class="text-center align-content-center">
                    <a href="<?php echo base_url('voiture/modifier/' . $voiture['id_voiture']); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Modifier</a>
                    <a href="<?php echo base_url('voiture/supprimer/' . $voiture['id_voiture']); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Supprimer</a>
                </td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>