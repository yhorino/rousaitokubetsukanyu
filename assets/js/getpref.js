/* https://ponk.jp/jquery/basic/geo */
$(function() {
  var prefs = [
    ['北海道', 43.03, 141.21, '01'],
    ['青森県', 40.49, 140.44, '02'],
    ['岩手県', 39.42, 141.09, '03'],
    ['宮城県', 38.16, 140.52, '04'],
    ['秋田県', 39.43, 140.06, '05'],
    ['山形県', 38.15, 140.20, '06'],
    ['福島県', 37.45, 140.28, '07'],
    ['茨城県', 36.22, 140.28, '08'],
    ['栃木県', 36.33, 139.53, '09'],
    ['群馬県', 36.23, 139.03, '10'],
    ['埼玉県', 35.51, 139.38, '11'],
    ['千葉県', 35.36, 140.06, '12'],
    ['東京都', 35.41, 139.45, '13'],
    ['神奈川県', 35.26, 139.38, '14'],
    ['新潟県', 37.55, 139.02, '15'],
    ['富山県', 36.41, 137.13, '16'],
    ['石川県', 36.33, 136.39, '17'],
    ['福井県', 36.03, 136.13, '18'],
    ['山梨県', 35.39, 138.34, '19'],
    ['長野県', 36.39, 138.11, '20'],
    ['岐阜県', 35.25, 136.45, '21'],
    ['静岡県', 34.58, 138.23, '22'],
    ['愛知県', 35.11, 136.54, '23'],
    ['三重県', 34.43, 136.30, '24'],
    ['滋賀県', 35.00, 135.52, '25'],
    ['京都府', 35.00, 135.46, '26'],
    ['大阪府', 34.41, 135.29, '27'],
    ['兵庫県', 34.41, 135.11, '28'],
    ['奈良県', 34.41, 135.48, '29'],
    ['和歌山県', 34.14, 135.10, '30'],
    ['鳥取県', 35.29, 134.13, '31'],
    ['島根県', 35.27, 133.04, '32'],
    ['岡山県', 34.39, 133.54, '33'],
    ['広島県', 34.23, 132.27, '34'],
    ['山口県', 34.11, 131.27, '35'],
    ['徳島県', 34.03, 134.32, '36'],
    ['香川県', 34.20, 134.02, '37'],
    ['愛媛県', 33.50, 132.44, '38'],
    ['高知県', 33.33, 133.31, '39'],
    ['福岡県', 33.35, 130.23, '40'],
    ['佐賀県', 33.16, 130.16, '41'],
    ['長崎県', 32.45, 129.52, '42'],
    ['熊本県', 32.48, 130.42, '43'],
    ['大分県', 33.14, 131.37, '44'],
    ['宮崎県', 31.56, 131.25, '45'],
    ['鹿児島県', 31.36, 130.33, '46'],
    ['沖縄県', 26.13, 127.41, '47']
  ];

navigator.geolocation.getCurrentPosition(function(pos) {
  var lat = pos.coords.latitude;
  var long = pos.coords.longitude;
 console.log('lat='+lat+' lon='+long);
  $.each(prefs, function(i, p) {
    p[4] = (lat - p[1]) * (lat - p[1]) + (long - p[2]) * (long - p[2]);
  });
  prefs.sort(function(p1, p2) {
    return p1[4] - p2[4];
  });
 
 var pref_no = prefs[0][3];
 //pref_no = '13'; // DEBUG
 console.log('pref_no='+pref_no);
 var css_url = 'url(/chusho-jigyonushi/assets/img/logo/'+pref_no+'.png)';
 console.log('css_url='+css_url);
 $('.logo_slide_pref').css('background-image', css_url);
});

});

