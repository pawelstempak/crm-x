<?php

namespace App\Modules\Importer\Common;

use App\Modules\Importer\Models\ImporterLog;

class CreateLog
{
    private $type;

    private $run_at;
    
    private $processed;
    
    private $created;

    public function __construct($type, $run_at, $processed, $created)
    {
        $this->type = $type;
        $this->run_at = $run_at;
        $this->processed = $processed;
        $this->created = $created;
    }

    public function create(): void
    {
        $m = new ImporterLog();
        $m->type = $this->type;
        $m->run_at = date("Y-m-d H:i:s");
        $m->entries_processed = $this->processed;
        $m->entries_created = $this->created;
        $m->save();
    }
}