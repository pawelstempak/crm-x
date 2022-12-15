<?php
namespace App\Modules\Importer\Common;

class Report
{
    public function CreateCsvFile($nodes): void
    {
        $date_report = date("Ymd-His");

        $file_handle = fopen('reports/report_'.$date_report.'.csv', 'w');
        //fputcsv($file_handle, $this->heads);    
        foreach($nodes as $node)
        {
            fputcsv($file_handle, $node);
        }
        fclose($file_handle);
    }
}