
<li class="my_li">
	<a href="/admin/gallery/edit-category?id=<?=$id?>" class="my_a shadow-sm rounded "><?=$category['title']?></a>
	<?php if(isset($category['childs'])): ?>
		<a class = "delete category-err"><i class="fas fa-times text-gray pull-right"></i></a>
	<?php else: ?>
		<a href="/admin/gallery/delete-category?id=<?=$id?>" class = "delete category"><i class="fas fa-times text-red pull-right"></i></a>
    <?php endif; ?>
    <?php if(isset($category['childs'])): ?>
        <ul class="my_ul">
            <?= $this->getMenuHtml($category['childs']); ?>
        </ul>
    <?php endif; ?>
</li>
<th>