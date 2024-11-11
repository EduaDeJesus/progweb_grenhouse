<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Usuario extends ActiveRecord implements IdentityInterface
{
    public $senha_confirmacao;

    public static function tableName()
    {
        return 'usuarios';
    }

    public function rules()
    {
        return [
            [['nome', 'email', 'senha'], 'required'],
            [['nome', 'email'], 'string', 'max' => 255],
            ['email', 'email'],
            [['telefone'], 'integer'],
            ['email', 'unique', 'targetClass' => Usuario::class, 'message' => 'Este e-mail já está em uso.'],
            ['senha', 'string', 'min' => 6],
            [['funcao'], 'integer'],
            ['senha_confirmacao', 'compare', 'compareAttribute' => 'senha', 'message' => 'As senhas não coincidem.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'nome' => 'Nome',
            'email' => 'E-mail',
            'telefone' => 'Telefone',
            'senha' => 'Senha',
            'senha_confirmacao' => 'Confirmar Senha',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return false;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isAttributeChanged('senha')) {
                $this->senha = Yii::$app->getSecurity()->generatePasswordHash($this->senha);
            }
            return true;
        }
        return false;
    }

    public function createUsuario()
    {
        return $this->validate() && $this->save();
    }
}