<div class="user-avatar content-thumb">
  <?php if (!empty($avatar_url)): ?>
    <img src="<?php print $avatar_url; ?>" alt="">
  <?php endif; ?>

</div>
<div class="user-menu-links">
  <a href="<?php print url('my-profile'); ?>" class="user-link <?php print current_path() == 'my-profile' ? 'active' : ''?>"><i class="fa fa-user"></i><?php print t('My Profile'); ?></a>
  <a href="<?php print url('my-properties'); ?>" class="user-link <?php print current_path() == 'my-properties' ? 'active' : ''?>"><i class="fa fa-home"></i><?php print t('My Properties'); ?></a>
</div>
<div class="user-menu-links user-menu-logout">
  <a href="<?php print url('user/logout'); ?>" class="user-link" title="Logout"><i class="fa fa-sign-out"></i><?php print t('Log Out'); ?></a>
</div>
<div class="user-menu-submit">
  <a href="<?php print base_path().'user'; ?>" class="btn btn-secondary"><?php print t('MORE DETAIL'); ?></a>
</div>