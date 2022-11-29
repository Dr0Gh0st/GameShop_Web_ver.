<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property int $produto_id
 * @property string $titulo
 * @property string $descricao
 * @property float $rating
 * @property string $data
 * @property string|null $versao
 * @property int $iva
 *
 * @property Produtos $produto
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['produto_id', 'titulo', 'descricao', 'rating', 'iva'], 'required'],
            [['produto_id', 'iva'], 'integer'],
            [['rating'], 'number'],
            [['data'], 'safe'],
            [['versao'], 'string'],
            [['titulo'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 200],
            [['produto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Produtos::class, 'targetAttribute' => ['produto_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'produto_id' => 'Produto ID',
            'titulo' => 'Titulo',
            'descricao' => 'Descricao',
            'rating' => 'Rating',
            'data' => 'Data',
            'versao' => 'Versao',
            'iva' => 'Iva',
        ];
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produtos::class, ['id' => 'produto_id']);
    }
}
