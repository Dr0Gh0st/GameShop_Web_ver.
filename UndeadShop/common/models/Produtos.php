<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "produtos".
 *
 * @property int $id
 * @property int $referencia
 * @property string $descricao
 * @property int $preco
 * @property int $stock
 * @property string|null $versao
 * @property int $iva
 *
 * @property LinhaCarts[] $linhaCarts
 * @property LinhaEncomendas[] $linhaEncomendas
 * @property LinhaFaturas[] $linhaFaturas
 * @property LinhaWhislist[] $linhaWhislists
 * @property Reviews[] $reviews
 */
class Produtos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produtos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['referencia', 'descricao', 'preco', 'stock', 'iva'], 'required'],
            [['referencia', 'preco', 'stock', 'iva'], 'integer'],
            [['versao'], 'string'],
            [['descricao'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'referencia' => 'Referencia',
            'descricao' => 'Descricao',
            'preco' => 'Preco',
            'stock' => 'Stock',
            'versao' => 'Versao',
            'iva' => 'Iva',
        ];
    }

    /**
     * Gets query for [[LinhaCarts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaCarts()
    {
        return $this->hasMany(LinhaCarts::class, ['produto_id' => 'id']);
    }

    /**
     * Gets query for [[LinhaEncomendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaEncomendas()
    {
        return $this->hasMany(LinhaEncomendas::class, ['produto_id' => 'id']);
    }

    /**
     * Gets query for [[LinhaFaturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaFaturas()
    {
        return $this->hasMany(LinhaFaturas::class, ['produto_id' => 'id']);
    }

    /**
     * Gets query for [[LinhaWhislists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaWhislists()
    {
        return $this->hasMany(LinhaWhislist::class, ['produto_id' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Reviews::class, ['produto_id' => 'id']);
    }
}
