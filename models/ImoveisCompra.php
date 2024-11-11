<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class ImoveisCompra extends ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imagemUpload;

    public static function tableName()
    {
        return 'imoveis_compra';
    }

    public function rules()
    {
        return [
            [['tipo_imovel', 'preco', 'nome', 'endereco'], 'required'],
            ['tipo_imovel', 'in', 'range' => ['apartamento', 'casa', 'condominio', 'area']],
            ['preco', 'number', 'min' => 0],
            [['quartos', 'vagas_garagem', 'banheiros'], 'integer', 'min' => 0],
            ['area_total', 'number', 'min' => 0],
            [['mobiliado', 'aceita_pets', 'ar_condicionado', 'area_servico', 'armario_cozinha', 'academia', 'piscina', 'playground'], 'boolean'],
            [['nome'], 'string', 'max' => 100],
            [['endereco'], 'string', 'max' => 255],
            [['imagem'], 'string', 'max' => 255], // Caminho da imagem salva
            [['imagemUpload'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024 * 2], // Máximo 2MB
        ];
    }

    public function attributeLabels()
    {
        return [
            'tipo_imovel' => 'Tipo do Imóvel',
            'preco' => 'Preço (R$)',
            'quartos' => 'Quartos',
            'vagas_garagem' => 'Vagas na Garagem',
            'banheiros' => 'Banheiros',
            'area_total' => 'Área Total (m²)',
            'mobiliado' => 'Mobiliado',
            'aceita_pets' => 'Aceita Pets',
            'ar_condicionado' => 'Ar Condicionado',
            'area_servico' => 'Área de Serviço',
            'armario_cozinha' => 'Armário na Cozinha',
            'academia' => 'Academia',
            'piscina' => 'Piscina',
            'playground' => 'Playground',
            'nome' => 'Nome do Local',
            'endereco' => 'Endereço',
            'imagem' => 'Link da Imagem',
            'imagemUpload' => 'Imagem do Imóvel',
        ];
    }

    public function uploadImagem()
    {
        if ($this->imagemUpload && $this->validate()) {
            $caminho = 'assets/img/imoveis/' . $this->imagemUpload->baseName . '.' . $this->imagemUpload->extension;
    
            if ($this->imagemUpload->saveAs($caminho)) {
                $this->imagem = $caminho;
                return true;
            }
        }
        return false;
    }

    public function saveImovel()
    {
        return $this->validate() && $this->save();
    }
}