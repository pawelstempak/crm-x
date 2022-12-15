<?php

namespace App\Modules\Importer\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Importer\Common\ImporterLoadFile;

class Import extends Model
{
    protected $table = 'work_order';

    protected $primaryKey = 'work_order_id';

    public $timestamps = false;
}
