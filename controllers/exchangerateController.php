<?php
    class ExchangerateController{
            public function show(){
                
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

            public function exchange($firstCurrency, $secondCurrency, $date){
                $this->date = $date;
                $firstExchange = [
                    'startDate' => $date,
                    'endDate' => $date,
                   'currencyNames' => $firstCurrency
                ];

                $secondExchange = [
                    'startDate' => $date,
                    'endDate' => $date,
                  'currencyNames' => $secondCurrency
                ];
                
                $checkfirstUnit = [
                    'currencyNames' => $firstCurrency
                ];

                $checksecondUnit = [
                    'currencyNames' => $secondCurrency
                ];

                try {
                    $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");

                    $firstExchangeResult = (array)simplexml_load_string($client->GetExchangeRates($firstExchange)->GetExchangeRatesResult);
                    
                } catch (SoapFault $e) {
                    $firstExchangeResult = $e;
                }

                try {

                    $secondExchangeResult = (array)simplexml_load_string($client->GetExchangeRates($secondExchange)->GetExchangeRatesResult);
                    
                } catch (SoapFault $e) {
                    $secondExchangeResult = $e;
                }

                try {

                    $checkfirstUnitResult = (array)simplexml_load_string($client->GetCurrencyUnits($checkfirstUnit)->GetCurrencyUnitsResult);
                    
                } catch (SoapFault $e) {
                    $checkfirstUnitResult  = $e;
                }

                try {

                    $checksecondUnitResult = (array)simplexml_load_string($client->GetCurrencyUnits($checksecondUnit)->GetCurrencyUnitsResult);
                    
                } catch (SoapFault $e) {
                    $checksecondUnitResult  = $e;
                }

                // end($firstExchangeResult['Day']) NEED THE END() TO CUT THE ACTUAL VALUE(STRING)

                
//-> null days     
                $firstrate=(float)end($firstExchangeResult['Day'])/(float)end($checkfirstUnitResult['Units']);
                $secondtrate=(float)end($secondExchangeResult['Day'])/(float)end($checksecondUnitResult['Units']);

                $exchangeRate = $firstrate/$secondtrate;
                
                
                return $exchangeRate;
            }

            public function exchangeMonth($firstCurrency, $secondCurrency, $date){
                $this->date = $date;

                $dateSplitter = explode("-", $date);
                $monthDayCal = cal_days_in_month(CAL_GREGORIAN, $dateSplitter['1'], $dateSplitter['0']);

                $startDate = $dateSplitter['0']."-".$dateSplitter['1']."-01";
                $endDate = $dateSplitter['0']."-".$dateSplitter['1']."-".$monthDayCal;

                $firstExchange = [
                    'startDate' => $startDate,
                    'endDate' => $endDate,
                   'currencyNames' => $firstCurrency
                ];

                $secondExchange = [
                    'startDate' => $startDate,
                    'endDate' => $endDate,
                  'currencyNames' => $secondCurrency
                ];
                
                $checkfirstUnit = [
                    'currencyNames' => $firstCurrency
                ];

                $checksecondUnit = [
                    'currencyNames' => $secondCurrency
                ];

                try {
                    $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");

                    $firstExchangeResult = (array)simplexml_load_string($client->GetExchangeRates($firstExchange)->GetExchangeRatesResult);
                    
                } catch (SoapFault $e) {
                    $firstExchangeResult = $e;
                }

                try {

                    $secondExchangeResult = (array)simplexml_load_string($client->GetExchangeRates($secondExchange)->GetExchangeRatesResult);
                    
                } catch (SoapFault $e) {
                    $secondExchangeResult = $e;
                }

                try {

                    $checkfirstUnitResult = (array)simplexml_load_string($client->GetCurrencyUnits($checkfirstUnit)->GetCurrencyUnitsResult);
                    
                } catch (SoapFault $e) {
                    $checkfirstUnitResult  = $e;
                }

                try {

                    $checksecondUnitResult = (array)simplexml_load_string($client->GetCurrencyUnits($checksecondUnit)->GetCurrencyUnitsResult);
                    
                } catch (SoapFault $e) {
                    $checksecondUnitResult  = $e;
                }

                // end($firstExchangeResult['Day']) NEED THE END() TO CUT THE ACTUAL VALUE(STRING)

                //$firstrate=(float)end($firstExchangeResult['Day'])/(float)end($checkfirstUnitResult['Units']);
                //$secondtrate=(float)end($secondExchangeResult['Day'])/(float)end($checksecondUnitResult['Units']);

                //$exchangeRate = $firstrate/$secondtrate;
                
                $dates=[$startDate, $endDate];
                return $firstExchangeResult;
            }

        
    }
?>