<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class MCustomer extends Model
{
    use SoftDeletes;
    use Sortable;

    protected $fillable = [
        "code", // VARCHAR(10) NOT NULL,
        "name", // VARCHAR(50) NOT NULL,
        "name_kana", // VARCHAR(50) NULL DEFAULT NULL,
        "zip_code", // VARCHAR(7) NULL DEFAULT NULL,
        "address", // VARCHAR(50) NULL DEFAULT NULL,
        "building_name", // VARCHAR(50) NULL DEFAULT NULL,
        "tel", // VARCHAR(15) NULL DEFAULT NULL,
        "fax", // VARCHAR(15) NULL DEFAULT NULL
    ];

    public $sortable = ['id','code','name,','name_kana','zip_code','address','building_name','tel','fax'];
}
