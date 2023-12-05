<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/wp_voicelist.css">

<div style="">

<h2 class="voice_title2"><img src="https://www.xn--y5q0r2lqcz91qdrc.com/wp-content/uploads/2023/12/st@2x.png" alt="お客様の声"></h2>
<div class="voice_items_outer">
 
<div class="voice_items" id="scrollContainer">
<?php /*require_once($_SERVER['DOCUMENT_ROOT'].'/wp/wp-load.php');*/ ?>
<?php
$args = array( 'category_name' => 'c_voice', 'orderby' => 'date', 'order' => 'DESC', 'numberposts' => -1);
//$newslist = get_posts( $args );
//foreach ( $newslist as $post ) :  setup_postdata( $post ); 
$newslist = new WP_Query($args);
while ($newslist->have_posts()) : $newslist->the_post();
 ?>
    <div class="voice_item">
      <span class="voice_item_img"><?php the_post_thumbnail(); ?></span>
      <span class="voice_item_title"><?php the_title(); ?></span>
      <span class="voice_item_content note"><?php the_content(); ?></span>
    </div>
<?php
endwhile;
//endforeach;
wp_reset_postdata();
?>
</div>
 
 <div class="voice_scroll_controller">
  <span class="voice_scroll_controller_button prevbutton"><i class="fas fa-angle-left"></i></span>
  <span class="voice_scroll_controller_button nextbutton"><i class="fas fa-angle-right"></i></span>
 </div>
 
</div>
 
</div>

<script>
 /* PCでドラッグスクロール */
    const scrollContainer = document.getElementById('scrollContainer');
    let isDragging = false;
    let startX;
    let scrollLeft;

    scrollContainer.addEventListener('mousedown', (e) => {
        isDragging = true;
        startX = e.pageX - scrollContainer.offsetLeft;
        scrollLeft = scrollContainer.scrollLeft;
    });

    scrollContainer.addEventListener('mouseleave', () => {
        isDragging = false;
    });

    scrollContainer.addEventListener('mouseup', () => {
        isDragging = false;
    });

    scrollContainer.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        const x = e.pageX - scrollContainer.offsetLeft;
        const walk = (x - startX) * 2; // スクロール速度を調整
        scrollContainer.scrollLeft = scrollLeft - walk;
    });
 
 /* 左右ボタンでスクロール */
 $(function(){
  $('.prevbutton').click(function(){
   voice_scroll(-1);
  });
  $('.nextbutton').click(function(){
   voice_scroll(1);
  });
  function voice_scroll($scrollDirection){
    const pagewidth=362;
    var scrollableElement = $("#scrollContainer");
    var currentScrollLeft = scrollableElement.scrollLeft();
    var newScrollLeft;
    var pagenum = Math.floor(currentScrollLeft / pagewidth);
    if($scrollDirection<0 && (currentScrollLeft % pagewidth == 0)) pagenum--;
    if($scrollDirection>0) pagenum++;
    if(pagenum<0) pagenum=0;
    newScrollLeft = pagewidth * pagenum;
   console.log(newScrollLeft);
    scrollableElement.animate({
      scrollLeft: newScrollLeft
    }, 500);
  }
 });
</script>
