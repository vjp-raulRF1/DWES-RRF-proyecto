<!-- Box within partners name and logo -->
<div class="last-box row">
    <div class="col-xs-12 col-sm-4 col-sm-push-4 last-block">
        <div class="partner-box text-center">
            <p>
                <i class="fa fa-map-marker fa-2x sr-icons"></i>
                <span class="text-muted">35 North Drive, Adroukpape, PY 88105, Agoe Telessou</span>
            </p>
            <h4>Our Main Partners</h4>
            <hr>
            <div class="text-muted text-left">
                <ul class="list-inline">
                    <?php if (!empty($arrayPartners) && isset($arrayPartners[0])): ?>
                        <li>
                            <img src="/images/index/<?= htmlspecialchars($arrayPartners[0]->getLogo(), ENT_QUOTES, 'UTF-8') ?>"
                                alt="<?= htmlspecialchars($arrayPartners[0]->getDescripcion(), ENT_QUOTES, 'UTF-8') ?>"
                                title="<?= htmlspecialchars($arrayPartners[0]->getDescripcion(), ENT_QUOTES, 'UTF-8') ?>">
                        </li>
                        <li><?= htmlspecialchars($arrayPartners[0]->getNombre(), ENT_QUOTES, 'UTF-8') ?></li>
                    <?php else: ?>
                        <li>No hay socios disponibles.</li>
                    <?php endif; ?>
                </ul>
                <ul class="list-inline">
                    <?php if (!empty($arrayPartners) && isset($arrayPartners[1])): ?>
                        <li>
                            <img src="/images/index/<?= htmlspecialchars($arrayPartners[1]->getLogo(), ENT_QUOTES, 'UTF-8') ?>"
                                alt="<?= htmlspecialchars($arrayPartners[1]->getDescripcion(), ENT_QUOTES, 'UTF-8') ?>"
                                title="<?= htmlspecialchars($arrayPartners[1]->getDescripcion(), ENT_QUOTES, 'UTF-8') ?>">
                        </li>
                        <li><?= htmlspecialchars($arrayPartners[1]->getNombre(), ENT_QUOTES, 'UTF-8') ?></li>
                    <?php else: ?>
                        <li>No hay socios disponibles.</li>
                    <?php endif; ?>
                </ul>
                <ul class="list-inline">
                    <?php if (!empty($arrayPartners) && isset($arrayPartners[2])): ?>
                        <li>
                            <img src="/images/index/<?= htmlspecialchars($arrayPartners[2]->getLogo(), ENT_QUOTES, 'UTF-8') ?>"
                                alt="<?= htmlspecialchars($arrayPartners[2]->getDescripcion(), ENT_QUOTES, 'UTF-8') ?>"
                                title="<?= htmlspecialchars($arrayPartners[2]->getDescripcion(), ENT_QUOTES, 'UTF-8') ?>">
                        </li>
                        <li><?= htmlspecialchars($arrayPartners[2]->getNombre(), ENT_QUOTES, 'UTF-8') ?></li>
                    <?php else: ?>
                        <li>No hay socios disponibles.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Box within partners name and logo -->