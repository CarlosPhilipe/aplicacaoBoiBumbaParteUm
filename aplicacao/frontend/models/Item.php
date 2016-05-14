<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property integer $iditem
 * @property string $nome
 * @property string $descricao
 * @property string $imagem
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao'], 'string'],
            [['nome'], 'string', 'max' => 45],
            [['imagem'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iditem' => 'Item',
            'nome' => 'Nome',
            'descricao' => 'Descrição',
            'imagem' => 'Imagem',
        ];
    }
}
