<?php $pager->setSurroundCount(2); ?>

<ul class="pagination float-right">
    <?php if ($pager->hasPrevious()) { ?>
        <li class="page-item">
            <a href="<?= $pager->getFirst() ?>" class="page-link">
                <span aria-hidden="true">First</span>
            </a>
        </li>
        <li class="page-item">
            <a href="<?= $pager->getPrevious() ?>" class="page-link">
                <span>&laquo;</span>
            </a>
        </li>
    <?php } ?>

    <?php
    foreach ($pager->links() as $link) {
        $activeclass = $link['active'] ? 'active' : '';
    ?>
        <li class="page-item <?= $activeclass ?>">
            <a href="<?= $link['uri'] ?>" class="page-link">
                <?= $link['title'] ?>
            </a>
        </li>
    <?php } ?>

    <?php if ($pager->hasNext()) { ?>
        <li class="page-item">
            <a href="<?= $pager->getNext() ?>" class="page-link">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        <li class="page-item">
            <a href="<?= $pager->getLast() ?>" aria-label="Last" class="page-link">
                <span aria-hidden="true">Last</span>
            </a>
        </li>
    <?php } ?>
</ul>

<!-- <ul class="pagination m-0 float-right">
    <li class="page-item"><a class="page-link" href="#">«</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">»</a></li>
</ul> -->