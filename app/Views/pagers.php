<?php

/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(2);
?>

<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
	<ul class="pagination pagination-sm">
		<?php if ($pager->hasPrevious()) : ?>
			<li class="page-item">
				<a class="btn btn-sm bg-info text-white" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
					<span aria-hidden="true"><?= lang('Pager.first') ?></span>
				</a>
			</li>&nbsp;
			<li class="page-item">
				<a class="btn btn-sm bg-info text-white" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
					<span aria-hidden="true"><?= lang('Pager.previous') ?></span>
				</a>
			</li>&nbsp;
		<?php endif ?>

		<?php foreach ($pager->links() as $link) : ?>
			<li class="page-item" <?= $link['active'] ? 'class="active"' : '' ?>>
				<a href="<?= $link['uri'] ?>" class="btn btn-sm bg-info text-white ">
					<?= $link['title'] ?>
				</a>
			</li>&nbsp;
		<?php endforeach ?>

		<?php if ($pager->hasNext()) : ?>
			<li class="page-item">
				<a class="btn btn-sm bg-info text-white" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
					<span aria-hidden="true"><?= lang('Pager.next') ?></span>
				</a>
			</li>&nbsp;
			<li class="page-item">
				<a class="btn btn-sm bg-info text-white " href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
					<span aria-hidden="true"><?= lang('Pager.last') ?></span>
				</a>
			</li>&nbsp;
		<?php endif ?>
	</ul>
</nav>