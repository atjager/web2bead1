<?php
    class ExchangerateController{
            public function show(){
                $result = array();
                $currencies = array();


                try {
                    $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");

                    $result = (array)simplexml_load_string($client->GetInfo()->GetInfoResult);
                    

                } catch (SoapFault $e) {
                    $result = $e;
                }

                $firstDate = $result['FirstDate'];
                $lastDate = $result['LastDate'];
                $currencies = $result['Currencies'];
                
                require_once('views/exchangerate/show.php');

            }
    }
?>