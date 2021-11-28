<?php
class devizavaltasModel {
    
    private $client;
    private $valutes;
    
    function __construct() {
        $this->client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");
        $tömb = (array)simplexml_load_string($this->client->GetCurrencies()->GetCurrenciesResult);
        $this->valutes = (array)$tömb['Currencies'][0]->Curr;
    }
    
    function valutes() {
        return $this->valutes;
    }
    
    function getData($date = null) {
        try {
            $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");
    // (array): itt egy asszociatív tömbbé konvertálja:
    
            $tömb = (array)simplexml_load_string($this->client->GetCurrentExchangeRates($date)->GetCurrentExchangeRatesResult);
            return ($tömb['Day'][0]);


        } catch (SoapFault $e) {
            var_dump($e);
        }
        return [];
    }
}