<div class="col-xs-12 col-sm-6 col-md-3">
    <div class="sol">
        <img class="img-responsive" src="<?php echo $img->getUrlPortfolio(); ?>" alt="<?php echo $img->getDescripcion(); ?>">
        <div class="behind">
            <div class="head text-center">
                <ul class="list-inline">
                    <li>
                        <a class="gallery" href="<?php echo $img->getUrlGallery(); ?>" data-toggle="tooltip" data-original-title="Quick View">
                            <i class="fa fa-eye"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-original-title="Click if you like it">
                            <i class="fa fa-heart"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-original-title="Download">
                            <i class="fa fa-download"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-original-title="More information">
                            <i class="fa fa-info"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="row box-content">
                <ul class="list-inline text-center">
                    <li><i class="fa fa-eye"></i> <?php echo $img->getNumVisualizaciones(); ?></li>
                    <li><i class="fa fa-heart"></i> <?php echo $img->getNumLikes(); ?></li>
                    <li><i class="fa fa-download"></i> <?php echo $img->getNumDownloads(); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>