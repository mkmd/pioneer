<?php

    set_time_limit(999999);
    include($_SERVER["DOCUMENT_ROOT"]."/autoexec.inc.php");
  
    
    $bs = new Blobs(BLOBS_ALL);
    
    foreach($bs as $b) {
        
        out($b->id, "/assets/static/".$b->id.".0x0.".$b->type, $core->fs->FileExists("/assets/static/".$b->id.".0x0.".$b->type));
        if($core->fs->FileExists("/assets/static/".$b->id.".0x0.".$b->type) && is_null($b->data->data)) {
            //$b->data->data = $core->fs->ReadFile("/assets/static/".$b->id.".0x0.".$b->type);
            //$b->Save();
            
            $string = $core->fs->ReadFile("/assets/static/".$b->id.".0x0.".$b->type);
            $core->dbe->SetBin("sys_blobs_data", "blobs_id", $b->id, "blobs_data", $string);
            unset($string);
            //$b->data->Dispose();
        }
        else {
            out($b->id, "/assets/static/".$b->id.".0x0.".$b->type, $core->fs->FileExists("/assets/static/".$b->id.".0x0.".$b->type));
        }
        
    }
   
   
  
?>
