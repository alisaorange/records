<?php

namespace app\components;

use yii\base\Component;

class Curl extends Component {

    public function getRecords() {
        $ch = curl_init('http://test/user/read.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        $json = curl_exec($ch);
        $json_encode = json_decode($json);
        $records = $json_encode->records;
        curl_close($ch);

        return $records;
    }

    public function setRecords($data){

        $data_string = json_encode ($data, JSON_UNESCAPED_UNICODE);
        $curl = curl_init('http://test/user/create.php');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
// Принимаем в виде массива. (false - в виде объекта)
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result);

    }

    public function updateRecords($data){
        $data_string = json_encode ($data, JSON_UNESCAPED_UNICODE);
        $curl = curl_init('http://test/user/update.php');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
// Принимаем в виде массива. (false - в виде объекта)
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result);
    }

    public function findRecord($id){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://test/user/read_one.php?id='.$id);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        $result = curl_exec($curl);

        curl_close($curl);

        return json_decode($result);
    }

}