<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Locations;

/**
 * LocationsSearch represents the model behind the search form about `common\models\Locations`.
 */
class LocationsSearch extends Locations
{
    public $global;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['zip_code','global', 'city', 'province'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Locations::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orFilterWhere([
            'id' => $this->global,
        ]);

        $query->orFilterWhere(['like', 'zip_code', $this->global])
            ->orFilterWhere(['like', 'city', $this->global])
            ->orFilterWhere(['like', 'province', $this->global]);

        return $dataProvider;
    }
}
