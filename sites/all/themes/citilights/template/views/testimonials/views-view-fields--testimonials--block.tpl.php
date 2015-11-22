<div class="slide-content">
  <div class="testimonial-desc">&ldquo;<?php print $fields['field_testi_quote']->content;?>&rdquo;</div>
  <div class="our-customer-info">
    <div class="avatar">
      <a href="#"><img src="<?php print image_style_url('avatar_thumbnail', $fields['field_testi_thumbnail']->content);?>" alt=""></a>
    </div>
    <div class="custom-desc">
      <h4><?php print $fields['title']->content;?></h4>
      <p><?php print $fields['field_testi_sub_title']->content;?></p>
    </div>
  </div>
</div>