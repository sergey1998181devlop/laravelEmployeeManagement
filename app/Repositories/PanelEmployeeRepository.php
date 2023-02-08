<?php
namespace App\Repositories;
use App\Models\Employer;
use Illuminate\Database\Eloquent\Collection;

class PanelEmployeeRepository extends CoreRepository{


    public function getAllWithPaginate(){
        $columns = [
            'id',
            'name',
            'surname',
            'permission_id',
            'position_id',
            'email_verified_at',
            'created_at',
        ];
        $result = Employer::select($columns)
                    ->orderBy('id' , 'DESC')
                    ->with([
                        'position:id,name',
                        'permission:id,name'
                    ])
                    ->paginate(10);
        return $result;
    }

    /**
     * Get the employee model for editing in the admin panel
     * @param $id
     * @return \App\Models\Employer
     */
    public function getEmploerEdit($id): Employer
    {
        return Employer::find($id);
    }

    /**
     * Delete employer
     * @param $id
     * @return int
     */
    public function destroy($id): int
    {
        return Employer::destroy($id);
    }
}
