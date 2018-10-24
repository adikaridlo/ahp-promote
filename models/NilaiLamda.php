<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nilai_lamda".
 *
 * @property int $id
 * @property double $komunikasi
 * @property double $kerjasama
 * @property double $kejujuran
 * @property double $interpesonal
 * @property double $eigin
 * @property double $lamda
 * @property double $maks
 * @property double $ci
 * @property double $ri
 * @property double $rci
 */
class NilaiLamda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nilai_lamda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['komunikasi', 'kerjasama', 'kejujuran', 'interpesonal', 'eigin', 'lamda', 'maks', 'ci', 'ri', 'rci'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'komunikasi' => 'Komunikasi',
            'kerjasama' => 'Kerjasama',
            'kejujuran' => 'Kejujuran',
            'interpesonal' => 'Interpesonal',
            'eigin' => 'Eigin',
            'lamda' => 'Lamda',
            'maks' => 'Maks',
            'ci' => 'Ci',
            'ri' => 'Ri',
            'rci' => 'Rci',
        ];
    }
}
