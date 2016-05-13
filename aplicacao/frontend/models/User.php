<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $nome
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $role
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $email
 * @property string $grupoacesso
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $senha;
    public $confirmaSenha;
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'nome', 'confirmaSenha', 'senha','grupoacesso' ], 'required'],
            [['username'], 'string', 'max' => 20],
            [['nome', 'role', 'status', 'created_at', 'updated_at', 'grupoacesso'], 'string', 'max' => 45],
            [['auth_key'], 'string', 'max' => 32],
            [['senha', 'confirmaSenha'], 'string', 'max' => 255],
            ['confirmaSenha', 'compare', 'compareAttribute' => 'senha', 'message' => 'Essas senhas não coincidem. Tentar novamente?'],
            [['email'], 'string', 'max' => 100],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Nome de usuário',
            'nome' => 'Nome',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Senha',
            'password_reset_token' => 'Password Reset Token',
            'role' => 'Role',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'email' => 'Email',
            'grupoacesso' => 'Grupoacesso',
        ];
    }

   public function beforeSave($insert)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($this->senha);
        $this->auth_key = Yii::$app->security->generateRandomString();

        if (parent::beforeSave($insert)) 
        {
        // ...custom code here...
            return true;
        } 
        else
        {
            return false;
        }
    }
}
