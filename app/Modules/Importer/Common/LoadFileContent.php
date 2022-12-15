<?php

namespace App\Modules\Importer\Common;

class LoadFileContent
{
    private $filepath;

    private array $nodes;

    private $parent_tag_name = 'tr';

    private $child_tag_name = 'td';

    private $className = 'rgRow';
    
    private $className1 = 'rgAltRow';

    public function __construct($filepath)
    {
        $this->filepath = $filepath;
    }

    public function loadContent()
    {
        $html = file_get_contents($this->filepath, FILE_USE_INCLUDE_PATH);
        $dom = new \DOMDocument();
        $dom->preserveWhiteSpace = false;
        $errors = libxml_use_internal_errors(true);
        $dom->loadHTML($html);       
        $loop = 0;
        $tr_tag = $dom->getElementsByTagName($this->parent_tag_name);
        for ($i = 0; $i < $tr_tag->length; $i++) {
            if (stripos($tr_tag->item($i)->getAttribute('class'), $this->className) !== false or stripos($tr_tag->item($i)->getAttribute('class'), $this->className1) !== false) {
                $loop++;
                $td_tag = $tr_tag->item($i)->getElementsByTagName($this->child_tag_name);
                for ($j = 0; $j < $td_tag->length; $j++) {
                    $a_tag = $td_tag->item($j)->getElementsByTagName('a');
                    if($a_tag->length>0)
                    {
                        if(stripos($a_tag->item($j)->getAttribute('href'), 'entityid') !== false)
                        {
                            $entityid = substr($a_tag->item($j)->getAttribute('href'), 21);
                        }
                    }
                    if($loop < 51)
                    {
                        $this->nodes[$loop]=[
                            'ticket' => $td_tag->item(0)->nodeValue,
                            'entityid' => $entityid,
                            'urgency' => $td_tag->item(3)->nodeValue,
                            'rcv_date' => trim($td_tag->item(4)->nodeValue),
                            'category' => $td_tag->item(8)->nodeValue,
                            'store_name' => $td_tag->item(10)->nodeValue,
                        ];
                    }
                    else
                    {
                        $this->nodes[$loop]=[
                            'ticket' => $td_tag->item(0)->nodeValue,
                            'entityid' => $entityid,
                            'urgency' => "",
                            'rcv_date' => trim($td_tag->item(1)->nodeValue),
                            'category' => $td_tag->item(5)->nodeValue,
                            'store_name' => $td_tag->item(7)->nodeValue,
                        ];
                    }
                }                        
            }     
        }       
        return $this->nodes;
    }  
}