<?php 
	$class_tree = "";
	$angle_left = "";
	if(isset($category['childs'])) {
		$class_tree = "has-treeview";
		$angle_left = "<i class='right fas fa-angle-left nav-link posright'></i>";
	}
?>


<li class="nav-item <?=$class_tree?>">
	<div class="clearfix"></div>
    <a href="gallery/view?id=<?=$id?>&title=<?=$category['title']?>" class="category">
		<i class="fas fas fa-folder posrleft"></i>
		<p class="pl-1"><?=$category['title']?></p>
		<?=$angle_left?>
    </a>
    <?php if(isset($category['childs'])): ?>
        <ul class="nav nav-treeview">
            <?= $this->getMenuHtml($category['childs']); ?>
        </ul>
    <?php endif; ?>
</li>

