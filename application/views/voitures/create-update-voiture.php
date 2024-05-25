<div class="container mt-4">
    <h2 class="text-center mb-3"><?php echo $title; ?></h2>
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-body">
                <form method="post" action="<?php echo base_url(isset($voiture['id_voiture']) ? 'voiture/save/' . $voiture['id_voiture'] : 'voiture/save/0'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="marque">Marque</label>
                        <input type="text" class="form-control" placeholder="Insérez la marque" id="marque" name="marque" value="<?php echo set_value('marque') ? set_value('marque') : (isset($voiture['marque']) ? $voiture['marque'] : '');?>">
                        <?php echo form_error('marque', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="numero">Numero</label>
                        <input type="text" class="form-control" placeholder="Insérez le numero" id="numero" name="numero" value="<?php echo set_value('numero') ? set_value('numero') : (isset($voiture['numero']) ? $voiture['numero'] : '');?>">
                        <?php echo form_error('numero', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="couleur">Couleur</label>
                        <input type="text" class="form-control" placeholder="Insérez la couleur" id="couleur" name="couleur" value="<?php echo set_value('couleur') ? set_value('couleur') : (isset($voiture['couleur']) ? $voiture['couleur']: '');?>">
                        <?php echo form_error('couleur', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="categorie">Catégorie</label>
                        <select name="categorie" id="categorie" class="custom-select">
                            <?php if(isset($voiture['nom']) && isset($voiture['id_categorie'])) : ?>
                                <option value="<?php echo $voiture['id_categorie']; ?>"><?php echo $voiture['nom']; ?></option>
                            <?php else : ?>
                                <option value="0">Choisir la catégorie de la voiture</option>
                            <?php endif; ?>
                            <?php foreach($categories as $categorie) : ?>
                                <?php if(isset($voiture['nom']) && $voiture['nom'] == $categorie['nom']) continue; ?>
                                <option <?php echo set_select('categorie', $categorie['id_categorie']); ?> value="<?php echo $categorie['id_categorie']; ?>"><?php echo $categorie['nom']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('categorie', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Télécharger l'image correspondant</label>
                        </div>
                        <?php echo isset($_SESSION['error']) ? $_SESSION['error'] : ''; ?>
                    </div>
                    <?php echo isset($voiture['id_voiture']) 
                        ? '<button type="submit" class="btn btn-success"> Modifier</button>' 
                        : '<button type="submit" class="btn btn-primary"> Ajouter</button>'; 
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>