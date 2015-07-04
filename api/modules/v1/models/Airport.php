<?php
 
namespace api\modules\v1\models;
 
use \yii\db\ActiveRecord;
/**
 * Airport Model
 *
 */
class Airport extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'airport';
    }
    
    public static function primaryKey()
    {
        return ['airport_code'];
    }
    
    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['airport_code', 'airport_name', 'country', 'city'], 'required']
        ];
    }
}