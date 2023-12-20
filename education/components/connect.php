<?php 
    $db_name = 'mysql:host=localhost;dbname=bireysel_antrenor';
    $db_user_name = 'root';
    $db_user_pass = '';

    $conn = new PDO($db_name, $db_user_name, $db_user_pass);

    function create_unique_id(){
        $str = 'abcçdefgğhıijklmnoöprsştuüvyzABCÇDEFGĞHIİJKLMNOÖPRSŞTUÜVYZ1234567890';
        $rand = array();
        $lenght = strlen($str) - 1;


        for($i = 0; $i <20; $i++){
            $n = mt_rand(0, $lenght);
            $rand[] = $str[$n];
        }
        return implode($rand);
    }



?>