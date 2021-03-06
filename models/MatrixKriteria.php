<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matrix_kriteria".
 *
 * @property int $id
 * @property int $komunikasi
 * @property int $kerjasama
 * @property int $kejujuran
 * @property int $interpersonal
 */
class MatrixKriteria extends \yii\db\ActiveRecord
{
    public $sum_komunikasi, $sum_kerjasama, $sum_kejujuran, $sum_interpesonal;
    public $avg_komunikasi, $avg_kerjasama, $avg_kejujuran, $avg_interpesonal;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matrix_kriteria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['komunikasi', 'kerjasama', 'kejujuran', 'interpesonal', 'sum_komunikasi', 'sum_kerjasama', 'sum_kejujuran', 'sum_interpesonal', 'avg_komunikasi', 'avg_kerjasama', 'avg_kejujuran', 'avg_interpesonal' ], 'number'],
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
            'interpersonal' => 'Interpersonal',
        ];
    }
}
