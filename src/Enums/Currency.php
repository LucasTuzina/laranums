<?php

namespace Lucastuzina\Laranums\Enums;

use Lucastuzina\Laranums\Attributes\Label;
use Lucastuzina\Laranums\Laranum;

/**
 * ISO 4217 active currency codes.
 *
 * Each case's value is the three-letter alphabetic code; the English name
 * is attached as #[Label]. Symbol and decimal places live in a central
 * lookup table for compactness.
 */
enum Currency: string
{
    use Laranum;

    #[Label('UAE Dirham')] case AED = 'AED';
    #[Label('Afghan Afghani')] case AFN = 'AFN';
    #[Label('Albanian Lek')] case ALL = 'ALL';
    #[Label('Armenian Dram')] case AMD = 'AMD';
    #[Label('Netherlands Antillean Guilder')] case ANG = 'ANG';
    #[Label('Angolan Kwanza')] case AOA = 'AOA';
    #[Label('Argentine Peso')] case ARS = 'ARS';
    #[Label('Australian Dollar')] case AUD = 'AUD';
    #[Label('Aruban Florin')] case AWG = 'AWG';
    #[Label('Azerbaijani Manat')] case AZN = 'AZN';
    #[Label('Bosnia-Herzegovina Convertible Mark')] case BAM = 'BAM';
    #[Label('Barbadian Dollar')] case BBD = 'BBD';
    #[Label('Bangladeshi Taka')] case BDT = 'BDT';
    #[Label('Bulgarian Lev')] case BGN = 'BGN';
    #[Label('Bahraini Dinar')] case BHD = 'BHD';
    #[Label('Burundian Franc')] case BIF = 'BIF';
    #[Label('Bermudian Dollar')] case BMD = 'BMD';
    #[Label('Brunei Dollar')] case BND = 'BND';
    #[Label('Bolivian Boliviano')] case BOB = 'BOB';
    #[Label('Brazilian Real')] case BRL = 'BRL';
    #[Label('Bahamian Dollar')] case BSD = 'BSD';
    #[Label('Bhutanese Ngultrum')] case BTN = 'BTN';
    #[Label('Botswanan Pula')] case BWP = 'BWP';
    #[Label('Belarusian Ruble')] case BYN = 'BYN';
    #[Label('Belize Dollar')] case BZD = 'BZD';
    #[Label('Canadian Dollar')] case CAD = 'CAD';
    #[Label('Congolese Franc')] case CDF = 'CDF';
    #[Label('Swiss Franc')] case CHF = 'CHF';
    #[Label('Chilean Peso')] case CLP = 'CLP';
    #[Label('Chinese Yuan')] case CNY = 'CNY';
    #[Label('Colombian Peso')] case COP = 'COP';
    #[Label('Costa Rican Colón')] case CRC = 'CRC';
    #[Label('Cuban Peso')] case CUP = 'CUP';
    #[Label('Cape Verdean Escudo')] case CVE = 'CVE';
    #[Label('Czech Koruna')] case CZK = 'CZK';
    #[Label('Djiboutian Franc')] case DJF = 'DJF';
    #[Label('Danish Krone')] case DKK = 'DKK';
    #[Label('Dominican Peso')] case DOP = 'DOP';
    #[Label('Algerian Dinar')] case DZD = 'DZD';
    #[Label('Egyptian Pound')] case EGP = 'EGP';
    #[Label('Eritrean Nakfa')] case ERN = 'ERN';
    #[Label('Ethiopian Birr')] case ETB = 'ETB';
    #[Label('Euro')] case EUR = 'EUR';
    #[Label('Fijian Dollar')] case FJD = 'FJD';
    #[Label('Falkland Islands Pound')] case FKP = 'FKP';
    #[Label('British Pound')] case GBP = 'GBP';
    #[Label('Georgian Lari')] case GEL = 'GEL';
    #[Label('Ghanaian Cedi')] case GHS = 'GHS';
    #[Label('Gibraltar Pound')] case GIP = 'GIP';
    #[Label('Gambian Dalasi')] case GMD = 'GMD';
    #[Label('Guinean Franc')] case GNF = 'GNF';
    #[Label('Guatemalan Quetzal')] case GTQ = 'GTQ';
    #[Label('Guyanese Dollar')] case GYD = 'GYD';
    #[Label('Hong Kong Dollar')] case HKD = 'HKD';
    #[Label('Honduran Lempira')] case HNL = 'HNL';
    #[Label('Haitian Gourde')] case HTG = 'HTG';
    #[Label('Hungarian Forint')] case HUF = 'HUF';
    #[Label('Indonesian Rupiah')] case IDR = 'IDR';
    #[Label('Israeli New Shekel')] case ILS = 'ILS';
    #[Label('Indian Rupee')] case INR = 'INR';
    #[Label('Iraqi Dinar')] case IQD = 'IQD';
    #[Label('Iranian Rial')] case IRR = 'IRR';
    #[Label('Icelandic Króna')] case ISK = 'ISK';
    #[Label('Jamaican Dollar')] case JMD = 'JMD';
    #[Label('Jordanian Dinar')] case JOD = 'JOD';
    #[Label('Japanese Yen')] case JPY = 'JPY';
    #[Label('Kenyan Shilling')] case KES = 'KES';
    #[Label('Kyrgyzstani Som')] case KGS = 'KGS';
    #[Label('Cambodian Riel')] case KHR = 'KHR';
    #[Label('Comorian Franc')] case KMF = 'KMF';
    #[Label('North Korean Won')] case KPW = 'KPW';
    #[Label('South Korean Won')] case KRW = 'KRW';
    #[Label('Kuwaiti Dinar')] case KWD = 'KWD';
    #[Label('Cayman Islands Dollar')] case KYD = 'KYD';
    #[Label('Kazakhstani Tenge')] case KZT = 'KZT';
    #[Label('Lao Kip')] case LAK = 'LAK';
    #[Label('Lebanese Pound')] case LBP = 'LBP';
    #[Label('Sri Lankan Rupee')] case LKR = 'LKR';
    #[Label('Liberian Dollar')] case LRD = 'LRD';
    #[Label('Lesotho Loti')] case LSL = 'LSL';
    #[Label('Libyan Dinar')] case LYD = 'LYD';
    #[Label('Moroccan Dirham')] case MAD = 'MAD';
    #[Label('Moldovan Leu')] case MDL = 'MDL';
    #[Label('Malagasy Ariary')] case MGA = 'MGA';
    #[Label('Macedonian Denar')] case MKD = 'MKD';
    #[Label('Myanmar Kyat')] case MMK = 'MMK';
    #[Label('Mongolian Tögrög')] case MNT = 'MNT';
    #[Label('Macanese Pataca')] case MOP = 'MOP';
    #[Label('Mauritanian Ouguiya')] case MRU = 'MRU';
    #[Label('Mauritian Rupee')] case MUR = 'MUR';
    #[Label('Maldivian Rufiyaa')] case MVR = 'MVR';
    #[Label('Malawian Kwacha')] case MWK = 'MWK';
    #[Label('Mexican Peso')] case MXN = 'MXN';
    #[Label('Malaysian Ringgit')] case MYR = 'MYR';
    #[Label('Mozambican Metical')] case MZN = 'MZN';
    #[Label('Namibian Dollar')] case NAD = 'NAD';
    #[Label('Nigerian Naira')] case NGN = 'NGN';
    #[Label('Nicaraguan Córdoba')] case NIO = 'NIO';
    #[Label('Norwegian Krone')] case NOK = 'NOK';
    #[Label('Nepalese Rupee')] case NPR = 'NPR';
    #[Label('New Zealand Dollar')] case NZD = 'NZD';
    #[Label('Omani Rial')] case OMR = 'OMR';
    #[Label('Panamanian Balboa')] case PAB = 'PAB';
    #[Label('Peruvian Sol')] case PEN = 'PEN';
    #[Label('Papua New Guinean Kina')] case PGK = 'PGK';
    #[Label('Philippine Peso')] case PHP_ = 'PHP';
    #[Label('Pakistani Rupee')] case PKR = 'PKR';
    #[Label('Polish Złoty')] case PLN = 'PLN';
    #[Label('Paraguayan Guaraní')] case PYG = 'PYG';
    #[Label('Qatari Riyal')] case QAR = 'QAR';
    #[Label('Romanian Leu')] case RON = 'RON';
    #[Label('Serbian Dinar')] case RSD = 'RSD';
    #[Label('Russian Ruble')] case RUB = 'RUB';
    #[Label('Rwandan Franc')] case RWF = 'RWF';
    #[Label('Saudi Riyal')] case SAR = 'SAR';
    #[Label('Solomon Islands Dollar')] case SBD = 'SBD';
    #[Label('Seychellois Rupee')] case SCR = 'SCR';
    #[Label('Sudanese Pound')] case SDG = 'SDG';
    #[Label('Swedish Krona')] case SEK = 'SEK';
    #[Label('Singapore Dollar')] case SGD = 'SGD';
    #[Label('Saint Helena Pound')] case SHP = 'SHP';
    #[Label('Sierra Leonean Leone')] case SLE = 'SLE';
    #[Label('Somali Shilling')] case SOS = 'SOS';
    #[Label('Surinamese Dollar')] case SRD = 'SRD';
    #[Label('South Sudanese Pound')] case SSP = 'SSP';
    #[Label('São Tomé and Príncipe Dobra')] case STN = 'STN';
    #[Label('Syrian Pound')] case SYP = 'SYP';
    #[Label('Swazi Lilangeni')] case SZL = 'SZL';
    #[Label('Thai Baht')] case THB = 'THB';
    #[Label('Tajikistani Somoni')] case TJS = 'TJS';
    #[Label('Turkmenistan Manat')] case TMT = 'TMT';
    #[Label('Tunisian Dinar')] case TND = 'TND';
    #[Label('Tongan Paʻanga')] case TOP = 'TOP';
    #[Label('Turkish Lira')] case TRY_ = 'TRY';
    #[Label('Trinidad & Tobago Dollar')] case TTD = 'TTD';
    #[Label('New Taiwan Dollar')] case TWD = 'TWD';
    #[Label('Tanzanian Shilling')] case TZS = 'TZS';
    #[Label('Ukrainian Hryvnia')] case UAH = 'UAH';
    #[Label('Ugandan Shilling')] case UGX = 'UGX';
    #[Label('US Dollar')] case USD = 'USD';
    #[Label('Uruguayan Peso')] case UYU = 'UYU';
    #[Label('Uzbekistan Som')] case UZS = 'UZS';
    #[Label('Venezuelan Bolívar Soberano')] case VES = 'VES';
    #[Label('Vietnamese Dong')] case VND = 'VND';
    #[Label('Vanuatu Vatu')] case VUV = 'VUV';
    #[Label('Samoan Tala')] case WST = 'WST';
    #[Label('Central African CFA Franc')] case XAF = 'XAF';
    #[Label('East Caribbean Dollar')] case XCD = 'XCD';
    #[Label('West African CFA Franc')] case XOF = 'XOF';
    #[Label('CFP Franc')] case XPF = 'XPF';
    #[Label('Yemeni Rial')] case YER = 'YER';
    #[Label('South African Rand')] case ZAR = 'ZAR';
    #[Label('Zambian Kwacha')] case ZMW = 'ZMW';

