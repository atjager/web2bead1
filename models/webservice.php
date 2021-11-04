<?php 
    //require_once('soaproot');

    class Webservice{
        public function proba() {
            return 'proba';
        }
    }

    $options = array("uri" => "http://localhost/web2bead1/models/webservice.php");
    $server = new SoapServer(null, $options);
    $server->setClass('Webservice');
    $server->handle();
    
?>