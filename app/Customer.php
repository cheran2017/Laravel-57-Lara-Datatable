<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * Returns the action column html for datatables.
     *
     * @param \App\User
     * @return string
     */
    public static function laratablesCustomAction($customer)
    {
        return view('datatables.action')->with('customer',$customer)->render();
    }




    /**
     * first_name column should be used for sorting when name column is selected in Datatables.
     *
     * @return string
     */
    public static function laratablesOrderName()
    {
        return 'name';
    }

    /**
     * Adds the condition for searching the name of the user in the query.
     *
     * @param \Illuminate\Database\Eloquent\Builder
     * @param string search term
     * @param \Illuminate\Database\Eloquent\Builder
     */
    public static function laratablesSearchName($query, $searchValue)
    {
        return $query->orWhere('name', 'like', '%'. $searchValue. '%')
            ->orWhere('email', 'like', '%'. $searchValue. '%')
        ;
    }



    /**
     * Returns the data attribute for row id of the user.
     *
     * @return array
     */
    public function laratablesRowData()
    {
        return [
            'id' => $this->id,
        ];
    }
}
