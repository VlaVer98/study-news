<?php if(!empty($this->groups)) :?>
  <?php foreach ($this->groups as $key => $value): ?>
      <li class="nav-item">
        <a href="timetable/view?id=<?=$key?>&group=<?=$value['name']?>" class="nav-link">
          <i class="far fas fa-user-friends"></i>
          <p><?=$value['name']?></p>
        </a>
      </li>
  <?php endforeach; ?>
<?php endif; ?>
