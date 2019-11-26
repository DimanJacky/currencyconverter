<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25.11.2019
 * Time: 3:19
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\CurrencyConverter;

class CurrencyController extends Controller
{
    public $curConv;
    public $enableCsrfValidation = false;

//    public function __construct()
//    {
//        $this->abc = new CurrencyConverter();
//    }

//    public function beforeAction($action)
//    {
//        if ($action->id == 'index') {
//            $this->enableCsrfValidation = false;
//        }
//        return parent::beforeAction($action);
////        echo "<pre>";
////        print_r($action);
//    }

    public function actionIndex() {
//
//
//        $this->curConv = new CurrencyConverter();
//
//        $currency["usd"] = $this->curConv->from('USD')->to('RUB')->precision(4)->toDate("01/10/2019")->convert(1);
//        $currency["eur"] = $this->curConv->from('EUR')->to('RUB')->precision(4)->convert(1);
//        $currency["aud"] = $this->curConv->from('AUD')->to('RUB')->precision(4)->convert(1);
//        $currency["gbr"] = $this->curConv->from('GBP')->to('RUB')->precision(4)->convert(1);
//        $currency["brl"] = $this->curConv->from('BRL')->to('RUB')->precision(4)->convert(1);
//        $currency["hkd"] = $this->curConv->from('HKD')->to('RUB')->precision(4)->convert(1);
//        $currency["jpy"] = $this->curConv->from('JPY')->to('RUB')->precision(4)->convert(1);

        $title = "Курсы валют";

        return $this->render('index', compact('title'));
    }

    public function actionAjax() {
        if (isset($_REQUEST["date"])) {

            $this->curConv = new CurrencyConverter();

            $currency["date"] = $_REQUEST["date"];

            $currency["usd"] = $this->curConv->from('USD')->to('RUB')->precision(4)->toDate($currency["date"])->convert(1);
            $currency["eur"] = $this->curConv->from('EUR')->to('RUB')->precision(4)->toDate($currency["date"])->convert(1);
            $currency["aud"] = $this->curConv->from('AUD')->to('RUB')->precision(4)->toDate($currency["date"])->convert(1);
            $currency["gbp"] = $this->curConv->from('GBP')->to('RUB')->precision(4)->toDate($currency["date"])->convert(1);
            $currency["brl"] = $this->curConv->from('BRL')->to('RUB')->precision(4)->toDate($currency["date"])->convert(1);
            $currency["hkd"] = $this->curConv->from('HKD')->to('RUB')->precision(4)->toDate($currency["date"])->convert(1);
            $currency["jpy"] = $this->curConv->from('JPY')->to('RUB')->precision(4)->toDate($currency["date"])->convert(1);
            return json_encode($currency);
        }



    }

    public function actionConvert() {

        $this->curConv = new CurrencyConverter();

        if (isset($_REQUEST["convert"])) {
            $from = mb_strtoupper($_REQUEST["from"]);
            $to = mb_strtoupper($_REQUEST["to"]);
            $amountfrom = $_REQUEST["amountfrom"];
            $date = $_REQUEST["date"];
            //echo "from ".$from.", to ".$to.", amountfrom ".$amountfrom.", date ".$date;

            $conv = $this->curConv->from($from)->to($to)->precision(4)->toDate($date)->convert($amountfrom);

            return json_encode($conv);
        }

        $listCurrency = $this->curConv->getListCurrency();

        $title = "Конвертация стоимости валют";

        return $this->render('convert', compact('title','listCurrency'));
    }

    public function actionCompare() {

        $this->curConv = new CurrencyConverter();
        $listCurrency = $this->curConv->getListCurrency();

        if (isset($_REQUEST["compare"])) {
            $convstr = "";
            $from = mb_strtoupper($_REQUEST["from"]);
            $to = $_REQUEST["to"];
            $date = $_REQUEST["date"];

            $html = "<table border='1' class='compare'>";

            $html .= "<tr><td colspan='2'>Курс ".$from." по отношению к мировым валютам на ".$date."</td></tr>";

            $html .= "<tr><td>Валюта</td><td>Кросс-курс</td></tr>";

            if (is_array($to)) {
                foreach ($to as &$item) {
                    $item = mb_strtoupper($item);
                    $conv = $this->curConv->from($from)->to($item)->precision(4)->toDate($date)->convert(1);

                    foreach ($listCurrency as $value) {
                        if ($value["CharCode"] == mb_strtolower($item)) {
                            //echo "<br>".$value["Name"];
                            $convstr = $value["Name"];
                        }
                    }
                    $html .= "<tr><td>".$convstr."</td><td>".$conv."</td></tr>";
                }
            } else {
                $to = mb_strtoupper($to);
                $conv = $this->curConv->from($from)->to($to)->precision(4)->toDate($date)->convert(1);
                foreach ($listCurrency as $value) {
                    if ($value["CharCode"] == mb_strtolower($to)) {
                        $convstr = $value["Name"];
                    }
                }
                $html .= "<tr><td>".$convstr."</td><td>".$conv."</td></tr>";
            }

            $html .= "</table>";

            return json_encode($html);
        }

        $listCurrency = $this->curConv->getListCurrency();

        $title = "Сравнение курса списка валют";

        return $this->render('compare', compact('title','listCurrency'));
    }

}