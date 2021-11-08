<?php
    function CallAPI($method, $url)
    {
        
        $curl = curl_init();
        $output = new stdClass();
        $output->results = [];
        $output->info = [];
        switch ($method)
        {
            case "GET":
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $output = curl_exec($curl);
                $output = json_decode($output); 
                curl_close($curl);
            break;

        }

        return $output;
    }
?>