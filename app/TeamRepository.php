<?php


namespace App;


class TeamRepository extends Repository
{
    protected $model = Team::class;

    public function getItemsByArguments(array $args, array $columns)
    {
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id', $args['id']);
            }
            if (isset($args['technician'])) {
                $query->where('technician', 'like', '%'.$args['technician'].'%');
            }
            if (isset($args['qtd_yellow_cards'])) {
                $query->where('active', $args['qtd_yellow_cards']);
            }
            if (isset($args['qtd_red_cards'])) {
                $query->where('active', $args['qtd_red_cards']);
            }
            if (isset($args['position'])) {
                $query->where('active', $args['position']);
            }
            if (isset($args['points'])) {
                $query->where('active', $args['points']);
            }
            if (isset($args['name'])) {
                $query->where('name', 'like', '%'.$args['name'].'%');
            }
            if (isset($args['initials'])) {
                $query->where('initials', 'like', '%'.$args['initials'].'%');
            }
            if (isset($args['shield_image'])) {
                $query->where('shield_image', 'like', '%'.$args['shield_image'].'%');
            }
        };

        $page = isset($args['page']) ? $args['page'] : false;
        $perPage = isset($args['perpage']) ? $args['perpage'] : $this->perPage;

        return $this->queryBuilder
            ->where($where)
            ->paginate($perPage, ['*'], 'page', $page);
    }

    /**
     * @param array $attributes
     * @return bool|\Illuminate\Database\Eloquent\Model
     * * @throws ModelNotFoundException
     */
    public function update(array $attributes)
    {
        $model = $this->queryBuilder->findOrFail($attributes['id']);
        return $model->update($attributes) ? $model : false;
    }

    /**
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes)
    {
        $model = $this->queryBuilder->create($attributes);
        return $model;
    }

    /**
     * @param int $id
     * @return bool|mixed|null
     * @throws \Exception
     */
    public function delete(int $id)
    {
        $model = $this->queryBuilder->findOrFail($id);
        return $model->delete();
    }
}