<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vtproducto;

/**
 * VtproductoSearch represents the model behind the search form of `app\models\Vtproducto`.
 */
class VtproductoSearch extends Vtproducto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prindice', 'prdescontinuar', 'prenoferta', 'prnumeroserie', 'prsinstock'], 'integer'],
            [['prcodigo', 'prnombre', 'prfeccrea', 'prgrupo', 'prsubgrupo', 'prmarca', 'prcosto', 'prstkrepo', 'prstkmaximo', 'pruser', 'prfecha', 'prhora', 'prcostoreal', 'prUnixEmb', 'prcambiaingreso', 'prMargenBase', 'prdeparta', 'prpik', 'prextincion'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Vtproducto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'prindice' => $this->prindice,
            'prdescontinuar' => $this->prdescontinuar,
            'prenoferta' => $this->prenoferta,
            'prnumeroserie' => $this->prnumeroserie,
            'prsinstock' => $this->prsinstock,
            'prgrupo' => $this->prgrupo,
            'prsubgrupo' => $this->prsubgrupo,
        ]);

        $query->andFilterWhere(['like', 'prcodigo', $this->prcodigo])
            ->andFilterWhere(['like', 'prnombre', $this->prnombre])
            ->andFilterWhere(['like', 'prfeccrea', $this->prfeccrea])
           /*  ->andFilterWhere(['like', 'prgrupo', $this->prgrupo])
            ->andFilterWhere(['like', 'prsubgrupo', $this->prsubgrupo]) */
            ->andFilterWhere(['like', 'prunimed', $this->prunimed])
            ->andFilterWhere(['like', 'prmarca', $this->prmarca])
            ->andFilterWhere(['like', 'prcosto', $this->prcosto])
            ->andFilterWhere(['like', 'prstkrepo', $this->prstkrepo])
            ->andFilterWhere(['like', 'prstkmaximo', $this->prstkmaximo])
            ->andFilterWhere(['like', 'pruser', $this->pruser])
            ->andFilterWhere(['like', 'prfecha', $this->prfecha])
            ->andFilterWhere(['like', 'prhora', $this->prhora])
            ->andFilterWhere(['like', 'prcostoreal', $this->prcostoreal])
            ->andFilterWhere(['like', 'prUnixEmb', $this->prUnixEmb])
            ->andFilterWhere(['like', 'prcambiaingreso', $this->prcambiaingreso])
            ->andFilterWhere(['like', 'prMargenBase', $this->prMargenBase])
            ->andFilterWhere(['like', 'prdeparta', $this->prdeparta])
            ->andFilterWhere(['like', 'prpik', $this->prpik])
            ->andFilterWhere(['like', 'prextincion', $this->prextincion]);

        return $dataProvider;
    }
}
