<?php

namespace App\Controllers;
use Ifsnop\Mysqldump\Mysqldump;

class BackupDb extends BaseController
{
    public function index()
    { 
        $tgl=date('Y-m-d');
        try {
            $dump = new Mysqldump('mysql:host=localhost;dbname=simkop1', 'root', '');
            $dump->start('backup/database/dump-'.$tgl.'.sql');
            echo "<script>info();</script>";
        } catch (\Exception $e) {
            echo 'mysqldump-php error: ' . $e->getMessage(); 
        } 
    } 
}



?>
<script>
    function info(){
        var yakin = alert("Backup Database Berhasil");

        if (yakin) {
            window.location = "/";
        } else {
            window.location = "/";
        }
    }
        
</script>
