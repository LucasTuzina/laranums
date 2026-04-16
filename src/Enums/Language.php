<?php

namespace Lucastuzina\Laranums\Enums;

use Lucastuzina\Laranums\Attributes\Label;
use Lucastuzina\Laranums\Laranum;

/**
 * ISO 639-1 language codes. Case value is the lowercase two-letter code,
 * English name is stored as #[Label], native name and RTL flag live in a
 * central lookup table.
 */
enum Language: string
{
    use Laranum;

    #[Label('Afar')] case AA = 'aa';
    #[Label('Abkhazian')] case AB = 'ab';
    #[Label('Avestan')] case AE = 'ae';
    #[Label('Afrikaans')] case AF = 'af';
    #[Label('Akan')] case AK = 'ak';
    #[Label('Amharic')] case AM = 'am';
    #[Label('Aragonese')] case AN = 'an';
    #[Label('Arabic')] case AR = 'ar';
    #[Label('Assamese')] case AS_ = 'as';
    #[Label('Avaric')] case AV = 'av';
    #[Label('Aymara')] case AY = 'ay';
    #[Label('Azerbaijani')] case AZ = 'az';
    #[Label('Bashkir')] case BA = 'ba';
    #[Label('Belarusian')] case BE = 'be';
    #[Label('Bulgarian')] case BG = 'bg';
    #[Label('Bihari')] case BH = 'bh';
    #[Label('Bislama')] case BI = 'bi';
    #[Label('Bambara')] case BM = 'bm';
    #[Label('Bengali')] case BN = 'bn';
    #[Label('Tibetan')] case BO = 'bo';
    #[Label('Breton')] case BR = 'br';
    #[Label('Bosnian')] case BS = 'bs';
    #[Label('Catalan')] case CA = 'ca';
    #[Label('Chechen')] case CE = 'ce';
    #[Label('Chamorro')] case CH = 'ch';
    #[Label('Corsican')] case CO = 'co';
    #[Label('Cree')] case CR = 'cr';
    #[Label('Czech')] case CS = 'cs';
    #[Label('Church Slavonic')] case CU = 'cu';
    #[Label('Chuvash')] case CV = 'cv';
    #[Label('Welsh')] case CY = 'cy';
    #[Label('Danish')] case DA = 'da';
    #[Label('German')] case DE = 'de';
    #[Label('Divehi')] case DV = 'dv';
    #[Label('Dzongkha')] case DZ = 'dz';
    #[Label('Ewe')] case EE = 'ee';
    #[Label('Greek')] case EL = 'el';
    #[Label('English')] case EN = 'en';
    #[Label('Esperanto')] case EO = 'eo';
    #[Label('Spanish')] case ES = 'es';
    #[Label('Estonian')] case ET = 'et';
    #[Label('Basque')] case EU = 'eu';
    #[Label('Persian')] case FA = 'fa';
    #[Label('Fulah')] case FF = 'ff';
    #[Label('Finnish')] case FI = 'fi';
    #[Label('Fijian')] case FJ = 'fj';
    #[Label('Faroese')] case FO = 'fo';
    #[Label('French')] case FR = 'fr';
    #[Label('Western Frisian')] case FY = 'fy';
    #[Label('Irish')] case GA = 'ga';
    #[Label('Scottish Gaelic')] case GD = 'gd';
    #[Label('Galician')] case GL = 'gl';
    #[Label('Guarani')] case GN = 'gn';
    #[Label('Gujarati')] case GU = 'gu';
    #[Label('Manx')] case GV = 'gv';
    #[Label('Hausa')] case HA = 'ha';
    #[Label('Hebrew')] case HE = 'he';
    #[Label('Hindi')] case HI = 'hi';
    #[Label('Hiri Motu')] case HO = 'ho';
    #[Label('Croatian')] case HR = 'hr';
    #[Label('Haitian Creole')] case HT = 'ht';
    #[Label('Hungarian')] case HU = 'hu';
    #[Label('Armenian')] case HY = 'hy';
    #[Label('Herero')] case HZ = 'hz';
    #[Label('Interlingua')] case IA = 'ia';
    #[Label('Indonesian')] case ID = 'id';
    #[Label('Interlingue')] case IE = 'ie';
    #[Label('Igbo')] case IG = 'ig';
    #[Label('Sichuan Yi')] case II = 'ii';
    #[Label('Inupiaq')] case IK = 'ik';
    #[Label('Ido')] case IO = 'io';
    #[Label('Icelandic')] case IS_ = 'is';
    #[Label('Italian')] case IT = 'it';
    #[Label('Inuktitut')] case IU = 'iu';
    #[Label('Japanese')] case JA = 'ja';
    #[Label('Javanese')] case JV = 'jv';
    #[Label('Georgian')] case KA = 'ka';
    #[Label('Kongo')] case KG = 'kg';
    #[Label('Kikuyu')] case KI = 'ki';
    #[Label('Kuanyama')] case KJ = 'kj';
    #[Label('Kazakh')] case KK = 'kk';
    #[Label('Kalaallisut')] case KL = 'kl';
    #[Label('Khmer')] case KM = 'km';
    #[Label('Kannada')] case KN = 'kn';
    #[Label('Korean')] case KO = 'ko';
    #[Label('Kanuri')] case KR = 'kr';
    #[Label('Kashmiri')] case KS = 'ks';
    #[Label('Kurdish')] case KU = 'ku';
    #[Label('Komi')] case KV = 'kv';
    #[Label('Cornish')] case KW = 'kw';
    #[Label('Kyrgyz')] case KY = 'ky';
    #[Label('Latin')] case LA = 'la';
    #[Label('Luxembourgish')] case LB = 'lb';
    #[Label('Ganda')] case LG = 'lg';
    #[Label('Limburgish')] case LI = 'li';
    #[Label('Lingala')] case LN = 'ln';
    #[Label('Lao')] case LO = 'lo';
    #[Label('Lithuanian')] case LT = 'lt';
    #[Label('Luba-Katanga')] case LU = 'lu';
    #[Label('Latvian')] case LV = 'lv';
    #[Label('Malagasy')] case MG = 'mg';
    #[Label('Marshallese')] case MH = 'mh';
    #[Label('Maori')] case MI = 'mi';
    #[Label('Macedonian')] case MK = 'mk';
    #[Label('Malayalam')] case ML = 'ml';
    #[Label('Mongolian')] case MN = 'mn';
    #[Label('Marathi')] case MR = 'mr';
    #[Label('Malay')] case MS = 'ms';
    #[Label('Maltese')] case MT = 'mt';
    #[Label('Burmese')] case MY = 'my';
    #[Label('Nauru')] case NA_ = 'na';
    #[Label('Norwegian Bokmål')] case NB = 'nb';
    #[Label('North Ndebele')] case ND = 'nd';
    #[Label('Nepali')] case NE = 'ne';
    #[Label('Ndonga')] case NG = 'ng';
    #[Label('Dutch')] case NL = 'nl';
    #[Label('Norwegian Nynorsk')] case NN = 'nn';
    #[Label('Norwegian')] case NO_ = 'no';
    #[Label('South Ndebele')] case NR = 'nr';
    #[Label('Navajo')] case NV = 'nv';
    #[Label('Nyanja')] case NY = 'ny';
    #[Label('Occitan')] case OC = 'oc';
    #[Label('Ojibwa')] case OJ = 'oj';
    #[Label('Oromo')] case OM = 'om';
    #[Label('Oriya')] case OR_ = 'or';
    #[Label('Ossetic')] case OS = 'os';
    #[Label('Punjabi')] case PA = 'pa';
    #[Label('Pali')] case PI = 'pi';
    #[Label('Polish')] case PL = 'pl';
    #[Label('Pashto')] case PS = 'ps';
    #[Label('Portuguese')] case PT = 'pt';
    #[Label('Quechua')] case QU = 'qu';
    #[Label('Romansh')] case RM = 'rm';
    #[Label('Rundi')] case RN = 'rn';
    #[Label('Romanian')] case RO = 'ro';
    #[Label('Russian')] case RU = 'ru';
    #[Label('Kinyarwanda')] case RW = 'rw';
    #[Label('Sanskrit')] case SA = 'sa';
    #[Label('Sardinian')] case SC = 'sc';
    #[Label('Sindhi')] case SD = 'sd';
    #[Label('Northern Sami')] case SE = 'se';
    #[Label('Sango')] case SG = 'sg';
    #[Label('Sinhala')] case SI = 'si';
    #[Label('Slovak')] case SK = 'sk';
    #[Label('Slovenian')] case SL = 'sl';
    #[Label('Samoan')] case SM = 'sm';
    #[Label('Shona')] case SN = 'sn';
    #[Label('Somali')] case SO = 'so';
    #[Label('Albanian')] case SQ = 'sq';
    #[Label('Serbian')] case SR = 'sr';
    #[Label('Swati')] case SS = 'ss';
    #[Label('Southern Sotho')] case ST = 'st';
    #[Label('Sundanese')] case SU = 'su';
    #[Label('Swedish')] case SV = 'sv';
    #[Label('Swahili')] case SW = 'sw';
    #[Label('Tamil')] case TA = 'ta';
    #[Label('Telugu')] case TE = 'te';
    #[Label('Tajik')] case TG = 'tg';
    #[Label('Thai')] case TH = 'th';
    #[Label('Tigrinya')] case TI = 'ti';
    #[Label('Turkmen')] case TK = 'tk';
    #[Label('Tagalog')] case TL = 'tl';
    #[Label('Tswana')] case TN = 'tn';
    #[Label('Tongan')] case TO_ = 'to';
    #[Label('Turkish')] case TR = 'tr';
    #[Label('Tsonga')] case TS = 'ts';
    #[Label('Tatar')] case TT = 'tt';
    #[Label('Twi')] case TW = 'tw';
    #[Label('Tahitian')] case TY = 'ty';
    #[Label('Uyghur')] case UG = 'ug';
    #[Label('Ukrainian')] case UK = 'uk';
    #[Label('Urdu')] case UR = 'ur';
    #[Label('Uzbek')] case UZ = 'uz';
    #[Label('Venda')] case VE = 've';
    #[Label('Vietnamese')] case VI = 'vi';
    #[Label('Volapük')] case VO = 'vo';
    #[Label('Walloon')] case WA = 'wa';
    #[Label('Wolof')] case WO = 'wo';
    #[Label('Xhosa')] case XH = 'xh';
    #[Label('Yiddish')] case YI = 'yi';
    #[Label('Yoruba')] case YO = 'yo';
    #[Label('Zhuang')] case ZA_ = 'za';
    #[Label('Chinese')] case ZH = 'zh';
    #[Label('Zulu')] case ZU = 'zu';

