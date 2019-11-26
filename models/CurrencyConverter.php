<?php

namespace app\models;

use yii\base\Model;

class CurrencyConverter extends Model
{

    protected $fromCurrencyAmount;
    protected $fromCurrencyName = 'RUB';
    protected $fromCurrencyRate;
    protected $toCurrencyAmount;
    protected $toCurrencyName = 'RUB';
    protected $toCurrencyRate;
    protected $precision = 1;
    protected $date;

    public function __construct() {
        $this->date = $this->today();
    }

    public function from($currencyName) {
        $this->fromCurrencyName = $currencyName;
        return $this;
    }

    public function to($currencyName) {
        $this->toCurrencyName = $currencyName;
        return $this;
    }

    public function precision($precision) {
        $this->precision = $precision;
        return $this;
    }

    public function toDate($date) {
        $this->date = $date;
        return $this;
    }

    public function convert($fromCurrencyAmount) {
        if ($this->fromCurrencyName != 'RUB') {
            $this->fromCurrencyRate = $this->GetRateFromXML($this->fromCurrencyName);
        } else {
            $this->fromCurrencyRate = 1;
        }

        if ($this->toCurrencyName != 'RUB') {
            $this->toCurrencyRate = $this->GetRateFromXML($this->toCurrencyName);
        } else {
            $this->toCurrencyRate = 1;
        }
        if ($this->fromCurrencyRate != 0) {
            $result = $fromCurrencyAmount / $this->fromCurrencyRate * $this->toCurrencyRate;
        }

        $this->toCurrencyAmount = round($result, $this->precision);
        return $this->toCurrencyAmount;
    }

    private function today() {
        return date('d/m/Y');
    }

    private function GetXML() {
        //echo "<br>333 ".$this->date." 333<br>";
        $r = file_get_contents('http://www.cbr.ru/scripts/XML_daily.asp?date_req='.$this->date);
        $xml = simplexml_load_string($r);
        return $xml;
    }

    private function GetRateFromXML($currency) {
        $xml = $this->GetXML();
        foreach ($xml->Valute as $valute) {
            if ($valute->CharCode == $currency) {
                $value = str_replace(',', '.', $valute->Value);
                $rate = $valute->Nominal / $value;
            }
        }
        if (isset($rate)) {
            $r = $rate;
        } else {
            $r = false;
        }
        return $r;
    }

    public function getListCurrency() {
        $list = [
            ["CharCode" => "usd", "Name" => "Доллар США"],
            ["CharCode" => "eur", "Name" => "Евро"],
            ["CharCode" => "aud", "Name" => "Австралийский доллар"],
            ["CharCode" => "gbp", "Name" => "Фунт стерлингов Соединенного королевства"],
            ["CharCode" => "brl", "Name" => "Бразильский реал"],
            ["CharCode" => "hkd", "Name" => "Гонконгских долларов"],
            ["CharCode" => "jpy", "Name" => "Японских иен"],
        ];

        return $list;
    }

}