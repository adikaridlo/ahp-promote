<?php

namespace app\models\charts;

use Yii;
use yii\base\Model;
use app\components\Helper;
use app\models\PrioritasSoftSkillAhp;

date_default_timezone_set('Asia/Jakarta'); 

/**
 * ContactForm is the model behind the contact form.
 */
class Chart_1 extends Model
{

    public function chartOne($type)
    {

        // for($m=1; $m<=12; ++$m){
        //     echo date('M-y', mktime(0, 0, 0, $m, 1)).'<br>';
        // };
        // exit;
        $m=0;
           
        $trx           = self::getData($type);
        // return $trx;
        foreach ($trx as $key => $value) {
            $data['NILAI'][] = (float)$value['nilai'];
            $data['NAMA'][] = $value['nama_karyawan'];
        }
        
        return empty($data) ? 0 : $data;
    }

    public function getData($type)
    {
        $select = [
                'nilai',
                'nama_karyawan'
            ];

        $data = PrioritasSoftSkillAhp::find()->select($select)
            // ->where(['YEAR(created_date)' => $year])
           ->orderBy('id ASC')->groupBy('nama_karyawan')->asArray()->all();


        return $data;
    }

}
