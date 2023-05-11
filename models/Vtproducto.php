<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vtproducto".
 *
 * @property int $prindice
 * @property string $prcodigo
 * @property string $prnombre
 * @property string $prfeccrea
 * @property string $prgrupo
 * @property string $prsubgrupo
 * @property string $prunimed
 * @property string $prmarca
 * @property string $prcosto
 * @property string $prstkrepo
 * @property string $prstkmaximo
 * @property int|null $prdescontinuar
 * @property int|null $prenoferta
 * @property int|null $prnumeroserie
 * @property string $pruser
 * @property string $prfecha
 * @property string $prhora
 * @property int $prsinstock
 * @property string $prcostoreal
 * @property string|null $prUnixEmb
 * @property string|null $prcambiaingreso
 * @property string|null $prMargenBase
 * @property string|null $prdeparta
 * @property string|null $prpik
 * @property string|null $prextincion
 */
class Vtproducto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vtproducto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prcodigo', 'prnombre', 'prfeccrea', 'prgrupo', 'prsubgrupo', 'prunimed', 'prmarca', 'prcosto', 'prstkrepo', 'prstkmaximo', 'pruser', 'prfecha', 'prhora', 'prsinstock', 'prcostoreal'], 'required'],
            [['prdescontinuar', 'prenoferta', 'prnumeroserie', 'prsinstock'], 'integer'],
            [['prcomentario'], 'string'],
            [['prcodigo'], 'string', 'max' => 12],
            [['prnombre'], 'string', 'max' => 100],
            [['prfeccrea', 'prunimed', 'prcosto', 'prstkrepo', 'prstkmaximo', 'pruser', 'prfecha', 'prhora', 'prcostoreal'], 'string', 'max' => 10],
            [['prgrupo', 'prsubgrupo', 'prmarca', 'prUnixEmb'], 'string', 'max' => 5],
            [['prcambiaingreso', 'prpik', 'prextincion'], 'string', 'max' => 1],
            [['prMargenBase'], 'string', 'max' => 6],
            [['prdeparta'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prindice' => 'Prindice',
            'prcodigo' => 'Codigo ',
            'prnombre' => 'Nombre',
            'prfeccrea' => 'Prfeccrea',
            'prgrupo' => 'Grupo',
            'prsubgrupo' => 'Sub Grupo',
            'prunimed' => 'Unidad métrica',
            'prmarca' => 'Prmarca',
            'prcosto' => 'Prcosto',
            'prstkrepo' => 'Prstkrepo',
            'prstkmaximo' => 'Prstkmaximo',
            'prdescontinuar' => 'Prdescontinuar',
            'prenoferta' => 'Prenoferta',
            'prnumeroserie' => 'Prnumeroserie',
            'pruser' => 'Pruser',
            'prfecha' => 'Prfecha',
            'prhora' => 'Prhora',
            'prsinstock' => 'Prsinstock',
            'prcostoreal' => 'Prcostoreal',
            'prUnixEmb' => 'Pr Unix Emb',
            'prcambiaingreso' => 'Prcambiaingreso',
            'prMargenBase' => 'Pr Margen Base',
            'prdeparta' => 'Prdeparta',
            'prpik' => 'Prpik',
            'prextincion' => 'Prextincion',
            'prcomentario' => 'Características',
        ];
    }
}
