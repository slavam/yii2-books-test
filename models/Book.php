<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $title
 * @property integer $author_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $preview
 * @property string $issue
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title', 'author_id', 'created_at', 'updated_at', 'preview', 'issue'], 'required'],
            [['id', 'author_id'], 'integer'],
            [['created_at', 'updated_at', 'issue'], 'safe'],
            [['title', 'preview'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Название'),
            'author_id' => Yii::t('app', 'Автор'),
            'created_at' => Yii::t('app', 'Дата добавления'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'preview' => Yii::t('app', 'Превью'),
            'issue' => Yii::t('app', 'Дата выхода книги'),
        ];
    }

    /**
     * @inheritdoc
     * @return BookQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BookQuery(get_called_class());
    }
    
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }
}
