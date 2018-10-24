<?php 
use yii\helpers\Html;
?>
    
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <?=Html::img(Yii::getAlias('@web/theme/assets/mom_asset/Landing Pages/MOM (BNI).png'))?>
            
            <div id="text-footer-logo">
            Hak cipta 2018 PT. Bank Negara Indonesia (persero). Tbk <br>
            Transactional Banking Service Division<br>
            Wisma 46 - Kota BNI, Lt. 3 Jl. Jenderal Sudirman Kav 1<br>
            Jakarta Pusat 10220 
            </div>
        </div>
        <div class="col-md-6 col-xs-12" style="margin-top: 4%">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <!-- <div class="row"> -->
                    <div>
                        <?=Html::img(Yii::getAlias('@web/theme/assets/mom_asset/Landing Pages/Layer 11.png'))?>
                        <?=Html::img(Yii::getAlias('@web/theme/assets/mom_asset/Landing Pages/facebook-logo-button.png'))?>
                        <?=Html::img(Yii::getAlias('@web/theme/assets/mom_asset/Landing Pages/twitter-logo-button.png'))?>
                    </div>
                    <!-- </div> -->
                </div>
                <div class="col-md-5 col-sm-3">
                    <!-- <div class="inline-block col-sm-3 col-xs-12"> -->
                        <div id="border-email">
                            <div id="text-email-footer"> Email </div>
                            <div id="text-subscribe-footer"> Subscribe </div>
                        </div>
                    <!-- </div> -->
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div id="footer-right-content"> Contact <br>
                        <?=Html::img(Yii::getAlias('@web/theme/assets/mom_asset/Landing Pages/phone-call.png'))?>
                            (021) 1500046 <br>
                        <?=Html::img(Yii::getAlias('@web/theme/assets/mom_asset/Landing Pages/mail.png'))?>
                        mom@bni.co.id
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
