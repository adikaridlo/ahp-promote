<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perhitungan_prioritas".
 *
 * @property int $id
 * @property string $nama_karyawan
 * @property double $komunikasi
 * @property double $kerjasama
 * @property double $kejujuran
 * @property double $interpesonal
 * @property double $eigin
 */
class PerhitunganPrioritas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perhitungan_prioritas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['komunikasi', 'kerjasama', 'kejujuran', 'interpesonal', 'eigin'], 'number'],
            [['nama_karyawan'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_karyawan' => 'Nama Karyawan',
            'komunikasi' => 'Komunikasi',
            'kerjasama' => 'Kerjasama',
            'kejujuran' => 'Kejujuran',
            'interpesonal' => 'Interpesonal',
            'eigin' => 'Eigin',
        ];
    }
}
