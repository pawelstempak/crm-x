<?php

namespace App\Modules\Importer\Common;

use Illuminate\Http\Request;
use App\Modules\Importer\Common\Upload;

class UploadFile
{
    public function UploadNewFile(Request $request)
    {
        if($request->file('import_file'))
        {
            $file = new Upload($request->file('import_file'),'','local');
            return $file->upload();
        }
    }
}