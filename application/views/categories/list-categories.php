
<div class="container">
	<h1 id="title" class="text-center">Gestion de categories</h1>

    <a href="<?php echo base_url('categorie/ajouter'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Nouveau categorie</a>

	<input type="search" name="search-card" id="search-card" placeholder="  Search ..." class="form-control form-control-sm w-25 ml-auto font-weight-bold mb-2" />

	<table class="table table-bordered table-hover table-sm mb-5">
		<thead class="bg-dark text-light">
			<tr>
				<th>ID</th>
				<th>Nom</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($categories as $categorie): ?>
			<tr>
				<td class="text-center align-content-center"><?php echo $categorie['id_categorie']; ?></tdclass=>
				<td class="align-content-center"><?php echo $categorie['nom']; ?></tdclass=>
				<td class="align-content-center"><?php echo $categorie['description']; ?></td>
				<td class="text-center align-content-center">
                    <a href="<?php echo base_url('categorie/modifier/' . $categorie['id_categorie']); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Modifier</a>
                    <a href="<?php echo base_url('categorie/supprimer/' . $categorie['id_categorie']); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Supprimer</a>
                </td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>