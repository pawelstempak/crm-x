<?php

namespace App\Modules\Importer\Common;

use App\Modules\Importer\Common\LoadFileConent;

class ImporterLoadFile
{
    public function Parsing($filepath) {

        $node = new LoadFileContent($filepath);
        $nodes = $node->loadContent();
        
        return $nodes;
    }
}
