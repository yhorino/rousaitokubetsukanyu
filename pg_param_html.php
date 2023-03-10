   <form name="form" method="post" action="<?php echo $pg_url;?>">
    
   <!-- 共通 -->
   <input type="hidden" name="trading_id" value="<?php echo $trading_id;?>">
   <input type="hidden" name="payment_type" value="<?php echo $payment_type;?>">
   <input type="hidden" name="fix_params" value="">
   <input type="hidden" name="id" value="<?php echo $id;?>">
   <input type="hidden" name="hc" value="<?php echo $hash;?>">
   <input type="hidden" name="seq_merchant_id" value="<?php echo $seq_merchant_id;?>">
   <input type="hidden" name="merchant_name" value="<?php echo $merchant_name;?>">
   <input type="hidden" name="payment_detail" value="<?php echo $payment_detail;?>">
   <input type="hidden" name="payment_detail_kana" value="<?php echo $payment_detail_kana;?>">
   <input type="hidden" name="payment_term_day" value="<?php echo $payment_term_day;?>">
   <input type="hidden" name="payment_term_min" value="<?php echo $payment_term_min;?>">
   <input type="hidden" name="banner_url" value="<?php echo $banner_url;?>">
   <input type="hidden" name="free_memo" value="">
   <input type="hidden" name="return_url" value="<?php echo $return_url;?>">
   <input type="hidden" name="stop_return_url" value="<?php echo $stop_return_url;?>">
   <input type="hidden" name="copy_right" value="">
   <input type="hidden" name="customer_family_name" value="">
   <input type="hidden" name="customer_name" value="">
   <input type="hidden" name="customer_family_name_kana" value="">
   <input type="hidden" name="customer_name_kana" value="">
   <input type="hidden" name="isbtob" value="">
   <input type="hidden" name="site_id" value="">
   <input type="hidden" name="company_name" value="">
   <input type="hidden" name="finish_disable" value="1">
   <input type="hidden" name="mail_send_flg_success" value="">
   <input type="hidden" name="mail_send_flg_failure" value="">

   <!-- カード決済 -->
   <input type="hidden" name="payment_class" value="<?php echo $payment_class;?>">
   <input type="hidden" name="use_card_conf_number" value="<?php echo $use_card_conf_number;?>">
   <input type="hidden" name="stock_card_mode" value="<?php echo $stock_card_mode;?>">
   <input type="hidden" name="customer_id" value="<?php echo $customer_id;?>">
   <input type="hidden" name="threedsecure_ryaku" value="<?php echo $threedsecure_ryaku;?>">
   <input type="hidden" name="sales_flg" value="">
   <input type="hidden" name="appendix" value="">
   <input type="hidden" name="re_payment_type" value="">
