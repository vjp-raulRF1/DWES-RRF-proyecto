<!-- Navigation Bar -->
<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>

      </button>
      <a class="navbar-brand page-scroll" href="#page-top">
        <span>[PHOTO]</span>
      </a>
    </div>
    <div class="collapse navbar-collapse navbar-right" id="menu">
    <ul class="nav navbar-nav">
    <!-- Enlace al inicio, marcado como activo si la URL actual es /index.php -->
    <li class="<?php echo esOpcionMenuActiva("index.php") ? "active" : "" ?> lien">
        <a href="<?php echo esOpcionMenuActiva("index.php") ? "#" : "/" ?>">
            <i class="fa fa-home sr-icons"></i> Home
        </a>
    </li>
    <!-- Enlace a la página About, marcado como activo si la URL actual es /about.php -->
    <li class="<?php echo esOpcionMenuActiva("about.php") ? "active" : "" ?> lien">
        <a href="<?php echo esOpcionMenuActiva("about.php") ? "#" : "/about" ?>">
            <i class="fa fa-bookmark sr-icons"></i> About
        </a>
    </li>
    <!-- Enlace al blog, marcado como activo si la URL actual es /blog.php o /single_post.php -->
    <li class="<?php echo existeOpcionMenuActivaEnArray(["blog.php", "single_post.php"]) ? "active" : "" ?> lien">
        <a href="<?php echo esOpcionMenuActiva("blog.php") ? "#" : "/blog" ?>">
            <i class="fa fa-file-text sr-icons"></i> Blog
        </a>
    </li>
    <!-- Enlace a la página de contacto, marcado como activo si la URL actual es /contact.php -->
    <li class="<?php echo esOpcionMenuActiva("contact.php") ? "active" : "" ?> lien">
        <a href="<?php echo esOpcionMenuActiva("contact.php") ? "#" : "/contact" ?>">
            <i class="fa fa-phone-square sr-icons"></i> Contact
        </a>
    </li>
    <li class="<?php echo esOpcionMenuActiva("gallery.php") ? "active" : "" ?> lien">
        <a href="<?php echo esOpcionMenuActiva("gallery.php") ? "#" : "/gallery" ?>">
            <i class="fa fa-image sr-icons"></i> Gallery
        </a>
    </li>
    <li class="<?php echo esOpcionMenuActiva("partners.php") ? "active" : "" ?> lien">
        <a href="<?php echo esOpcionMenuActiva("partners.php") ? "#" : "/partners" ?>">
            <i class="fa fa-hand-o-right sr-icons"></i> Partners
        </a>
    </li>
</ul>
    </div>
  </div>
</nav>
<!-- End of Navigation Bar -->