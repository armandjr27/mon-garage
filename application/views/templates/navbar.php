<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="<?php echo base_url('home'); ?>"><i class="fas fa-car fa-sm fa-fw"></i> Mon-Garage</a>

        <!-- Toggler/collapsible Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php if($title === 'Home') echo 'nav-item-selected'; ?>">
                    <a class="nav-link" href="<?php echo base_url('home'); ?>">Accueil</a>
                </li>
                <li class="nav-item <?php if(strpos($title, 'voiture')) echo 'nav-item-selected'; ?>">
                    <a class="nav-link" href="<?php echo base_url('voiture'); ?>">Voiture</a>
                </li>
                <li class="nav-item <?php if(strpos($title, 'categorie')) echo 'nav-item-selected'; ?>">
                    <a class="nav-link" href="<?php echo base_url('categorie'); ?>">Categorie</a>
                </li>
                <li class="nav-item <?php if($title === 'About') echo 'nav-item-selected'; ?>">
                    <a class="nav-link" href="<?php echo base_url('about'); ?>">A propos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>