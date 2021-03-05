<?php
    $x = new \App\Http\Services\XmlService([
        "Nazev" => "Tomáš David",
        "Adresa" => [
            "Ulice" => "dolní",
            "Misto" => "Štěpánov",
            "PSC" => "78313",
            "Stat" => "Czechia",
        ],
        "GUID" => "{47F85F7D-D500-4FB2-847B-B5874C8D08ED}",
        "PlatceDPH" => "0",
        "FyzOsoba" => "0",

    ],[
        'Doklad' => '1210047',
        'GUID' => '{EB936E55-D0E9-4F85-ABFC-E7D30E63F1FB}',
        'Rada' => '1rr',
        'CisRada' => '47',
        'Popis' => 'Tržby z prodeje služeb - mini-DPH',
        'Vystaveno' => '2021-02-10',
        'DatUcPr' => '2021-02-10',
        'PlnenoDPH' => '2021-02-10',
        'Splatno' => '2021-02-10',
        'DatSkPoh' => '2021-02-10',
        'KodDPH' => '19Ř01,02',
        'ZjednD' => '0',
        'VarSymbol' => '1210066',
        'Ucet' => 'BAN',
        'Druh' => 'N',
        'Dobropis' => '0',
        'Uhrada' => 'převodem',
        'PredKontac' => 'FV010',
        'ZpVypDPH' => '1',
        'SazbaDPH1' => '15',
        'SazbaDPH2' => '21',
        'Proplatit' => '822.8',
        'Vyuctovano' => '0',
        'SouhrnDPH' =>
            [
                'Zaklad0' => '0',
                'Zaklad5' => '0',
                'Zaklad22' => '680',
                'DPH5' => '0',
                'DPH22' => '142.8',
                'SeznamDalsiSazby' =>
                    [
                        'DalsiSazba' =>
                            [
                                'Popis' => 'druhá snížená',
                                'HladinaDPH' => '1',
                                'Sazba' => '10',
                                'Zaklad' => '0',
                                'DPH' => '0',
                            ],
                    ],
            ],
        'Celkem' => '822.8',
        'Typ' => 'SL.MINI',
        'Vystavil' => 'Luboš Chlanda',
        'PriUhrZbyv' => '0',
        'ValutyProp' => '0',
        'SumZaloha' => '0',
        'SumZalohaC' => '0',
        'DopravTuz' => '0',
        'DopravZahr' => '0',
        'Sleva' => '0',
        'SeznamPolozek' => '',

    ], [
        'Valuty' => [
            'Mena' => [
                'Kod' => 'EUR',
                'Mnozstvi' => '1',
                'Kurs' => '25.805',
            ],
            'SouhrnDPH' => [
                'Zaklad0' => '0',
                'Zaklad5' => '0',
                'Zaklad22' => '5.75',
                'DPH5' => '0',
                'DPH22' => '1.21',
                'SeznamDalsiSazby' => [
                    'DalsiSazba' => [
                        'Popis' => 'druhá snížená',
                        'HladinaDPH' => '1',
                        'Sazba' => '10',
                        'Zaklad' => '0',
                        'DPH' => '0',
                    ],
                ],
            ],
            'Celkem' => '6.96',
        ],
    ], [
        'SeznamUhrad' => [
            'Uhrada' => [
                'DokladUhr' => [
                    'IDDokladu' => '118',
                    'CisloDokladu' => '3PB210063',
                    'DruhDokladu' => 'B',
                    'Rok' => '2021',
                ],
                'Prijem' => '1',
                'Datum' => '2021-01-30',
                'DatUplDPH' => '2021-01-30',
                'Castka' => '5450.98',
                'ValutyHraz' => [
                    'Mena' => [
                        'Kod' => 'EUR',
                        'Mnozstvi' => '1',
                        'Kurs' => '26.115',
                    ],
                    'Castka' => '208.73',
                ],
                'ValutyUhr' => [
                    'Mena' => [
                        'Kod' => 'EUR',
                        'Mnozstvi' => '1',
                        'Kurs' => '26.115',
                    ],
                    'Castka' => '208.73',
                ],
                'KurzRozd' => [
                    'Preceneni' => '0',
                ],
                'ZpusobUhr' => '0',
            ],
        ],
    ]);

    $x->generateInvoiceWO();

