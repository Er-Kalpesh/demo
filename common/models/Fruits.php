<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "fruits".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $ext_id
 * @property string|null $family
 * @property string|null $fruit_order
 * @property string|null $genus
 * @property string|null $nutritions
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Fruits extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fruits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ext_id', 'created_at', 'updated_at','is_favorite'], 'integer'],
            [['nutritions'], 'string'],
            [['name', 'family', 'fruit_order', 'genus'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'ext_id' => 'Ext ID',
            'family' => 'Family',
            'fruit_order' => 'Fruit Order',
            'genus' => 'Genus',
            'nutritions' => 'Nutritions',
            'is_favorite' => 'Favourite',
            'created_at' => 'Created At',
            'updated_at' => 'Modified At',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     * @return FruitsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FruitsQuery(get_called_class());
    }
}
