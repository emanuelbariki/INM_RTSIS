<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                "value" => "AED",
                "description" => "United Arab Emirates dirham"
            ],
            [
                "value" => "AFN",
                "description" => "Afghan afghani"
            ],
            [
                "value" => "ALL",
                "description" => "Albanian lek"
            ],
            [
                "value" => "AMD",
                "description" => "Armenian dram"
            ],
            [
                "value" => "ANG",
                "description" => "Netherlands Antillean guilder"
            ],
            [
                "value" => "AOA",
                "description" => "Angolan Kwanza"
            ],
            [
                "value" => "ARS",
                "description" => "Argentine peso"
            ],
            [
                "value" => "AUD",
                "description" => "Australian dollar"
            ],
            [
                "value" => "AWG",
                "description" => "Aruban guilder"
            ],
            [
                "value" => "AZN",
                "description" => "Azerbaijani manat"
            ],
            [
                "value" => "BAM",
                "description" => "Bosnia and Herzegovina konvertibilna marka"
            ],
            [
                "value" => "BBD",
                "description" => "Barbados dollar"
            ],
            [
                "value" => "BDT",
                "description" => "Bangladeshi taka"
            ],
            [
                "value" => "BGN",
                "description" => "Bulgarian lev"
            ],
            [
                "value" => "BHD",
                "description" => "Bahraini dinar"
            ],
            [
                "value" => "BIF",
                "description" => "Burundian franc"
            ],
            [
                "value" => "BMD",
                "description" => "Bermudian dollar"
            ],
            [
                "value" => "BND",
                "description" => "Brunei dollar"
            ],
            [
                "value" => "BOB",
                "description" => "Boliviano"
            ],
            [
                "value" => "BOV",
                "description" => "Bolivian Mvdol (funds code)"
            ],
            [
                "value" => "BRL",
                "description" => "Brazilian real"
            ],
            [
                "value" => "BSD",
                "description" => "Bahamian dollar"
            ],
            [
                "value" => "BTN",
                "description" => "Bhutan Ngultrum"
            ],
            [
                "value" => "BWP",
                "description" => "Botswana pula"
            ],
            [
                "value" => "BYR",
                "description" => "Belarusian ruble"
            ],
            [
                "value" => "BZD",
                "description" => "Belize dollar"
            ],
            [
                "value" => "CAD",
                "description" => "Canadian dollar"
            ],
            [
                "value" => "CDF",
                "description" => "Franc Congolais"
            ],
            [
                "value" => "CHE",
                "description" => "WIR Bank (complementary currency) (Switzerland)"
            ],
            [
                "value" => "CHF",
                "description" => "Swiss franc"
            ],
            [
                "value" => "CHW",
                "description" => "WIR Bank (complementary currency) (Switzerland)"
            ],
            [
                "value" => "CLF",
                "description" => "Unidad de Fomento (funds code) Chile"
            ],
            [
                "value" => "CLP",
                "description" => "Chilean peso"
            ],
            [
                "value" => "CNY",
                "description" => "Chinese Yuan"
            ],
            [
                "value" => "COP",
                "description" => "Colombian peso"
            ],
            [
                "value" => "COU",
                "description" => "Colombian Unidad de Valor Real"
            ],
            [
                "value" => "CRC",
                "description" => "Costa Rican colon"
            ],
            [
                "value" => "CUC",
                "description" => "Cuban convertible peso"
            ],
            [
                "value" => "CUP",
                "description" => "Cuban peso"
            ],
            [
                "value" => "CVE",
                "description" => "Cape Verde escudo"
            ],
            [
                "value" => "CZK",
                "description" => "Czech Koruna"
            ],
            [
                "value" => "DJF",
                "description" => "Djiboutian franc"
            ],
            [
                "value" => "DKK",
                "description" => "Danish krone"
            ],
            [
                "value" => "DOP",
                "description" => "Dominican peso"
            ],
            [
                "value" => "DZD",
                "description" => "Algerian dinar"
            ],
            [
                "value" => "EEK",
                "description" => "Estonian Kroon"
            ],
            [
                "value" => "EGP",
                "description" => "Egyptian pound"
            ],
            [
                "value" => "ERN",
                "description" => "Eritrean nakfa"
            ],
            [
                "value" => "ETB",
                "description" => "Ethiopian birr"
            ],
            [
                "value" => "EUR",
                "description" => "Euro"
            ],
            [
                "value" => "FJD",
                "description" => "Fiji dollar"
            ],
            [
                "value" => "FKP",
                "description" => "Falkland Islands pound"
            ],
            [
                "value" => "GBP",
                "description" => "Pound sterling"
            ],
            [
                "value" => "GEL",
                "description" => "Georgian lari"
            ],
            [
                "value" => "GHS",
                "description" => "Ghana Cedi"
            ],
            [
                "value" => "GIP",
                "description" => "Gibraltar pound"
            ],
            [
                "value" => "GMD",
                "description" => "Gambian Dalasi"
            ],
            [
                "value" => "GNF",
                "description" => "Guinean franc"
            ],
            [
                "value" => "GTQ",
                "description" => "Guatemalan quetzal"
            ],
            [
                "value" => "GYD",
                "description" => "Guyanese dollar"
            ],
            [
                "value" => "HKD",
                "description" => "Hong Kong dollar"
            ],
            [
                "value" => "HNL",
                "description" => "Honduran lempira"
            ],
            [
                "value" => "HRK",
                "description" => "Croatian kuna"
            ],
            [
                "value" => "HTG",
                "description" => "Haitian gourde"
            ],
            [
                "value" => "HUF",
                "description" => "Hungarian Forint"
            ],
            [
                "value" => "IDR",
                "description" => "Indonesia Rupiah"
            ],
            [
                "value" => "ILS",
                "description" => "Israeli new sheqel"
            ],
            [
                "value" => "INR",
                "description" => "Indian rupee"
            ],
            [
                "value" => "IQD",
                "description" => "Iraqi dinar"
            ],
            [
                "value" => "IRR",
                "description" => "Iranian rial"
            ],
            [
                "value" => "ISK",
                "description" => "Icelandic króna"
            ],
            [
                "value" => "JMD",
                "description" => "Jamaican dollar"
            ],
            [
                "value" => "JOD",
                "description" => "Jordanian dinar"
            ],
            [
                "value" => "JPY",
                "description" => "Japanese yen"
            ],
            [
                "value" => "KES",
                "description" => "Kenyan shilling"
            ],
            [
                "value" => "KGS",
                "description" => "Kyrgyzstan som"
            ],
            [
                "value" => "KHR",
                "description" => "Cambodian riel"
            ],
            [
                "value" => "KMF",
                "description" => "Comoro franc"
            ],
            [
                "value" => "KPW",
                "description" => "North Korean won"
            ],
            [
                "value" => "KRW",
                "description" => "South Korean won"
            ],
            [
                "value" => "KWD",
                "description" => "Kuwaiti dinar"
            ],
            [
                "value" => "KYD",
                "description" => "Cayman Islands dollar"
            ],
            [
                "value" => "KZT",
                "description" => "Kazakhstan Tenge"
            ],
            [
                "value" => "LAK",
                "description" => "Lao kip"
            ],
            [
                "value" => "LBP",
                "description" => "Lebanese pound"
            ],
            [
                "value" => "LKR",
                "description" => "Sri Lanka rupee"
            ],
            [
                "value" => "LRD",
                "description" => "Liberian dollar"
            ],
            [
                "value" => "LSL",
                "description" => "Lesotho loti"
            ],
            [
                "value" => "LTL",
                "description" => "Lithuanian litas"
            ],
            [
                "value" => "LVL",
                "description" => "Latvian lats"
            ],
            [
                "value" => "LYD",
                "description" => "Libyan dinar"
            ],
            [
                "value" => "MAD",
                "description" => "Moroccan dirham"
            ],
            [
                "value" => "MDL",
                "description" => "Moldovan leu"
            ],
            [
                "value" => "MGA",
                "description" => "Malagasy ariary"
            ],
            [
                "value" => "MKD",
                "description" => "Macedonian Denar"
            ],
            [
                "value" => "MMK",
                "description" => "Myanmar Kyat"
            ],
            [
                "value" => "MNT",
                "description" => "Mongolian Tugrik"
            ],
            [
                "value" => "MOP",
                "description" => "Macanese pataca"
            ],
            [
                "value" => "MRO",
                "description" => "Mauritania Ouguiya"
            ],
            [
                "value" => "MUR",
                "description" => "Mauritian rupee"
            ],
            [
                "value" => "MVR",
                "description" => "Maldives Rufiyaa"
            ],
            [
                "value" => "MWK",
                "description" => "Malawian kwacha"
            ],
            [
                "value" => "MXN",
                "description" => "Mexican peso"
            ],
            [
                "value" => "MXV",
                "description" => "Mexican Unidad de Inversion (UDI) (funds code) Mexico"
            ],
            [
                "value" => "MYR",
                "description" => "Malaysian ringgit"
            ],
            [
                "value" => "MZN",
                "description" => "Mozambican metical"
            ],
            [
                "value" => "NAD",
                "description" => "Namibian dollar"
            ],
            [
                "value" => "NGN",
                "description" => "Nigerian Naira"
            ],
            [
                "value" => "NIO",
                "description" => "Nicaraguan Cordoba oro"
            ],
            [
                "value" => "NOK",
                "description" => "Norwegian krone"
            ],
            [
                "value" => "NPR",
                "description" => "Nepalese rupee"
            ],
            [
                "value" => "NZD",
                "description" => "New Zealand dollar"
            ],
            [
                "value" => "OMR",
                "description" => "Omani Rial"
            ],
            [
                "value" => "PAB",
                "description" => "Panamanian balboa"
            ],
            [
                "value" => "PEN",
                "description" => "Peruvian nuevo sol"
            ],
            [
                "value" => "PGK",
                "description" => "Papua New Guinean kina"
            ],
            [
                "value" => "PHP",
                "description" => "Philippine peso"
            ],
            [
                "value" => "PKR",
                "description" => "Pakistani rupee"
            ],
            [
                "value" => "PLN",
                "description" => "Polish Zloty"
            ],
            [
                "value" => "PYG",
                "description" => "Paraguayan guaraní"
            ],
            [
                "value" => "QAR",
                "description" => "Qatari rial"
            ],
            [
                "value" => "RON",
                "description" => "Romanian new leu"
            ],
            [
                "value" => "RSD",
                "description" => "Serbian dinar"
            ],
            [
                "value" => "RUB",
                "description" => "Russian rouble"
            ],
            [
                "value" => "RWF",
                "description" => "Rwandan franc"
            ],
            [
                "value" => "SAR",
                "description" => "Saudi riyal"
            ],
            [
                "value" => "SBD",
                "description" => "Solomon Islands dollar"
            ],
            [
                "value" => "SCR",
                "description" => "Seychelles rupee"
            ],
            [
                "value" => "SDG",
                "description" => "Sudanese pound"
            ],
            [
                "value" => "SEK",
                "description" => "Swedish krona/kronor"
            ],
            [
                "value" => "SGD",
                "description" => "Singapore dollar"
            ],
            [
                "value" => "SHP",
                "description" => "Saint Helena pound"
            ],
            [
                "value" => "SLL",
                "description" => "Sierra Leonean leone"
            ],
            [
                "value" => "SOS",
                "description" => "Somali shilling"
            ],
            [
                "value" => "SRD",
                "description" => "Surinamese dollar"
            ],
            [
                "value" => "STD",
                "description" => "São Tomé and Príncipe dobra"
            ],
            [
                "value" => "SYP",
                "description" => "Syrian pound"
            ],
            [
                "value" => "SZL",
                "description" => "Swazi Lilangeni"
            ],
            [
                "value" => "THB",
                "description" => "Thai Baht"
            ],
            [
                "value" => "TJS",
                "description" => "Tajikistan Somoni"
            ],
            [
                "value" => "TMT",
                "description" => "Turkmenistani manat"
            ],
            [
                "value" => "TND",
                "description" => "Tunisian dinar"
            ],
            [
                "value" => "TOP",
                "description" => "Tonga Pa'anga"
            ],
            [
                "value" => "TRY",
                "description" => "Turkish lira"
            ],
            [
                "value" => "TTD",
                "description" => "Trinidad and Tobago dollar"
            ],
            [
                "value" => "TWD",
                "description" => "New Taiwan dollar"
            ],
            [
                "value" => "TZS",
                "description" => "Tanzanian shilling"
            ],
            [
                "value" => "UAH",
                "description" => "Ukrainian Hryvnia"
            ],
            [
                "value" => "UGX",
                "description" => "Ugandan shilling"
            ],
            [
                "value" => "USD",
                "description" => "United States dollar"
            ],
            [
                "value" => "USN",
                "description" => "United States dollar (next day) (funds code)"
            ],
            [
                "value" => "USS",
                "description" => "United States dollar (same day) (funds code)"
            ],
            [
                "value" => "UYU",
                "description" => "Uruguayan Peso"
            ],
            [
                "value" => "UZS",
                "description" => "Uzbekistan som"
            ],
            [
                "value" => "VEF",
                "description" => "Venezuelan bolívar fuerte"
            ],
            [
                "value" => "VND",
                "description" => "Vietnamese dong"
            ],
            [
                "value" => "VUV",
                "description" => "Vanuatu Vatu"
            ],
            [
                "value" => "WST",
                "description" => "Samoan tala"
            ],
            [
                "value" => "XAF",
                "description" => "CFA franc BEAC"
            ],
            [
                "value" => "XAG",
                "description" => "Silver (one troy ounce)"
            ],
            [
                "value" => "XAU",
                "description" => "Gold (one troy ounce)"
            ],
            [
                "value" => "XBA",
                "description" => "European Composite Unit (EURCO) (bond market unit)"
            ],
            [
                "value" => "XBB",
                "description" => "European Monetary Unit (E.M.U.-6) (bond market unit)"
            ],
            [
                "value" => "XBC",
                "description" => "European Unit of Account 9 (E.U.A.-9) (bond market unit)"
            ],
            [
                "value" => "XBD",
                "description" => "European Unit of Account 17 (E.U.A.-17) (bond market unit)"
            ],
            [
                "value" => "XCD",
                "description" => "East Caribbean dollar"
            ],
            [
                "value" => "XDR",
                "description" => "Special Drawing Rights (International Monetary Fund)"
            ],
            [
                "value" => "XFU",
                "description" => "UIC franc (special settlement currency) (International Union of Railways)"
            ],
            [
                "value" => "XOF",
                "description" => "CFA Franc BCEAO"
            ],
            [
                "value" => "XPD",
                "description" => "Palladium (one troy ounce)"
            ],
            [
                "value" => "XPF",
                "description" => "CFP franc"
            ],
            [
                "value" => "XPT",
                "description" => "Platinum (one troy ounce)"
            ],
            [
                "value" => "XTS",
                "description" => "Testing Code"
            ],
            [
                "value" => "XXX",
                "description" => "No currency"
            ],
            [
                "value" => "YER",
                "description" => "Yemeni rial"
            ],
            [
                "value" => "ZAR",
                "description" => "South African rand"
            ],
            [
                "value" => "ZMK",
                "description" => "Zambian kwacha"
            ],
            [
                "value" => "ZWL",
                "description" => "Zimbabwe dollar"
            ]
        ];

        foreach ($currencies as $data) {
            Currency::create([
                'value' => $data['value'],
                'description' => $data['description'],
            ]);
        }
    }
}