    /**
     * [code => [symbol, decimals]]. Missing codes default to ['', 2].
     */
    private const METADATA = [
        'AED' => ['د.إ', 2],    'AFN' => ['؋', 2],      'ALL' => ['L', 2],
        'AMD' => ['֏', 2],      'ANG' => ['ƒ', 2],      'AOA' => ['Kz', 2],
        'ARS' => ['$', 2],      'AUD' => ['A$', 2],     'AWG' => ['ƒ', 2],
        'AZN' => ['₼', 2],      'BAM' => ['KM', 2],     'BBD' => ['$', 2],
        'BDT' => ['৳', 2],      'BGN' => ['лв', 2],     'BHD' => ['.د.ب', 3],
        'BIF' => ['FBu', 0],    'BMD' => ['$', 2],      'BND' => ['$', 2],
        'BOB' => ['Bs.', 2],    'BRL' => ['R$', 2],     'BSD' => ['$', 2],
        'BTN' => ['Nu.', 2],    'BWP' => ['P', 2],      'BYN' => ['Br', 2],
        'BZD' => ['BZ$', 2],    'CAD' => ['C$', 2],     'CDF' => ['FC', 2],
        'CHF' => ['CHF', 2],    'CLP' => ['$', 0],      'CNY' => ['¥', 2],
        'COP' => ['$', 2],      'CRC' => ['₡', 2],      'CUP' => ['$', 2],
        'CVE' => ['$', 2],      'CZK' => ['Kč', 2],     'DJF' => ['Fdj', 0],
        'DKK' => ['kr', 2],     'DOP' => ['RD$', 2],    'DZD' => ['د.ج', 2],
        'EGP' => ['£', 2],      'ERN' => ['Nfk', 2],    'ETB' => ['Br', 2],
        'EUR' => ['€', 2],      'FJD' => ['$', 2],      'FKP' => ['£', 2],
        'GBP' => ['£', 2],      'GEL' => ['₾', 2],      'GHS' => ['₵', 2],
        'GIP' => ['£', 2],      'GMD' => ['D', 2],      'GNF' => ['FG', 0],
        'GTQ' => ['Q', 2],      'GYD' => ['$', 2],      'HKD' => ['HK$', 2],
        'HNL' => ['L', 2],      'HTG' => ['G', 2],      'HUF' => ['Ft', 2],
        'IDR' => ['Rp', 2],     'ILS' => ['₪', 2],      'INR' => ['₹', 2],
        'IQD' => ['ع.د', 3],    'IRR' => ['﷼', 2],      'ISK' => ['kr', 0],
        'JMD' => ['J$', 2],     'JOD' => ['د.ا', 3],    'JPY' => ['¥', 0],
        'KES' => ['KSh', 2],    'KGS' => ['с', 2],      'KHR' => ['៛', 2],
        'KMF' => ['CF', 0],     'KPW' => ['₩', 2],      'KRW' => ['₩', 0],
        'KWD' => ['د.ك', 3],    'KYD' => ['$', 2],      'KZT' => ['₸', 2],
        'LAK' => ['₭', 2],      'LBP' => ['ل.ل', 2],    'LKR' => ['₨', 2],
        'LRD' => ['$', 2],      'LSL' => ['L', 2],      'LYD' => ['ل.د', 3],
        'MAD' => ['د.م.', 2],   'MDL' => ['L', 2],      'MGA' => ['Ar', 2],
        'MKD' => ['ден', 2],    'MMK' => ['K', 2],      'MNT' => ['₮', 2],
        'MOP' => ['MOP$', 2],   'MRU' => ['UM', 2],     'MUR' => ['₨', 2],
        'MVR' => ['Rf', 2],     'MWK' => ['MK', 2],     'MXN' => ['$', 2],
        'MYR' => ['RM', 2],     'MZN' => ['MT', 2],     'NAD' => ['$', 2],
        'NGN' => ['₦', 2],      'NIO' => ['C$', 2],     'NOK' => ['kr', 2],
        'NPR' => ['₨', 2],      'NZD' => ['NZ$', 2],    'OMR' => ['ر.ع.', 3],
        'PAB' => ['B/.', 2],    'PEN' => ['S/', 2],     'PGK' => ['K', 2],
        'PHP' => ['₱', 2],      'PKR' => ['₨', 2],      'PLN' => ['zł', 2],
        'PYG' => ['₲', 0],      'QAR' => ['ر.ق', 2],    'RON' => ['lei', 2],
        'RSD' => ['дин.', 2],   'RUB' => ['₽', 2],      'RWF' => ['FRw', 0],
        'SAR' => ['ر.س', 2],    'SBD' => ['$', 2],      'SCR' => ['₨', 2],
        'SDG' => ['ج.س.', 2],   'SEK' => ['kr', 2],     'SGD' => ['S$', 2],
        'SHP' => ['£', 2],      'SLE' => ['Le', 2],     'SOS' => ['S', 2],
        'SRD' => ['$', 2],      'SSP' => ['£', 2],      'STN' => ['Db', 2],
        'SYP' => ['£', 2],      'SZL' => ['L', 2],      'THB' => ['฿', 2],
        'TJS' => ['SM', 2],     'TMT' => ['m', 2],      'TND' => ['د.ت', 3],
        'TOP' => ['T$', 2],     'TRY' => ['₺', 2],      'TTD' => ['TT$', 2],
        'TWD' => ['NT$', 2],    'TZS' => ['TSh', 2],    'UAH' => ['₴', 2],
        'UGX' => ['USh', 0],    'USD' => ['$', 2],      'UYU' => ['$U', 2],
        'UZS' => ['сўм', 2],    'VES' => ['Bs.S', 2],   'VND' => ['₫', 0],
        'VUV' => ['VT', 0],     'WST' => ['T', 2],      'XAF' => ['FCFA', 0],
        'XCD' => ['EC$', 2],    'XOF' => ['CFA', 0],    'XPF' => ['₣', 0],
        'YER' => ['﷼', 2],      'ZAR' => ['R', 2],      'ZMW' => ['ZK', 2],
    ];

    /**
     * ISO 4217 three-letter alphabetic code (alias for `$this->value`).
     */
    public function code(): string
    {
        return $this->value;
    }

    /**
     * Typeset symbol used in everyday usage (may be ambiguous for e.g. "$").
     */
    public function symbol(): string
    {
        return self::METADATA[$this->value][0] ?? '';
    }

    /**
     * Minor-unit decimal places as defined by ISO 4217 (e.g. JPY = 0, USD = 2, KWD = 3).
     */
    public function decimals(): int
    {
        return self::METADATA[$this->value][1] ?? 2;
    }

    /**
     * Locale-aware money formatting using PHP's NumberFormatter when the intl
     * extension is available; otherwise a sensible plain-PHP fallback.
     *
     * Example: Currency::EUR->format(1234.5) → "€1,234.50"
     */
    public function format(float $amount, ?string $locale = null): string
    {
        if (class_exists(\NumberFormatter::class)) {
            $formatter = new \NumberFormatter(
                $locale ?? 'en_US',
                \NumberFormatter::CURRENCY
            );
            return $formatter->formatCurrency($amount, $this->value);
        }

        return $this->symbol().number_format($amount, $this->decimals(), '.', ',');
    }
}
