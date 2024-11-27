<?php

if (isset($partners)) {
    if (count($partners) <= 3) {
        $mostrarPartners = $partners;
    } else {
        $mostrarPartners = mezclarPartners($partners);
    }
}
?>

<?php foreach ($mostrarPartners as $partner): ?>
    <ul class="list-inline">
        <li>
            <img src="../../images/index/<?= $partner->getLogo(); ?>" alt="<?= $partner->getDescripcion(); ?>" title="<?= $partner->getDescripcion(); ?>">
        </li>
        <li>
            <?= $partner->getNombre(); ?>
        </li>
    </ul>
<?php endforeach; ?>