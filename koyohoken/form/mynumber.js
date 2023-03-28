// https://qiita.com/kmz_kappa/items/af18ac7b6b8bfe9041b0

function Mynumber(){}

// 計算用数値Qn
Mynumber.q = [6, 5, 4, 3, 2, 7, 6, 5, 4, 3, 2];

// 12桁の個人番号が正しいかどうかを確認
Mynumber.isValid = function(duodecupleDigits){
  if(!/^\d{12}$/.test(duodecupleDigits)) return false;
  var checkDigit = this.calcCheckDigit(duodecupleDigits.substring(0, 11));
  return duodecupleDigits[11] == checkDigit;
}

// 個人番号の1～11桁からチェックデジットを求める
Mynumber.calcCheckDigit = function(undecupleDigits){
  if(!/^\d{11}$/.test(undecupleDigits)) return -1;
  // Pn * Qn の合計値
  var sumPnxQn = 0;
  for(var i = 0; i < 11; i++){
    sumPnxQn += undecupleDigits[i] * this.q[i];
  }

  var mods = sumPnxQn % 11;

  // (Pn * Qn) % 11 <= 1 のときチェックデジットは 0 とする
  if(mods <= 1){
    return 0;
  }else{
    return 11 - mods;
  }
}

