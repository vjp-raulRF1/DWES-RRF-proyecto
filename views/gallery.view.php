<?php include 'partials/inicio-doc.part.php'; ?>
<?php include 'partials/nav.part.php'; ?>
<!-- Principal Content Start -->
<div id="galeria">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h1>GALLERY</h1>
            <hr>
            <!--Compruebo a ver si estoy recibiendo los datos del formulario: -->
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                <!--Si el array de errores está vacio muestro una alerta de tipo info, y en caso-->
                <!--contrario muestro una alerta de tipo danger (son clases css de bootstrap) -->
                <div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissibre" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <?php if (empty($errores)): ?>
                        <p> <?= $mensaje ?></p>
                    <?php else: ?>
                        <ul>
                            <?php foreach ($errores as $error): ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="gallery/new">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Imagen</label>
                        <input class="form-control-file" type="file" name="imagen">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Categoria</label>
                        <select class="form-control" name="categoria">
                            <?php foreach ($categorias as $categoria): ?>
                                <option value="<?= htmlspecialchars($categoria->getId()) ?>">
                                    <?= htmlspecialchars($categoria->getNombre()) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Descripcion</label>
                        <textarea class="form-control" name="descripcion"> <?= $descripcion ?></textarea>
                        <button class="pull-right btn btn-lg sr-button">ENVIAR</button>
                    </div>
                </div>
            </form>
            <hr class="divider">
            <div class="imagenes_galeria">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">categoria</th>
                            <th scope="col">Visualizaciones</th>
                            <th scope="col">Likes</th>
                            <th scope="col">Descargas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($imagenes as $img): ?>
                            <tr>
                                <th scope="row"><?= $img->getId() ?></th>
                                <td>
                                    <img src="<?= $img->getUrlGallery() ?>"
                                        alt="<?= $img->getDescripcion() ?>"
                                        title="<?= $img->getDescripcion() ?>" width="100px">
                                </td>
                                <td><?= $categorias[$img->getCategoria() - 1]->getNombre() ?></td>
                                <td><?= $img->getNumVisualizaciones() ?></td>
                                <td><?= $img->getNumLikes() ?></td>
                                <td><?= $img->getNumDownloads() ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/fin-doc.part.php'; ?>