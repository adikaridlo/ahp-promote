<?php 
use yii\helpers\Html;
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <p class="text-faded mb-4" id="text-tentang-kami">
                <b>Kami dapat mengakomodir pendaftaran bagi Aggregator dan Single Merchant agar dapat menerima pembayaran dari Yap!</b>
                <br><br> 
                Proses pendaftaran dapat dilakukan secara online demi memudahkan Merchant yang ingin ber-gabung
                <br><br> 
                MOM menyasar berbagai Merchant dari tipe mikro, menengah, hingga kelas atas. MOM menyediakan dashboard monitoring secara realtime dari setiap transaksi yang ada.
            </p>
        </div>
        <div class="col-md-8">
            <div id="image-tentang-kami">
                <?=Html::img(Yii::getAlias('@web/theme/assets/mom_asset/Landing Pages/Tentang MOM.png'))?>      
            </div>
        </div>
    </div>
</div>