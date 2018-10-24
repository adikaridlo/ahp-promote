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
            [['komunikasi', 'kerjasama', 'kejujuran', 'interpesonal'], 'number'],
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
