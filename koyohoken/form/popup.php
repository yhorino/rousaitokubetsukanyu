
<!-- https://www.sejuku.net/blog/104657 -->
 <!-- クーポンコードのポップアップ１ -->
<div class="popup_c1" style="">
  <div class="content">
   <img src="ic_att.svg" alt="" id="symbol_a">
   <p class="popup_title">雇用保険番号をお急ぎの方へ</p>
   <ol class="popup_list circle_number">
    <li>前職の雇用保険喪失の手続がお済でない場合は、雇用保険に入れません。</li>
    <li>雇用保険番号は、入社日には出ません。</li>
   </ol>
   <p class="popup_alert">お急ぎの方は、必ずお申し込み後に事務組合RJCまでお電話（0120-855-865）ください。</p>
   <a href="#" id="popup_c1_close" class="popup_close">確認しました</a>
  </div>
</div>
 
  <script>
$(function(){
 
$("#question1").on("click", function() {
  $(".popup_c1").fadeIn();
});
$("#popup_c1_close").on("click", function() {
  $(".popup_c1").fadeOut();
});
});
  </script>
  <style>
.show_pc{
 display: block;
}
.hide_pc{
 display: none;
}
.popup_c1 {
  height: 100vh;
  width: 100%;
  background: rgba(0,0,0,0.5);
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 200;
}
.popup_c1 a#popup_c1_close {
    display: block;
    max-width: 400px;
    text-align: center;
    padding: 1em;
    margin: 30px auto 0;
    cursor: pointer;
    color: #fff;
    border-radius: 2em;
    text-decoration: none;
    background-color: #E66700;
    width: 200px;
 position: relative;
}
.popup_c1 a#popup_c1_close:hover,
.popup_c1 a#popup_c1_close:hover img{
 opacity: 1;
 
}
.popup_c1 a#popup_c1_close img{
 width: 100%;
}
   
.popup_c1 a#popup_c1_close::after {
    font-family: "Font Awesome 5 Free";
    content: '\f0da';
    font-size: 18px;
    font-weight: 900;
    color: #fff;
    position: absolute;
    /* top: 32%; */
    right: 15px;
    top: 50%;
    transform: translate(0%, -50%);
    -webkit-transform: translate(0%, -50%);
    -ms-transform: translate(0%, -50%);
}
   
.popup_c1 .content{
 width: 90vw;
 max-width: 650px;
 background-color: #fff;
 padding: 30px 140px 40px 140px;
 text-align: center;
 position: relative;
 box-shadow: 2px 2px 3px 0px rgb(50,50,50,0.7);
 border-radius: 15px;
 border: 3px solid #E66700;
}
   
.popup_c1 .content .popup_title {
    font-size: 22px;
    font-weight: bold;
    color: #E66700;
    margin: 20px auto;
}
   
.popup_c1 .content #symbol_a{
 /*
 position: absolute;
 top: -30px;
 left: -30px;
 */
 width: 50px;
}
.popup_c1 .content p{
 margin: 5px;
}

.popup_list {
    text-align: left;
    margin: 20px auto;
 list-style: decimal;
}
.popup_list li {
    margin-bottom: 20px;
}
ol.circle_number {
  counter-reset: my-counter;
  list-style: none;
  padding: 0;
  margin: 0;
}
.circle_number li {
  font-size: 16px;
  line-height: 1.5;
  padding-left: 30px;
  position: relative;
}
.circle_number li:before {
  content: counter(my-counter);
  counter-increment: my-counter;
  background-color: #555;
  border: 1px solid;
  border-radius: 50%;
  box-sizing: border-box;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 22px;
  width: 22px;
  color: #ffffff;
  font-size: 85%;
  line-height: 1;
  position: absolute;
  top: 0;
  left: 0;
}
   
.popup_alert {
    text-align: left;
    color: #CE0023;
 font-weight: bold;
}

@media screen and (max-width: 960px) {
 .show_sp{
  display: block;
 }
 .hide_sp{
  display: none !important;
 }
 .popup_c1 .content{
  font-size: 14px;
  max-width: 90%;
  padding: 30px 15px 40px 15px;
 }
 .popup_c1 .content #symbol_a{
  top: -21px;
  left: -23px;
  width: 44px;
 }
}
  </style>
  <!-- https://www.sejuku.net/blog/104657 -->