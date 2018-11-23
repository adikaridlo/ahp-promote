<?php
namespace app\models\charts;

use Yii;
use yii\base\Model;

/**
* 
*/
class ModelForm extends Model
{
	public $year;
	public $month;
	public function rules()
	{
		return[
		 [['year'], 'string'],
		 [['month'], 'string']
		];
	}
}

?>