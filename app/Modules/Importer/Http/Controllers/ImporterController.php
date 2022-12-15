<?php

namespace App\Modules\Importer\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\Importer\Models\Import;
use App\Modules\Importer\Models\ImporterLog;
use App\Modules\Importer\Common\ImporterLoadFile;
use App\Modules\Importer\Common\UploadFile;
use App\Modules\Importer\Common\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Modules\Importer\Common\CreateLog;

class ImporterController extends Controller
{
    private int $processed = 0;

    private int $created = 0;

    private $run_at;

    private int $type = 1;

    public function Start()
    {
        return view('importer.index', [
            'log_list' => ImporterLog::all()
        ]);
    }

    public function Import(Request $request)
    {
        $this->run_at = date("Y-m-d H:i:s");

        $file = new UploadFile();
        $uploaded_file_path = $file->UploadNewFile($request);

        $node = new ImporterLoadFile();
        $nodes = $node->Parsing($uploaded_file_path);
 
        foreach($nodes as $nod)
        {
            $this->processed++;
            $if_doesnt_exist = Import::where('work_order_number', $nod['ticket'])->doesntExist();
            if($if_doesnt_exist)
            {
                $model = new Import();
                $model->work_order_number = $nod['ticket'];
                $model->external_id = $nod['entityid'];
                $model->priority = $nod['urgency'];
                $model->received_date = date("Y-m-d H:i:s", strtotime($nod['rcv_date']));
                $model->category = $nod['category'];
                $model->fin_loc = $nod['store_name'];
                $model->save();

                $this->created++;

                $nodes[$this->processed]['result']='created';
            }
            else
            {
                $nodes[$this->processed]['result']='skipped';
            }
        }

        Report::createCsvFile($nodes);        

        $log = new CreateLog($this->type, $this->run_at, $this->processed, $this->created);
        $log->create();

        return redirect()->route('importer');   
    }
}
