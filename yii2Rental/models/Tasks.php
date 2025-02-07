<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id_task
 * @property string $code
 * @property string $name
 * @property string|null $description
 * @property int $status
 * @property int $created_by
 * @property string $created_at
 * @property int $updatedted_by
 * @property string $updatedted_at
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name', 'status', 'created_by', 'created_at', 'updatedted_by', 'updatedted_at'], 'required'],
            [['description'], 'string'],
            [['status', 'created_by', 'updatedted_by'], 'integer'],
            [['created_at', 'updatedted_at'], 'safe'],
            [['code'], 'string', 'max' => 25],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_task' => 'Id Task',
            'code' => 'Code',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updatedted_by' => 'Updatedted By',
            'updatedted_at' => 'Updatedted At',
        ];
    }
}
