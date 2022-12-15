<?php
namespace App\Modules\Importer\Common;

use Illuminate\Support\Facades\Storage;

class Upload
{
    private string $name;
    private $envelope;

    public $path;
    public $disk;

    public function __construct($envelope, $path, $disk)
    {   
        $this->envelope = $envelope;
        $this->path = $path;
        $this->disk = $disk;
    }

    public function upload()
    {
        $this->name = $this->envelope->getClientOriginalName();
        $this->envelope->storeAs(
                    $this->path, $this->name, $this->disk
                );
                $uploaded_file = Storage::path($this->name);
                return $uploaded_file;
    }

    public function getExtension()
    {
        return $this->envelope->getClientOriginalExtension();
    }

    public function getName()
    {
        return $this->name;
    }
}