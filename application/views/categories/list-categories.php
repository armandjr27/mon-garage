<div class="container">
	<h1 id="title" class="text-center">Gestion de categories</h1>

    <div class="card">
		<div class="card-header">
			<a href="<?php echo base_url('categorie/ajouter'); ?>" class="btn btn-primary my-0"><i class="fa fa-plus"></i> Nouveau categorie</a>
		</div>
		<div class="card-body">
			<input type="search" name="search-category" id="search-category" placeholder=" Search..." class="form-control form-control-sm w-25 ml-auto font-weight-bold mb-3" />

			<table class="table table-bordered table-hover table-sm mb-3">
				<thead class="bg-dark text-light">
					<tr>
						<th>ID</th>
						<th>Nom</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="list-category">
					<?php foreach ($categories as $categorie): ?>
					<tr>
						<td class="text-center align-content-center"><?php echo $categorie['id_categorie']; ?></td>
						<td class="align-content-center"><?php echo $categorie['nom']; ?></td>
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
	</div>
</div>