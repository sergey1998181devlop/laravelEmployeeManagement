<?php
namespace App\Repositories;

use App\Models\EmployersPosition;
use Illuminate\Database\Eloquent\Collection;

class PanelEmployeePositionRepository extends CoreRepository{


    /**
     * Get a list of specializations to display in the drop-down list
     * @return Collection
     */
    public function getAllPositionList(){
        $columns = implode(', ', [
           'id',
           'CONCAT (id, ". ", name) AS id_name'
        ]);
        $result = EmployersPosition::selectRaw($columns)
            ->toBase()//there is no need to wrap the category block into objects - we get only data
            ->get();

        return $result;
    }

    /**
     *
     */
    public function getAllWithPaginate($perPage = false){
        $fields = ['id', 'title', 'parent_id' ];
        $result = $this
            ->startConditions()
            ->select($fields)
            ->with([
                'parentCategory:id,title'
            ])
            ->paginate($perPage);
        return $result;
    }
}
