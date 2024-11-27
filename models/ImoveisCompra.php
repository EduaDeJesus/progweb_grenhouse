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
    public $imagensUpload;

    public static function tableName()
    {
        return 'imoveis_compra';
    }

    public function rules()
    {
        return [
            [['tipo_imovel', 'preco', 'nome', 'endereco', 'descricao'], 'required'],
            ['imagensUpload', 'file', 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 10],
            ['tipo_imovel', 'in', 'range' => ['apartamento', 'casa', 'condominio', 'area']],
            ['preco', 'number', 'min' => 0],
            [['id','imagem','descricao'], 'safe'],
            [['quartos', 'vagas_garagem', 'banheiros'], 'integer', 'min' => 0],
            ['area_total', 'number', 'min' => 0],
            [['mobiliado', 'aceita_pets', 'ar_condicionado', 'area_servico', 'armario_cozinha', 'academia', 'piscina', 'playground'], 'boolean'],
            [['nome'], 'string', 'max' => 100],
            [['endereco'], 'string', 'max' => 255],
            [['descricao'], 'string', 'max' => 500],
            [['imagem'], 'string', 'max' => 255],
            [['imagemUpload'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024 * 2],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
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
            'descricao' => 'Descrição',
        ];
    }

    public function uploadImagem()
    {
        if ($this->imagemUpload && $this->validate()) {
            $caminho = './assets/img/imoveis/' . $this->imagemUpload->baseName . '.' . $this->imagemUpload->extension;
    
            if ($this->imagemUpload->saveAs($caminho)) {
                $this->imagem = $caminho;
                return true;
            }
        }
        return false;
    }

    public function uploadImagens($imovelId)
    {
        $paths = [];

        $uploadPath = Yii::getAlias('@webroot/assets/img/imoveis/');

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        if (is_array($this->imagensUpload)) {
            foreach ($this->imagensUpload as $file) {
                if ($file instanceof \yii\web\UploadedFile) {
                    $caminho = $uploadPath . $imovelId . '_' . uniqid() . '.' . $file->extension;

                    if ($file->saveAs($caminho)) {
                        $paths[] = '/assets/img/imoveis/' . basename($caminho);
                    }
                }
            }
        }

        return $paths; // Retorna os caminhos das imagens salvas
    }


    public function saveImovel()
    {
        return $this->validate() && $this->save();
    }

    public function getImoveisFiltrados($filtros)
    {
        $lista = [];
    
        try {
            $query = "SELECT * FROM imoveis_compra WHERE situacao IS NOT NULL "; 

            if (!empty($filtros['descricao'])) {
                $query .= " AND (descricao LIKE '%" . addslashes($filtros['descricao']) . "%' OR nome LIKE '%" . addslashes($filtros['descricao']) . "%')";            
            }
    
            if (!empty($filtros['tipo_imovel'])) {
                $query .= " AND tipo_imovel = '" . $filtros['tipo_imovel'] . "'";
            }
    
            if (!empty($filtros['preco_min']) && !empty($filtros['preco_max'])) {
                $query .= " AND preco BETWEEN " . (float)$filtros['preco_min'] . " AND " . (float)$filtros['preco_max'];
            }
    
            if (!empty($filtros['quartos'])) {
                $query .= " AND quartos >= " . (int)$filtros['quartos'];
            }
    
            if (!empty($filtros['vagas_garagem'])) {
                $query .= " AND vagas_garagem >= " . (int)$filtros['vagas_garagem'];
            }
    
            if (!empty($filtros['banheiros'])) {
                $query .= " AND banheiros >= " . (int)$filtros['banheiros'];
            }
    
            if (!empty($filtros['area_total_min']) && !empty($filtros['area_total_max'])) {
                $query .= " AND area_total BETWEEN " . (float)$filtros['area_total_min'] . " AND " . (float)$filtros['area_total_max'];
            }
    
            if (isset($filtros['mobiliado']) && $filtros['mobiliado'] !== '') {
                $query .= " AND mobiliado = " . ((bool)$filtros['mobiliado'] ? '1' : '0');
            }
            if (isset($filtros['ar_condicionado']) && $filtros['ar_condicionado'] !== '') {
                $query .= " AND ar_condicionado = " . ((bool)$filtros['ar_condicionado'] ? '1' : '0');
            }
            if (isset($filtros['area_servico']) && $filtros['area_servico'] !== '') {
                $query .= " AND area_servico = " . ((bool)$filtros['area_servico'] ? '1' : '0');
            }
            if (isset($filtros['armario_cozinha']) && $filtros['armario_cozinha'] !== '') {
                $query .= " AND armario_cozinha = " . ((bool)$filtros['armario_cozinha'] ? '1' : '0');
            }
            if (isset($filtros['aceita_pets']) && $filtros['aceita_pets'] !== '') {
                $query .= " AND aceita_pets = " . ((bool)$filtros['aceita_pets'] ? '1' : '0');
            }
            if (isset($filtros['academia']) && $filtros['academia'] !== '') {
                $query .= " AND academia = " . ((bool)$filtros['academia'] ? '1' : '0');
            }
            if (isset($filtros['piscina']) && $filtros['piscina'] !== '') {
                $query .= " AND piscina = " . ((bool)$filtros['piscina'] ? '1' : '0');
            }
            if (isset($filtros['playground']) && $filtros['playground'] !== '') {
                $query .= " AND playground = " . ((bool)$filtros['playground'] ? '1' : '0');
            }
    
            if (!empty($filtros['nome'])) {
                $query .= " AND nome LIKE '%" . addslashes($filtros['nome']) . "%'";
            }
    
            $query .= " ORDER BY nome";
    
            $imoveis = Yii::$app->db->createCommand($query)->queryAll();

            foreach ($imoveis as $imovel) {

                $imovelFormatado = new ImoveisCompra(); 
                $imovelFormatado->id = $imovel['id'];
                $imovelFormatado->tipo_imovel = $imovel['tipo_imovel'];
                $imovelFormatado->preco = $imovel['preco'];
                $imovelFormatado->quartos = $imovel['quartos'];
                $imovelFormatado->vagas_garagem = $imovel['vagas_garagem'];
                $imovelFormatado->banheiros = $imovel['banheiros'];
                $imovelFormatado->area_total = $imovel['area_total'];
                $imovelFormatado->mobiliado = (bool)$imovel['mobiliado'];
                $imovelFormatado->ar_condicionado = (bool)$imovel['ar_condicionado'];
                $imovelFormatado->armario_cozinha = (bool)$imovel['armario_cozinha'];
                $imovelFormatado->area_servico = (bool)$imovel['area_servico'];
                $imovelFormatado->aceita_pets = (bool)$imovel['aceita_pets'];
                $imovelFormatado->academia = (bool)$imovel['academia'];
                $imovelFormatado->piscina = (bool)$imovel['piscina'];
                $imovelFormatado->playground = (bool)$imovel['playground'];
                $imovelFormatado->nome = $imovel['nome'];
                $imovelFormatado->endereco = $imovel['endereco'];
                $imovelFormatado->descricao = $imovel['descricao'];
                $imovelFormatado->imagem = $imovel['imagem'];

    
                $lista[] = $imovelFormatado;
            }
        } catch (\Exception $ex) {
        }

        return $lista;
    }
}