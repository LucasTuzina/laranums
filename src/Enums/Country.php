<?php

namespace Lucastuzina\Laranums\Enums;

use Lucastuzina\Laranums\Attributes\Label;
use Lucastuzina\Laranums\Laranum;

/**
 * ISO 3166-1 country codes.
 *
 * Case name and value are the alpha-2 code (upper-case). Alpha-3, numeric,
 * dial code and continent live in a central lookup table — compact and
 * direct to reference.
 */
enum Country: string
{
    use Laranum;

    #[Label('Andorra')] case AD = 'AD';
    #[Label('United Arab Emirates')] case AE = 'AE';
    #[Label('Afghanistan')] case AF = 'AF';
    #[Label('Antigua and Barbuda')] case AG = 'AG';
    #[Label('Anguilla')] case AI = 'AI';
    #[Label('Albania')] case AL = 'AL';
    #[Label('Armenia')] case AM = 'AM';
    #[Label('Angola')] case AO = 'AO';
    #[Label('Antarctica')] case AQ = 'AQ';
    #[Label('Argentina')] case AR = 'AR';
    #[Label('American Samoa')] case AS_ = 'AS';
    #[Label('Austria')] case AT = 'AT';
    #[Label('Australia')] case AU = 'AU';
    #[Label('Aruba')] case AW = 'AW';
    #[Label('Åland Islands')] case AX = 'AX';
    #[Label('Azerbaijan')] case AZ = 'AZ';
    #[Label('Bosnia and Herzegovina')] case BA = 'BA';
    #[Label('Barbados')] case BB = 'BB';
    #[Label('Bangladesh')] case BD = 'BD';
    #[Label('Belgium')] case BE = 'BE';
    #[Label('Burkina Faso')] case BF = 'BF';
    #[Label('Bulgaria')] case BG = 'BG';
    #[Label('Bahrain')] case BH = 'BH';
    #[Label('Burundi')] case BI = 'BI';
    #[Label('Benin')] case BJ = 'BJ';
    #[Label('Saint Barthélemy')] case BL = 'BL';
    #[Label('Bermuda')] case BM = 'BM';
    #[Label('Brunei')] case BN = 'BN';
    #[Label('Bolivia')] case BO = 'BO';
    #[Label('Caribbean Netherlands')] case BQ = 'BQ';
    #[Label('Brazil')] case BR = 'BR';
    #[Label('Bahamas')] case BS = 'BS';
    #[Label('Bhutan')] case BT = 'BT';
    #[Label('Bouvet Island')] case BV = 'BV';
    #[Label('Botswana')] case BW = 'BW';
    #[Label('Belarus')] case BY = 'BY';
    #[Label('Belize')] case BZ = 'BZ';
    #[Label('Canada')] case CA = 'CA';
    #[Label('Cocos (Keeling) Islands')] case CC = 'CC';
    #[Label('DR Congo')] case CD = 'CD';
    #[Label('Central African Republic')] case CF = 'CF';
    #[Label('Congo')] case CG = 'CG';
    #[Label('Switzerland')] case CH = 'CH';
    #[Label('Côte d\'Ivoire')] case CI = 'CI';
    #[Label('Cook Islands')] case CK = 'CK';
    #[Label('Chile')] case CL = 'CL';
    #[Label('Cameroon')] case CM = 'CM';
    #[Label('China')] case CN = 'CN';
    #[Label('Colombia')] case CO = 'CO';
    #[Label('Costa Rica')] case CR = 'CR';
    #[Label('Cuba')] case CU = 'CU';
    #[Label('Cape Verde')] case CV = 'CV';
    #[Label('Curaçao')] case CW = 'CW';
    #[Label('Christmas Island')] case CX = 'CX';
    #[Label('Cyprus')] case CY = 'CY';
    #[Label('Czechia')] case CZ = 'CZ';
    #[Label('Germany')] case DE = 'DE';
    #[Label('Djibouti')] case DJ = 'DJ';
    #[Label('Denmark')] case DK = 'DK';
    #[Label('Dominica')] case DM = 'DM';
    #[Label('Dominican Republic')] case DO_ = 'DO';
    #[Label('Algeria')] case DZ = 'DZ';
    #[Label('Ecuador')] case EC = 'EC';
    #[Label('Estonia')] case EE = 'EE';
    #[Label('Egypt')] case EG = 'EG';
    #[Label('Western Sahara')] case EH = 'EH';
    #[Label('Eritrea')] case ER = 'ER';
    #[Label('Spain')] case ES = 'ES';
    #[Label('Ethiopia')] case ET = 'ET';
    #[Label('Finland')] case FI = 'FI';
    #[Label('Fiji')] case FJ = 'FJ';
    #[Label('Falkland Islands')] case FK = 'FK';
    #[Label('Micronesia')] case FM = 'FM';
    #[Label('Faroe Islands')] case FO = 'FO';
    #[Label('France')] case FR = 'FR';
    #[Label('Gabon')] case GA = 'GA';
    #[Label('United Kingdom')] case GB = 'GB';
    #[Label('Grenada')] case GD = 'GD';
    #[Label('Georgia')] case GE = 'GE';
    #[Label('French Guiana')] case GF = 'GF';
    #[Label('Guernsey')] case GG = 'GG';
    #[Label('Ghana')] case GH = 'GH';
    #[Label('Gibraltar')] case GI = 'GI';
    #[Label('Greenland')] case GL = 'GL';
    #[Label('Gambia')] case GM = 'GM';
    #[Label('Guinea')] case GN = 'GN';
    #[Label('Guadeloupe')] case GP = 'GP';
    #[Label('Equatorial Guinea')] case GQ = 'GQ';
    #[Label('Greece')] case GR = 'GR';
    #[Label('South Georgia and the South Sandwich Islands')] case GS = 'GS';
    #[Label('Guatemala')] case GT = 'GT';
    #[Label('Guam')] case GU = 'GU';
    #[Label('Guinea-Bissau')] case GW = 'GW';
    #[Label('Guyana')] case GY = 'GY';
    #[Label('Hong Kong')] case HK = 'HK';
    #[Label('Heard Island and McDonald Islands')] case HM = 'HM';
    #[Label('Honduras')] case HN = 'HN';
    #[Label('Croatia')] case HR = 'HR';
    #[Label('Haiti')] case HT = 'HT';
    #[Label('Hungary')] case HU = 'HU';
    #[Label('Indonesia')] case ID = 'ID';
    #[Label('Ireland')] case IE = 'IE';
    #[Label('Israel')] case IL = 'IL';
    #[Label('Isle of Man')] case IM = 'IM';
    #[Label('India')] case IN_ = 'IN';
    #[Label('British Indian Ocean Territory')] case IO = 'IO';
    #[Label('Iraq')] case IQ = 'IQ';
    #[Label('Iran')] case IR = 'IR';
    #[Label('Iceland')] case IS_ = 'IS';
    #[Label('Italy')] case IT = 'IT';
    #[Label('Jersey')] case JE = 'JE';
    #[Label('Jamaica')] case JM = 'JM';
    #[Label('Jordan')] case JO = 'JO';
    #[Label('Japan')] case JP = 'JP';
    #[Label('Kenya')] case KE = 'KE';
    #[Label('Kyrgyzstan')] case KG = 'KG';
    #[Label('Cambodia')] case KH = 'KH';
    #[Label('Kiribati')] case KI = 'KI';
    #[Label('Comoros')] case KM = 'KM';
    #[Label('Saint Kitts and Nevis')] case KN = 'KN';
    #[Label('North Korea')] case KP = 'KP';
    #[Label('South Korea')] case KR = 'KR';
    #[Label('Kuwait')] case KW = 'KW';
    #[Label('Cayman Islands')] case KY = 'KY';
    #[Label('Kazakhstan')] case KZ = 'KZ';
    #[Label('Laos')] case LA = 'LA';
    #[Label('Lebanon')] case LB = 'LB';
    #[Label('Saint Lucia')] case LC = 'LC';
    #[Label('Liechtenstein')] case LI = 'LI';
    #[Label('Sri Lanka')] case LK = 'LK';
    #[Label('Liberia')] case LR = 'LR';
    #[Label('Lesotho')] case LS = 'LS';
    #[Label('Lithuania')] case LT = 'LT';
    #[Label('Luxembourg')] case LU = 'LU';
    #[Label('Latvia')] case LV = 'LV';
    #[Label('Libya')] case LY = 'LY';
    #[Label('Morocco')] case MA = 'MA';
    #[Label('Monaco')] case MC = 'MC';
    #[Label('Moldova')] case MD = 'MD';
    #[Label('Montenegro')] case ME = 'ME';
    #[Label('Saint Martin')] case MF = 'MF';
    #[Label('Madagascar')] case MG = 'MG';
    #[Label('Marshall Islands')] case MH = 'MH';
    #[Label('North Macedonia')] case MK = 'MK';
    #[Label('Mali')] case ML = 'ML';
    #[Label('Myanmar')] case MM = 'MM';
    #[Label('Mongolia')] case MN = 'MN';
    #[Label('Macau')] case MO = 'MO';
    #[Label('Northern Mariana Islands')] case MP = 'MP';
    #[Label('Martinique')] case MQ = 'MQ';
    #[Label('Mauritania')] case MR = 'MR';
    #[Label('Montserrat')] case MS = 'MS';
    #[Label('Malta')] case MT = 'MT';
    #[Label('Mauritius')] case MU = 'MU';
    #[Label('Maldives')] case MV = 'MV';
    #[Label('Malawi')] case MW = 'MW';
    #[Label('Mexico')] case MX = 'MX';
    #[Label('Malaysia')] case MY = 'MY';
    #[Label('Mozambique')] case MZ = 'MZ';
    #[Label('Namibia')] case NA_ = 'NA';
    #[Label('New Caledonia')] case NC = 'NC';
    #[Label('Niger')] case NE = 'NE';
    #[Label('Norfolk Island')] case NF = 'NF';
    #[Label('Nigeria')] case NG = 'NG';
    #[Label('Nicaragua')] case NI = 'NI';
    #[Label('Netherlands')] case NL = 'NL';
    #[Label('Norway')] case NO_ = 'NO';
    #[Label('Nepal')] case NP = 'NP';
    #[Label('Nauru')] case NR = 'NR';
    #[Label('Niue')] case NU = 'NU';
    #[Label('New Zealand')] case NZ = 'NZ';
    #[Label('Oman')] case OM = 'OM';
    #[Label('Panama')] case PA = 'PA';
    #[Label('Peru')] case PE = 'PE';
    #[Label('French Polynesia')] case PF = 'PF';
    #[Label('Papua New Guinea')] case PG = 'PG';
    #[Label('Philippines')] case PH = 'PH';
    #[Label('Pakistan')] case PK = 'PK';
    #[Label('Poland')] case PL = 'PL';
    #[Label('Saint Pierre and Miquelon')] case PM = 'PM';
    #[Label('Pitcairn Islands')] case PN = 'PN';
    #[Label('Puerto Rico')] case PR = 'PR';
    #[Label('Palestine')] case PS = 'PS';
    #[Label('Portugal')] case PT = 'PT';
    #[Label('Palau')] case PW = 'PW';
    #[Label('Paraguay')] case PY = 'PY';
    #[Label('Qatar')] case QA = 'QA';
    #[Label('Réunion')] case RE = 'RE';
    #[Label('Romania')] case RO = 'RO';
    #[Label('Serbia')] case RS = 'RS';
    #[Label('Russia')] case RU = 'RU';
    #[Label('Rwanda')] case RW = 'RW';
    #[Label('Saudi Arabia')] case SA = 'SA';
    #[Label('Solomon Islands')] case SB = 'SB';
    #[Label('Seychelles')] case SC = 'SC';
    #[Label('Sudan')] case SD = 'SD';
    #[Label('Sweden')] case SE = 'SE';
    #[Label('Singapore')] case SG = 'SG';
    #[Label('Saint Helena')] case SH = 'SH';
    #[Label('Slovenia')] case SI = 'SI';
    #[Label('Svalbard and Jan Mayen')] case SJ = 'SJ';
    #[Label('Slovakia')] case SK = 'SK';
    #[Label('Sierra Leone')] case SL = 'SL';
    #[Label('San Marino')] case SM = 'SM';
    #[Label('Senegal')] case SN = 'SN';
    #[Label('Somalia')] case SO = 'SO';
    #[Label('Suriname')] case SR = 'SR';
    #[Label('South Sudan')] case SS = 'SS';
    #[Label('São Tomé and Príncipe')] case ST = 'ST';
    #[Label('El Salvador')] case SV = 'SV';
    #[Label('Sint Maarten')] case SX = 'SX';
    #[Label('Syria')] case SY = 'SY';
    #[Label('Eswatini')] case SZ = 'SZ';
    #[Label('Turks and Caicos Islands')] case TC = 'TC';
    #[Label('Chad')] case TD = 'TD';
    #[Label('French Southern Territories')] case TF = 'TF';
    #[Label('Togo')] case TG = 'TG';
    #[Label('Thailand')] case TH = 'TH';
    #[Label('Tajikistan')] case TJ = 'TJ';
    #[Label('Tokelau')] case TK = 'TK';
    #[Label('Timor-Leste')] case TL = 'TL';
    #[Label('Turkmenistan')] case TM = 'TM';
    #[Label('Tunisia')] case TN = 'TN';
    #[Label('Tonga')] case TO_ = 'TO';
    #[Label('Turkey')] case TR = 'TR';
    #[Label('Trinidad and Tobago')] case TT = 'TT';
    #[Label('Tuvalu')] case TV = 'TV';
    #[Label('Taiwan')] case TW = 'TW';
    #[Label('Tanzania')] case TZ = 'TZ';
    #[Label('Ukraine')] case UA = 'UA';
    #[Label('Uganda')] case UG = 'UG';
    #[Label('United States Minor Outlying Islands')] case UM = 'UM';
    #[Label('United States')] case US = 'US';
    #[Label('Uruguay')] case UY = 'UY';
    #[Label('Uzbekistan')] case UZ = 'UZ';
    #[Label('Vatican City')] case VA = 'VA';
    #[Label('Saint Vincent and the Grenadines')] case VC = 'VC';
    #[Label('Venezuela')] case VE = 'VE';
    #[Label('British Virgin Islands')] case VG = 'VG';
    #[Label('US Virgin Islands')] case VI = 'VI';
    #[Label('Vietnam')] case VN = 'VN';
    #[Label('Vanuatu')] case VU = 'VU';
    #[Label('Wallis and Futuna')] case WF = 'WF';
    #[Label('Samoa')] case WS = 'WS';
    #[Label('Yemen')] case YE = 'YE';
    #[Label('Mayotte')] case YT = 'YT';
    #[Label('South Africa')] case ZA = 'ZA';
    #[Label('Zambia')] case ZM = 'ZM';
    #[Label('Zimbabwe')] case ZW = 'ZW';

