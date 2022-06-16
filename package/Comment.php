<?php
    namespace task2\package;
    class Comment {
        private $url;
        public function  __construct($url = 'https://medtech2.dragoblued.site/api/v1/comments') {
            $this->$url = $url;
        }
        public function getRequest() {
            $ch = curl_init($this->$url); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $result = curl_exec($ch);
            return $result;
        }

        public function postRequest($text, $name) {
            print_r($this->$url);
            $ch = curl_init($this->$url); 
            $data = json_encode([
                'name' => $name,
                'text' => $text
            ]);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, 1); 
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $result = curl_exec($ch);
            return $result;
        }

        public function putRequest($text, $name, $id) {
            $ch = curl_init($this->$url . '/' . $id); 
            $data = json_encode([
                'name' => $name,
                'text' => $text
            ]);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $result = curl_exec($ch);
            return $result;
        }
    }
?>