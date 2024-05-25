<div class="container mt-4">
    <h2 class="text-center mb-3"><?php echo $title; ?></h2>
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-body">
                <form method="post" action="<?php echo base_url(isset($categorie['id_categorie']) ? 'categorie/save/' . $categorie['id_categorie'] : 'categorie/save/0'); ?>" >
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" placeholder="Insérez un nom" id="nom" name="nom" value="<?php echo set_value('nom') ? set_value('nom') : (isset($categorie['nom']) ? $categorie['nom']: '');?>">
                        <?php echo form_error('nom', '<div class="text-danger">', '</div>');?>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="4" id="description" name="description"><?php echo set_value('description') ? set_value('description') : (isset($categorie['description']) ? $categorie['description']: '...');?></textarea>
                        <?php echo form_error('description', '<div class="text-danger">', '</div>');?>
                    </div>
                    <?php echo isset($categorie['id_categorie']) 
                        ? '<button type="submit" class="btn btn-success"> Modifier</button>' 
                        : '<button type="submit" class="btn btn-primary"> Ajouter</button>'; 
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>