    /**
     * [alpha2 => [alpha3, numeric, dialCode, continentCode]].
     */
    private const METADATA = [
        'AD' => ['AND', '020', '+376', 'EU'], 'AE' => ['ARE', '784', '+971', 'AS'],
        'AF' => ['AFG', '004', '+93',  'AS'], 'AG' => ['ATG', '028', '+1268','NA'],
        'AI' => ['AIA', '660', '+1264','NA'], 'AL' => ['ALB', '008', '+355', 'EU'],
        'AM' => ['ARM', '051', '+374', 'AS'], 'AO' => ['AGO', '024', '+244', 'AF'],
        'AQ' => ['ATA', '010', '',     'AN'], 'AR' => ['ARG', '032', '+54',  'SA'],
        'AS' => ['ASM', '016', '+1684','OC'], 'AT' => ['AUT', '040', '+43',  'EU'],
        'AU' => ['AUS', '036', '+61',  'OC'], 'AW' => ['ABW', '533', '+297', 'NA'],
        'AX' => ['ALA', '248', '+358', 'EU'], 'AZ' => ['AZE', '031', '+994', 'AS'],
        'BA' => ['BIH', '070', '+387', 'EU'], 'BB' => ['BRB', '052', '+1246','NA'],
        'BD' => ['BGD', '050', '+880', 'AS'], 'BE' => ['BEL', '056', '+32',  'EU'],
        'BF' => ['BFA', '854', '+226', 'AF'], 'BG' => ['BGR', '100', '+359', 'EU'],
        'BH' => ['BHR', '048', '+973', 'AS'], 'BI' => ['BDI', '108', '+257', 'AF'],
        'BJ' => ['BEN', '204', '+229', 'AF'], 'BL' => ['BLM', '652', '+590', 'NA'],
        'BM' => ['BMU', '060', '+1441','NA'], 'BN' => ['BRN', '096', '+673', 'AS'],
        'BO' => ['BOL', '068', '+591', 'SA'], 'BQ' => ['BES', '535', '+599', 'NA'],
        'BR' => ['BRA', '076', '+55',  'SA'], 'BS' => ['BHS', '044', '+1242','NA'],
        'BT' => ['BTN', '064', '+975', 'AS'], 'BV' => ['BVT', '074', '',     'AN'],
        'BW' => ['BWA', '072', '+267', 'AF'], 'BY' => ['BLR', '112', '+375', 'EU'],
        'BZ' => ['BLZ', '084', '+501', 'NA'], 'CA' => ['CAN', '124', '+1',   'NA'],
        'CC' => ['CCK', '166', '+61',  'AS'], 'CD' => ['COD', '180', '+243', 'AF'],
        'CF' => ['CAF', '140', '+236', 'AF'], 'CG' => ['COG', '178', '+242', 'AF'],
        'CH' => ['CHE', '756', '+41',  'EU'], 'CI' => ['CIV', '384', '+225', 'AF'],
        'CK' => ['COK', '184', '+682', 'OC'], 'CL' => ['CHL', '152', '+56',  'SA'],
        'CM' => ['CMR', '120', '+237', 'AF'], 'CN' => ['CHN', '156', '+86',  'AS'],
        'CO' => ['COL', '170', '+57',  'SA'], 'CR' => ['CRI', '188', '+506', 'NA'],
        'CU' => ['CUB', '192', '+53',  'NA'], 'CV' => ['CPV', '132', '+238', 'AF'],
        'CW' => ['CUW', '531', '+599', 'NA'], 'CX' => ['CXR', '162', '+61',  'AS'],
        'CY' => ['CYP', '196', '+357', 'EU'], 'CZ' => ['CZE', '203', '+420', 'EU'],
        'DE' => ['DEU', '276', '+49',  'EU'], 'DJ' => ['DJI', '262', '+253', 'AF'],
        'DK' => ['DNK', '208', '+45',  'EU'], 'DM' => ['DMA', '212', '+1767','NA'],
        'DO' => ['DOM', '214', '+1809','NA'], 'DZ' => ['DZA', '012', '+213', 'AF'],
        'EC' => ['ECU', '218', '+593', 'SA'], 'EE' => ['EST', '233', '+372', 'EU'],
        'EG' => ['EGY', '818', '+20',  'AF'], 'EH' => ['ESH', '732', '+212', 'AF'],
        'ER' => ['ERI', '232', '+291', 'AF'], 'ES' => ['ESP', '724', '+34',  'EU'],
        'ET' => ['ETH', '231', '+251', 'AF'], 'FI' => ['FIN', '246', '+358', 'EU'],
        'FJ' => ['FJI', '242', '+679', 'OC'], 'FK' => ['FLK', '238', '+500', 'SA'],
        'FM' => ['FSM', '583', '+691', 'OC'], 'FO' => ['FRO', '234', '+298', 'EU'],
        'FR' => ['FRA', '250', '+33',  'EU'], 'GA' => ['GAB', '266', '+241', 'AF'],
        'GB' => ['GBR', '826', '+44',  'EU'], 'GD' => ['GRD', '308', '+1473','NA'],
        'GE' => ['GEO', '268', '+995', 'AS'], 'GF' => ['GUF', '254', '+594', 'SA'],
        'GG' => ['GGY', '831', '+44',  'EU'], 'GH' => ['GHA', '288', '+233', 'AF'],
        'GI' => ['GIB', '292', '+350', 'EU'], 'GL' => ['GRL', '304', '+299', 'NA'],
        'GM' => ['GMB', '270', '+220', 'AF'], 'GN' => ['GIN', '324', '+224', 'AF'],
        'GP' => ['GLP', '312', '+590', 'NA'], 'GQ' => ['GNQ', '226', '+240', 'AF'],
        'GR' => ['GRC', '300', '+30',  'EU'], 'GS' => ['SGS', '239', '',     'AN'],
        'GT' => ['GTM', '320', '+502', 'NA'], 'GU' => ['GUM', '316', '+1671','OC'],
        'GW' => ['GNB', '624', '+245', 'AF'], 'GY' => ['GUY', '328', '+592', 'SA'],
        'HK' => ['HKG', '344', '+852', 'AS'], 'HM' => ['HMD', '334', '',     'AN'],
        'HN' => ['HND', '340', '+504', 'NA'], 'HR' => ['HRV', '191', '+385', 'EU'],
        'HT' => ['HTI', '332', '+509', 'NA'], 'HU' => ['HUN', '348', '+36',  'EU'],
        'ID' => ['IDN', '360', '+62',  'AS'], 'IE' => ['IRL', '372', '+353', 'EU'],
        'IL' => ['ISR', '376', '+972', 'AS'], 'IM' => ['IMN', '833', '+44',  'EU'],
        'IN' => ['IND', '356', '+91',  'AS'], 'IO' => ['IOT', '086', '+246', 'AS'],
        'IQ' => ['IRQ', '368', '+964', 'AS'], 'IR' => ['IRN', '364', '+98',  'AS'],
        'IS' => ['ISL', '352', '+354', 'EU'], 'IT' => ['ITA', '380', '+39',  'EU'],
        'JE' => ['JEY', '832', '+44',  'EU'], 'JM' => ['JAM', '388', '+1876','NA'],
        'JO' => ['JOR', '400', '+962', 'AS'], 'JP' => ['JPN', '392', '+81',  'AS'],
        'KE' => ['KEN', '404', '+254', 'AF'], 'KG' => ['KGZ', '417', '+996', 'AS'],
        'KH' => ['KHM', '116', '+855', 'AS'], 'KI' => ['KIR', '296', '+686', 'OC'],
        'KM' => ['COM', '174', '+269', 'AF'], 'KN' => ['KNA', '659', '+1869','NA'],
        'KP' => ['PRK', '408', '+850', 'AS'], 'KR' => ['KOR', '410', '+82',  'AS'],
        'KW' => ['KWT', '414', '+965', 'AS'], 'KY' => ['CYM', '136', '+1345','NA'],
        'KZ' => ['KAZ', '398', '+7',   'AS'], 'LA' => ['LAO', '418', '+856', 'AS'],
        'LB' => ['LBN', '422', '+961', 'AS'], 'LC' => ['LCA', '662', '+1758','NA'],
        'LI' => ['LIE', '438', '+423', 'EU'], 'LK' => ['LKA', '144', '+94',  'AS'],
        'LR' => ['LBR', '430', '+231', 'AF'], 'LS' => ['LSO', '426', '+266', 'AF'],
        'LT' => ['LTU', '440', '+370', 'EU'], 'LU' => ['LUX', '442', '+352', 'EU'],
        'LV' => ['LVA', '428', '+371', 'EU'], 'LY' => ['LBY', '434', '+218', 'AF'],
        'MA' => ['MAR', '504', '+212', 'AF'], 'MC' => ['MCO', '492', '+377', 'EU'],
        'MD' => ['MDA', '498', '+373', 'EU'], 'ME' => ['MNE', '499', '+382', 'EU'],
        'MF' => ['MAF', '663', '+590', 'NA'], 'MG' => ['MDG', '450', '+261', 'AF'],
        'MH' => ['MHL', '584', '+692', 'OC'], 'MK' => ['MKD', '807', '+389', 'EU'],
        'ML' => ['MLI', '466', '+223', 'AF'], 'MM' => ['MMR', '104', '+95',  'AS'],
        'MN' => ['MNG', '496', '+976', 'AS'], 'MO' => ['MAC', '446', '+853', 'AS'],
        'MP' => ['MNP', '580', '+1670','OC'], 'MQ' => ['MTQ', '474', '+596', 'NA'],
        'MR' => ['MRT', '478', '+222', 'AF'], 'MS' => ['MSR', '500', '+1664','NA'],
        'MT' => ['MLT', '470', '+356', 'EU'], 'MU' => ['MUS', '480', '+230', 'AF'],
        'MV' => ['MDV', '462', '+960', 'AS'], 'MW' => ['MWI', '454', '+265', 'AF'],
        'MX' => ['MEX', '484', '+52',  'NA'], 'MY' => ['MYS', '458', '+60',  'AS'],
        'MZ' => ['MOZ', '508', '+258', 'AF'], 'NA' => ['NAM', '516', '+264', 'AF'],
        'NC' => ['NCL', '540', '+687', 'OC'], 'NE' => ['NER', '562', '+227', 'AF'],
        'NF' => ['NFK', '574', '+672', 'OC'], 'NG' => ['NGA', '566', '+234', 'AF'],
        'NI' => ['NIC', '558', '+505', 'NA'], 'NL' => ['NLD', '528', '+31',  'EU'],
        'NO' => ['NOR', '578', '+47',  'EU'], 'NP' => ['NPL', '524', '+977', 'AS'],
        'NR' => ['NRU', '520', '+674', 'OC'], 'NU' => ['NIU', '570', '+683', 'OC'],
        'NZ' => ['NZL', '554', '+64',  'OC'], 'OM' => ['OMN', '512', '+968', 'AS'],
        'PA' => ['PAN', '591', '+507', 'NA'], 'PE' => ['PER', '604', '+51',  'SA'],
        'PF' => ['PYF', '258', '+689', 'OC'], 'PG' => ['PNG', '598', '+675', 'OC'],
        'PH' => ['PHL', '608', '+63',  'AS'], 'PK' => ['PAK', '586', '+92',  'AS'],
        'PL' => ['POL', '616', '+48',  'EU'], 'PM' => ['SPM', '666', '+508', 'NA'],
        'PN' => ['PCN', '612', '+64',  'OC'], 'PR' => ['PRI', '630', '+1787','NA'],
        'PS' => ['PSE', '275', '+970', 'AS'], 'PT' => ['PRT', '620', '+351', 'EU'],
        'PW' => ['PLW', '585', '+680', 'OC'], 'PY' => ['PRY', '600', '+595', 'SA'],
        'QA' => ['QAT', '634', '+974', 'AS'], 'RE' => ['REU', '638', '+262', 'AF'],
        'RO' => ['ROU', '642', '+40',  'EU'], 'RS' => ['SRB', '688', '+381', 'EU'],
        'RU' => ['RUS', '643', '+7',   'EU'], 'RW' => ['RWA', '646', '+250', 'AF'],
        'SA' => ['SAU', '682', '+966', 'AS'], 'SB' => ['SLB', '090', '+677', 'OC'],
        'SC' => ['SYC', '690', '+248', 'AF'], 'SD' => ['SDN', '729', '+249', 'AF'],
        'SE' => ['SWE', '752', '+46',  'EU'], 'SG' => ['SGP', '702', '+65',  'AS'],
        'SH' => ['SHN', '654', '+290', 'AF'], 'SI' => ['SVN', '705', '+386', 'EU'],
        'SJ' => ['SJM', '744', '+47',  'EU'], 'SK' => ['SVK', '703', '+421', 'EU'],
        'SL' => ['SLE', '694', '+232', 'AF'], 'SM' => ['SMR', '674', '+378', 'EU'],
        'SN' => ['SEN', '686', '+221', 'AF'], 'SO' => ['SOM', '706', '+252', 'AF'],
        'SR' => ['SUR', '740', '+597', 'SA'], 'SS' => ['SSD', '728', '+211', 'AF'],
        'ST' => ['STP', '678', '+239', 'AF'], 'SV' => ['SLV', '222', '+503', 'NA'],
        'SX' => ['SXM', '534', '+1721','NA'], 'SY' => ['SYR', '760', '+963', 'AS'],
        'SZ' => ['SWZ', '748', '+268', 'AF'], 'TC' => ['TCA', '796', '+1649','NA'],
        'TD' => ['TCD', '148', '+235', 'AF'], 'TF' => ['ATF', '260', '',     'AN'],
        'TG' => ['TGO', '768', '+228', 'AF'], 'TH' => ['THA', '764', '+66',  'AS'],
        'TJ' => ['TJK', '762', '+992', 'AS'], 'TK' => ['TKL', '772', '+690', 'OC'],
        'TL' => ['TLS', '626', '+670', 'AS'], 'TM' => ['TKM', '795', '+993', 'AS'],
        'TN' => ['TUN', '788', '+216', 'AF'], 'TO' => ['TON', '776', '+676', 'OC'],
        'TR' => ['TUR', '792', '+90',  'AS'], 'TT' => ['TTO', '780', '+1868','NA'],
        'TV' => ['TUV', '798', '+688', 'OC'], 'TW' => ['TWN', '158', '+886', 'AS'],
        'TZ' => ['TZA', '834', '+255', 'AF'], 'UA' => ['UKR', '804', '+380', 'EU'],
        'UG' => ['UGA', '800', '+256', 'AF'], 'UM' => ['UMI', '581', '+1',   'OC'],
        'US' => ['USA', '840', '+1',   'NA'], 'UY' => ['URY', '858', '+598', 'SA'],
        'UZ' => ['UZB', '860', '+998', 'AS'], 'VA' => ['VAT', '336', '+379', 'EU'],
        'VC' => ['VCT', '670', '+1784','NA'], 'VE' => ['VEN', '862', '+58',  'SA'],
        'VG' => ['VGB', '092', '+1284','NA'], 'VI' => ['VIR', '850', '+1340','NA'],
        'VN' => ['VNM', '704', '+84',  'AS'], 'VU' => ['VUT', '548', '+678', 'OC'],
        'WF' => ['WLF', '876', '+681', 'OC'], 'WS' => ['WSM', '882', '+685', 'OC'],
        'YE' => ['YEM', '887', '+967', 'AS'], 'YT' => ['MYT', '175', '+262', 'AF'],
        'ZA' => ['ZAF', '710', '+27',  'AF'], 'ZM' => ['ZMB', '894', '+260', 'AF'],
        'ZW' => ['ZWE', '716', '+263', 'AF'],
    ];

    /**
     * ISO 3166-1 alpha-2 code (alias for `$this->value`).
     */
    public function alpha2(): string
    {
        return $this->value;
    }

    /**
     * ISO 3166-1 alpha-3 code.
     */
    public function alpha3(): string
    {
        return self::METADATA[$this->value][0];
    }

    /**
     * ISO 3166-1 numeric code, zero-padded to three digits.
     */
    public function numeric(): string
    {
        return self::METADATA[$this->value][1];
    }

    /**
     * Primary international dial code (e.g. '+49'). Empty for uninhabited territories.
     */
    public function dialCode(): string
    {
        return self::METADATA[$this->value][2];
    }

    /**
     * The continent this country primarily belongs to. Some transcontinental countries
     * are classified by their geopolitical centre; `null` is not returned.
     */
    public function continent(): Continent
    {
        return Continent::from(self::METADATA[$this->value][3]);
    }

    /**
     * Flag emoji derived from the alpha-2 code using regional indicator symbols.
     */
    public function flag(): string
    {
        $code = $this->value;

        return mb_chr(0x1F1E6 + ord($code[0]) - ord('A'))
             . mb_chr(0x1F1E6 + ord($code[1]) - ord('A'));
    }
}
