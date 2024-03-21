<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/wp_voicelist.css">

<div style="">

<h2 class="voice_title2"><img src="https://www.xn--y5q0r2lqcz91qdrc.com/wp-content/uploads/2023/12/st@2x.png" alt="お客様の声"></h2>
<div class="voice_score"><img src="/wp-content/uploads/2024/01/voice39_pc.png" alt="" class="show_pc hide_sp"><img src="/wp-content/uploads/2024/01/voice39_sp.png" alt="" class="show_sp hide_pc"></div>
<div class="voice_items_outer">
 
<div class="voice_items" id="scrollContainer">
<?php /*require_once($_SERVER['DOCUMENT_ROOT'].'/wp/wp-load.php');*/ ?>
<?php
$args = array( 'category_name' => 'c_voice', 'orderby' => 'date', 'order' => 'DESC', 'numberposts' => -1);
//$newslist = get_posts( $args );
//foreach ( $newslist as $post ) :  setup_postdata( $post ); 
$newslist = new WP_Query($args);
 
function get_the_content_starvalue($_content){
    // 正規表現を使用して star_value クラスが設定された span タグを抜き出す
    preg_match('/<(\w+)[^>]*class\s*=\s*["\']([^"\']*\bstar_value\b[^"\']*)["\'][^>]*>(.*?)<\/\1>/', $_content, $matches);

    // $matches[0] にはマッチした全体の部分が、$matches[3] にはキャプチャした部分が格納される
    $_specific_content = isset($matches[3]) ? $matches[3] : '';

    return $_specific_content;
}
function get_the_content_without_starvalue($_content){
    $_specific_content = preg_replace('/<(\w+)[^>]*class\s*=\s*["\']([^"\']*\bstar_value\b[^"\']*)["\'][^>]*>.*?<\/\1>/', '', $_content);

    return $_specific_content;
}
 
while ($newslist->have_posts()) : $newslist->the_post();
 ?>
    <div class="voice_item">
      <span class="voice_item_img"><?php the_post_thumbnail(); ?></span>
      <span class="voice_item_title"><?php the_title(); ?></span>
     <?php
     $star_value_str = get_the_content_starvalue(get_the_content());
     $star_tag = '';
     if($star_value_str != ''){ 
      $star_value = intval($star_value_str);
      for($i=0;$i<5;$i++){
       if($i<$star_value){
        $star_tag .= '<i class="fas fa-star star_on"></i>';
       } else {
        $star_tag .= '<i class="fas fa-star star_off"></i>';
       }
      }
     }
     ?>
      <span class="voice_item_star"><?php echo $star_tag; ?></span>
      <span class="voice_item_content note"><?php echo get_the_content_without_starvalue(get_the_content()); ?></span>
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
 /*
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
 */
 /* 左右ボタンでスクロール */
 $(function(){
  $('.prevbutton').click(function(){
   voice_scroll(-1, false);
  });
  $('.nextbutton').click(function(){
   voice_scroll(1, false);
  });
  // 4秒ごとにスクロール
  setInterval(function(){voice_scroll(1, true);}, 4000);
  
  function voice_scroll($scrollDirection, $loop){
    const gap = 30;
    const pagewidth=getVoiceItemWidth() + gap;
    var scrollableElement = $("#scrollContainer");
    var currentScrollLeft = scrollableElement.scrollLeft();
    var newScrollLeft;
    var pagenum = Math.floor(currentScrollLeft / pagewidth);
    if($scrollDirection<0 && (currentScrollLeft % pagewidth == 0)) pagenum--;
    if($scrollDirection>0) pagenum++;
    if(pagenum<0) pagenum=0;
    newScrollLeft = pagewidth * pagenum;
   
    if ($loop == true){
     var viewWidth = scrollableElement.innerWidth();
     var scrollWidth = getVoiceItemNum() * pagewidth - gap;
     var currentScrollRight = currentScrollLeft + viewWidth;
     if(currentScrollRight >= scrollWidth) {
      newScrollLeft = 0;
     }
    }
   
    scrollableElement.animate({
      scrollLeft: newScrollLeft
    }, 500);
  }
  function getVoiceItemWidth(){
   const voiceItemsContainer = document.querySelector('.voice_items');
   const voiceItemElements = voiceItemsContainer.querySelectorAll('.voice_item');
   const widthOfVoiceItems = voiceItemElements[0].offsetWidth;
   return widthOfVoiceItems;
  }
  function getVoiceItemNum(){
   const voiceItemsContainer = document.querySelector('.voice_items');
   const voiceItemElements = voiceItemsContainer.querySelectorAll('.voice_item');
   const numberOfVoiceItems = voiceItemElements.length;   
   return numberOfVoiceItems;
  }
 });
 
</script>
