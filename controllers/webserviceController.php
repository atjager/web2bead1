<?php 
    class WebserviceController{

        public function show(){

            try{
            //require_once('soaproot.php');

            ini_set("default_socket_timeout",5000);

            $options = array(
            "location" => "http://localhost/web2bead1/models/webservice.php",
            "uri" =>"http://localhost/web2bead1/models/webservice.php",
            'keep_alive' => false,
            'trace' =>true,
            'connection_timeout' => 5000,
            'cache_wsdl' => WSDL_CACHE_NONE,
            );

            $kliens = new SoapClient(null, $options);
            $vege = $kliens->proba();     
        
            require_once('views/webservice/show.php');
            }
            catch(SoapFault $e){
                print ($kliens->__getLastResponse());
            }
        }

       /*  public function show(){
            //$this->connect();
            require_once('views/webservice/show.php');
        } */
     }


    

?>