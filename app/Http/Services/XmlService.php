<?php


namespace App\Http\Services;


use Carbon\Carbon;
use Spatie\ArrayToXml\ArrayToXml;

class XmlService
{
    private $mojeFirma;
    private $odberatel;
    private $konecPrij;
    private $info;
    private $valuty;
    private $uhrady;

    /** Navolení odberatele, dalsiho infa.
     * @param array $odberatel
     * @param array $info
     */
    public function __construct($odberatel, $info, $valuty = null, $uhrady = null)
    {
        $adresy = ["ObchAdresa" => "ObchNazev", "FaktAdresa" => "FaktNazev", "Adresa" => "Nazev"];


        foreach ($adresy as $a => $n) {
            $odberatel["$n"] = $odberatel["Nazev"];
            $odberatel["$a"] = $odberatel["Adresa"];

        }
        $this->mojeFirma = config("invoices");
        $this->odberatel = [
            "DodOdb" => $odberatel];
        $this->konecPrij = [
            "KonecPrij" => [
                "Nazev" => $this->odberatel["DodOdb"]["Nazev"],
                "Adresa" => $this->odberatel["DodOdb"]["Adresa"],
                "GUID" => $this->odberatel["DodOdb"]["GUID"],
                "PlatceDPH" => $this->odberatel["DodOdb"]["PlatceDPH"],
                "FyzOsoba" => $this->odberatel["DodOdb"]["FyzOsoba"],
            ],
        ];
        $this->info = $info;
        if ($valuty != null) {
            $this->valuty = $valuty;
        }
        if($uhrady != null){
            $this->uhrady = $uhrady;
        }


    }

    public function generateXML($params)
    {
        $result = ArrayToXml::convert($params, "MoneyData", false, "UTF-8", "1.0");
        $f = fopen("Faktura " . Carbon::now()->isoFormat('LL') . ".xml", "w");
        fwrite($f, $result);
        fclose($f);
        //return $result;


    }

    public function generateInvoiceCZ()
    {


        $params = [
            "SeznamFaktVyd" => [
                "FaktVyd" => [
                    array_merge(
                        $this->info,

                        $this->odberatel,
                        $this->konecPrij,
                        $this->mojeFirma),

                ],
            ],
            "SeznamFaktVyd_DPP" => "",
        ];


        $this->generateXML($params);


    }

    public function generateInvoiceEU()
    {
        $params = [
            "SeznamFaktVyd" => [
                "FaktVyd" => [
                    array_merge(
                        $this->info,
                        $this->valuty,
                        $this->odberatel,
                        $this->konecPrij,
                        $this->mojeFirma),

                ],
            ],
            "SeznamFaktVyd_DPP" => "",
        ];
        $this->generateXML($params);
    }

    public function generateInvoiceWO()
    {
        $params = [
            "SeznamFaktVyd" => [
                "FaktVyd" => [
                    array_merge(
                        $this->info,
                        $this->valuty,
                        $this->odberatel,
                        $this->konecPrij,
                        $this->uhrady,
                        $this->mojeFirma),

                ],
            ],
            "SeznamFaktVyd_DPP" => "",
        ];
        $this->generateXML($params);
    }
}