    /**
     * [code => [nativeName, isRtl]].
     */
    private const METADATA = [
        'aa' => ['Afaraf', false],           'ab' => ['аҧсуа бызшәа', false],
        'ae' => ['avesta', false],           'af' => ['Afrikaans', false],
        'ak' => ['Akan', false],             'am' => ['አማርኛ', false],
        'an' => ['aragonés', false],         'ar' => ['العربية', true],
        'as' => ['অসমীয়া', false],           'av' => ['авар мацӀ', false],
        'ay' => ['aymar aru', false],        'az' => ['azərbaycan dili', false],
        'ba' => ['башҡорт теле', false],     'be' => ['беларуская мова', false],
        'bg' => ['български език', false],   'bh' => ['भोजपुरी', false],
        'bi' => ['Bislama', false],          'bm' => ['bamanankan', false],
        'bn' => ['বাংলা', false],            'bo' => ['བོད་ཡིག', false],
        'br' => ['brezhoneg', false],        'bs' => ['bosanski jezik', false],
        'ca' => ['català', false],           'ce' => ['нохчийн мотт', false],
        'ch' => ['Chamoru', false],          'co' => ['corsu', false],
        'cr' => ['ᓀᐦᐃᔭᐍᐏᐣ', false],         'cs' => ['čeština', false],
        'cu' => ['ѩзыкъ словѣньскъ', false], 'cv' => ['чӑваш чӗлхи', false],
        'cy' => ['Cymraeg', false],          'da' => ['dansk', false],
        'de' => ['Deutsch', false],          'dv' => ['ދިވެހި', true],
        'dz' => ['རྫོང་ཁ', false],           'ee' => ['Eʋegbe', false],
        'el' => ['ελληνικά', false],         'en' => ['English', false],
        'eo' => ['Esperanto', false],        'es' => ['español', false],
        'et' => ['eesti', false],            'eu' => ['euskara', false],
        'fa' => ['فارسی', true],             'ff' => ['Fulfulde', false],
        'fi' => ['suomi', false],            'fj' => ['vosa Vakaviti', false],
        'fo' => ['føroyskt', false],         'fr' => ['français', false],
        'fy' => ['Frysk', false],            'ga' => ['Gaeilge', false],
        'gd' => ['Gàidhlig', false],         'gl' => ['galego', false],
        'gn' => ['Avañeẽ', false],           'gu' => ['ગુજરાતી', false],
        'gv' => ['Gaelg', false],            'ha' => ['هَوُسَ', true],
        'he' => ['עברית', true],             'hi' => ['हिन्दी', false],
        'ho' => ['Hiri Motu', false],        'hr' => ['hrvatski jezik', false],
        'ht' => ['Kreyòl ayisyen', false],   'hu' => ['magyar', false],
        'hy' => ['Հայերեն', false],          'hz' => ['Otjiherero', false],
        'ia' => ['Interlingua', false],      'id' => ['Bahasa Indonesia', false],
        'ie' => ['Interlingue', false],      'ig' => ['Asụsụ Igbo', false],
        'ii' => ['ꆈꌠ꒿ Nuosuhxop', false],  'ik' => ['Iñupiaq', false],
        'io' => ['Ido', false],              'is' => ['Íslenska', false],
        'it' => ['italiano', false],         'iu' => ['ᐃᓄᒃᑎᑐᑦ', false],
        'ja' => ['日本語', false],           'jv' => ['basa Jawa', false],
        'ka' => ['ქართული', false],          'kg' => ['Kikongo', false],
        'ki' => ['Gĩkũyũ', false],           'kj' => ['Kuanyama', false],
        'kk' => ['қазақ тілі', false],       'kl' => ['kalaallisut', false],
        'km' => ['ខ្មែរ', false],            'kn' => ['ಕನ್ನಡ', false],
        'ko' => ['한국어', false],            'kr' => ['Kanuri', false],
        'ks' => ['कॉशुर', true],             'ku' => ['Kurdî', true],
        'kv' => ['коми кыв', false],         'kw' => ['Kernewek', false],
        'ky' => ['Кыргызча', false],         'la' => ['latine', false],
        'lb' => ['Lëtzebuergesch', false],   'lg' => ['Luganda', false],
        'li' => ['Limburgs', false],         'ln' => ['Lingála', false],
        'lo' => ['ພາສາລາວ', false],          'lt' => ['lietuvių kalba', false],
        'lu' => ['Tshiluba', false],         'lv' => ['latviešu valoda', false],
        'mg' => ['fiteny malagasy', false],  'mh' => ['Kajin M̧ajeļ', false],
        'mi' => ['te reo Māori', false],     'mk' => ['македонски јазик', false],
        'ml' => ['മലയാളം', false],           'mn' => ['монгол', false],
        'mr' => ['मराठी', false],            'ms' => ['Bahasa Melayu', false],
        'mt' => ['Malti', false],            'my' => ['ဗမာစာ', false],
        'na' => ['Dorerin Naoero', false],   'nb' => ['norsk bokmål', false],
        'nd' => ['isiNdebele', false],       'ne' => ['नेपाली', false],
        'ng' => ['Owambo', false],           'nl' => ['Nederlands', false],
        'nn' => ['norsk nynorsk', false],    'no' => ['norsk', false],
        'nr' => ['isiNdebele', false],       'nv' => ['Diné bizaad', false],
        'ny' => ['chiCheŵa', false],         'oc' => ['occitan', false],
        'oj' => ['ᐊᓂᔑᓈᐯᒧᐎᓐ', false],        'om' => ['Afaan Oromoo', false],
        'or' => ['ଓଡ଼ିଆ', false],             'os' => ['ирон æвзаг', false],
        'pa' => ['ਪੰਜਾਬੀ', false],           'pi' => ['पाऴि', false],
        'pl' => ['polski', false],           'ps' => ['پښتو', true],
        'pt' => ['português', false],        'qu' => ['Runa Simi', false],
        'rm' => ['rumantsch grischun', false],'rn' => ['Ikirundi', false],
        'ro' => ['română', false],           'ru' => ['русский', false],
        'rw' => ['Ikinyarwanda', false],     'sa' => ['संस्कृतम्', false],
        'sc' => ['sardu', false],            'sd' => ['सिन्धी', true],
        'se' => ['Davvisámegiella', false],  'sg' => ['yângâ tî sängö', false],
        'si' => ['සිංහල', false],            'sk' => ['slovenčina', false],
        'sl' => ['slovenščina', false],      'sm' => ['gagana fa\'a Samoa', false],
        'sn' => ['chiShona', false],         'so' => ['Soomaaliga', false],
        'sq' => ['Shqip', false],            'sr' => ['српски језик', false],
        'ss' => ['SiSwati', false],          'st' => ['Sesotho', false],
        'su' => ['Basa Sunda', false],       'sv' => ['svenska', false],
        'sw' => ['Kiswahili', false],        'ta' => ['தமிழ்', false],
        'te' => ['తెలుగు', false],           'tg' => ['тоҷикӣ', false],
        'th' => ['ไทย', false],              'ti' => ['ትግርኛ', false],
        'tk' => ['Türkmen', false],          'tl' => ['Wikang Tagalog', false],
        'tn' => ['Setswana', false],         'to' => ['faka Tonga', false],
        'tr' => ['Türkçe', false],           'ts' => ['Xitsonga', false],
        'tt' => ['татар теле', false],       'tw' => ['Twi', false],
        'ty' => ['Reo Tahiti', false],       'ug' => ['ئۇيغۇرچە', true],
        'uk' => ['Українська', false],       'ur' => ['اردو', true],
        'uz' => ['Oʻzbek', false],           've' => ['Tshivenḓa', false],
        'vi' => ['Tiếng Việt', false],       'vo' => ['Volapük', false],
        'wa' => ['walon', false],            'wo' => ['Wollof', false],
        'xh' => ['isiXhosa', false],         'yi' => ['ייִדיש', true],
        'yo' => ['Yorùbá', false],           'za' => ['Saɯ cueŋƅ', false],
        'zh' => ['中文', false],             'zu' => ['isiZulu', false],
    ];

    /**
     * ISO 639-1 two-letter code (alias for `$this->value`).
     */
    public function code(): string
    {
        return $this->value;
    }

    /**
     * Native endonym of the language (e.g. "Deutsch" for German).
     */
    public function nativeName(): string
    {
        return self::METADATA[$this->value][0];
    }

    /**
     * Whether this language is written right-to-left.
     */
    public function isRtl(): bool
    {
        return self::METADATA[$this->value][1];
    }
}
