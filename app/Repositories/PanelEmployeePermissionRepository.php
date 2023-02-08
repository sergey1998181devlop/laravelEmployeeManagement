<?php
namespace App\Repositories;

use App\Models\EmployersPermission;
use App\Models\EmployersPosition;
use Illuminate\Database\Eloquent\Collection;

class PanelEmployeePermissionRepository extends CoreRepository{

    /**
     * Получить список категорий для вывода в выпадающем списке
     * @return Collection
     */
    public function getAllPermissionList(){
        $columns = implode(', ', [
           'id',
           'CONCAT (id, ". ", name) AS id_name'
        ]);
        $result = EmployersPermission::selectRaw($columns)
            ->toBase()//не нужно оборачивать в объекты блок категории  - получаем только данные
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
