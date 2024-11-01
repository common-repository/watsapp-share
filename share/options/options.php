<script>
 jQuery(document).ready(function(e) {
    
	if(jQuery('#customtitle:radio:checked').length > 0){
// go on with script
jQuery('#customtitleshare').show(300, function(){jQuery(this).slideDown('fast');
});
//alert('test');
 }
 if(jQuery('#posttitle:radio:checked').length > 0){
jQuery('#customtitleshare').hide(300, function(){jQuery(this).slideUp('fast');});

 }
 
 jQuery("#customtitle").bind('click', function(){
	jQuery('#customtitleshare').show(300, function(){jQuery(this).slideDown('fast');});
	
	
	});
jQuery("#posttitle").bind('click', function(){
	jQuery('#customtitleshare').hide(300, function(){jQuery(this).slideUp('fast');});
	
	
	});
	
 
});


 
 </script>

<div class="wrap plugin-heading">
  <?php  echo '<img class="icon" src="' . plugins_url( 'images/whatsapp-icon.png',dirname(__FILE__) ) . '" > ';?>
  <h2>WhatsApp Options</h2>
  <form method="post" action="options.php" id="radio-form">
    <?php wp_nonce_field('update-options') ?>
    <p class="share-icon"><strong>Share Button Icon:</strong>
      <input type="radio" name="iconoption" id="wa_btn_s" value="wa_btn_s" <?php if (get_option('iconoption') == 'wa_btn_s') echo 'checked'; ?>>
      <label>Small</label>
      <input type="radio" name="iconoption" id="wa_btn_m" value="wa_btn_m" <?php if (get_option('iconoption') == 'wa_btn_m') echo 'checked'; ?>>
      <label>Medium</label>
      <input type="radio" name="iconoption" id="wa_btn_l" value="wa_btn_l" <?php if (get_option('iconoption') == 'wa_btn_l') echo 'checked'; ?>>
      <label>Large</label>
    <div class="icon-preview">
      <?php  echo '<img class="icon" src="' . plugins_url( 'images/sharebut-small.png',dirname(__FILE__) ) . '" > ';?>
    </div>
    <div class="icon-preview">
      <?php  echo '<img class="icon" src="' . plugins_url( 'images/sharebut-med.png',dirname(__FILE__) ) . '" > ';?>
    </div>
    <div class="icon-preview">
      <?php  echo '<img class="icon" src="' . plugins_url( 'images/sharebut-big.png',dirname(__FILE__) ) . '" > ';?>
    </div>
    <div class="clear"></div>
    </p>
    <hr />
    
    <p class="share-icon"><strong>Share Title :</strong>
      <input type="radio" name="titleoption" id="posttitle" value="posttitle" <?php if (get_option('titleoption') == 'posttitle') echo 'checked'; ?>>
      <label>Post Title</label>
      <input type="radio" name="titleoption" id="customtitle" value="customtitle" <?php if (get_option('titleoption') == 'customtitle') echo 'checked'; ?>>
      <label>Custom Title</label>
      <input type="text" id="customtitleshare" name="customtitleshare" size="45" value="<?php echo get_option('customtitleshare'); ?>" />
    <div class="clear"></div>
    </p>
    <hr />
    
    <p class="share-icon"><strong>Show On :</strong>
      <input type="checkbox" name="post" value="post" <?php if (get_option('post') == 'post'){ echo 'checked';} ?>>
      <label>Post</label>
      <input type="checkbox" name="page" value="page"  <?php if (get_option('page') == 'page'){ echo 'checked';} ?>>
      <label>Page</label>
      <input type="checkbox" name="excerpt" value="excerpt"  <?php if (get_option('excerpt') == 'excerpt'){ echo 'checked';} ?>>
      <label>Show On Excerpt</label>
    </p>
    <hr />
    
    <p class="share-icon"><strong>Position On Page :</strong>
      <input type="radio" name="titleposition" id="aftertitle" value="aftertitle" <?php if (get_option('titleposition') == 'aftertitle') echo 'checked'; ?>>
      <label>After Title</label>
      <?php /*?><input type="radio" name="titleposition" id="beforetitle" value="beforetitle" <?php if (get_option('titleposition') == 'beforetitle') echo 'checked'; ?>>Before Title<br /><?php */?>
      <input type="radio" name="titleposition" id="aftercontent" value="aftercontent" <?php if (get_option('titleposition') == 'aftercontent') echo 'checked'; ?>>
      <label>After Content</label>
     </p>
     
    <p>
      <input type="submit" name="Submit" value="Save Changes" class="whtsavebut" />
    </p>
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="titleposition,post,page,customtitleshare,titleoption,excerpt,iconoption" />
  </form>
</div>
<hr />
<div class="wrap">
  <div class="title-here">WhatsApp Short Code</div>
  <div class="short-code">[whatsappshare]</div>
  <div class="short-code-description">Short Code supports <strong>Share Button Icon</strong> and <strong>Share Title</strong> functionality.</div>
</div>
