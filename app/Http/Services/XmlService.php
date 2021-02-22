<?php


namespace App\Http\Services;


use Spatie\ArrayToXml\ArrayToXml;

class XmlService
{
    private $mojeFirma;
    private $odberatel;
    private $konecPrij;
    private $info;

    /** Navolení odberatele, dalsiho infa.
     * @param array $odberatel
     * @param array $info
     */
    public function __construct($odberatel, $info)
    {
        $adresy = ["ObchAdresa" => "ObchNazev", "FaktAdresa" => "FaktNazev", "Adresa" => "Nazev"];


        foreach ($adresy as $a => $n) {
            $odberatel["$n"] = $odberatel["Nazev"];
            $odberatel["$a"] = $odberatel["Adresa"];

        }
        dd($odberatel);
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


    }

    public function generateXML($params)
    {
        $result = ArrayToXml::convert($params, "MoneyData", false, "UTF-8", "1.0");
        $f = fopen("inv.xml", "w");
        fwrite($f, $result);
        fclose($f);
        return $result;
//        $xml = new DOMDocument("1.0", "UTF-8");
//        $xml->formatOutput = true;
//
//        //HEADER
//        $header = $xml->createElement("MoneyData");
//        $xml->appendChild($header);
//        //SEZNAM
//        $seznam = $xml->createElement("SeznamFaktVyd");
//        $header->appendChild($seznam);
//        //Vydaná faktura
//        $faktura = $xml->createElement("FaktVyd", config("invoices.MojeFirma.EMail"));
//        $seznam->appendChild($faktura);
//
//        foreach ($params as $key => $param) {
//            if (is_countable($param) && count($param) < 2) {
//                $polozka = $xml->createElement($key, $param);
//                $faktura->appendChild($polozka);
//            } else {
//                foreach ($param as $key => $par) {
//
//                }
//            }
//        }
//
//        //MOJEFIRMA
//        $mojefirma = $xml->createElement("MojeFirma");
//        $faktura->appendChild($mojefirma);
//        foreach (config("invoices.MojeFirma") as $key => $firma) {
//            if (!is_countable($firma)) {
//                $polozka = $xml->createElement($key, $firma);
//                $mojefirma->appendChild($polozka);
//            } else {
//
//                $title = $xml->createElement("title");
//                $mojefirma->appendChild($title);
//                foreach ($firma as $klic => $fio) {
//                    $polozka = $xml->createElement($klic, $fio);
//                    $title->appendChild($polozka);
//                }
//            }
//        }
//        $xml->save("Invoice.xml");
//        return "" . $xml->saveXML() . "";


    }

    public function generateInvoiceCZ()
    {
//        $odberatelstvi = [
//            "ObchNazev",
//            "ObchAdresa",
//            "FaktNazev",
//            "FaktAdresa"
//
//        ];
//        foreach ($odberatelstvi as $o){
//            $o = [
//
//            ];
//        }


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


        return $this->generateXML($params);


    }

    public function generateInvoiceEU()
    {
        //
    }

    public function generateInvoiceWO()
    {
        //
    }
}
