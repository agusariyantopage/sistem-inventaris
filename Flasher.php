<?php

class Flasher{

    public static function setMessage($pesan, $aksi, $type)
    {

        $_SESSION['msg'] = [
            'pesan' => $pesan,
            'aksi'  => $aksi,
            'type'  => $type
        ];   
    }

    public static function Message(){
        if( isset($_SESSION['msg']) )
        {
            echo $_SESSION['msg']['type'];    
           // echo '<span class="badge badge-'. $_SESSION['msg']['type'] .'">
             //       <strong>'. $_SESSION['msg']['pesan'] .'</strong> '. $_SESSION['msg']['aksi'] .'
                    
               //   </span>';

            unset($_SESSION['msg']);
        }

    }
}