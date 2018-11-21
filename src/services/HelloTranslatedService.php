<?php

/**
 * HelloTranslated plugin for Craft CMS 3.x
 *
 * HelloTranslated Service
 *
 * @link      https://www.bolden.nl
 * @copyright Copyright (c) 2018 Bolden B.V.
 * @author Klearchos Douvantzis
 */

namespace bolden\hellotranslated\services;

use Craft;
use craft\base\Component;
use peterkahl\locale\locale;

/**
 * HelloTranslated Service
 */
class HelloTranslatedService extends Component
{
    // key value array with language code as key and language name as value
    private $languageName = [
        "aa" => "Afar",
        "ab" => "Abkhazian",
        "ae" => "Avestan",
        "af" => "Afrikaans",
        "ak" => "Akan",
        "am" => "Amharic",
        "an" => "Aragonese",
        "ar" => "Arabic",
        "as" => "Assamese",
        "av" => "Avaric",
        "ay" => "Aymara",
        "az" => "Azerbaijani",
        "ba" => "Bashkir",
        "be" => "Belarusian",
        "bg" => "Bulgarian",
        "bh" => "Bihari",
        "bi" => "Bislama",
        "bm" => "Bambara",
        "bn" => "Bengali",
        "bo" => "Tibetan",
        "br" => "Breton",
        "bs" => "Bosnian",
        "ca" => "Catalan",
        "ce" => "Chechen",
        "ch" => "Chamorro",
        "co" => "Corsican",
        "cr" => "Cree",
        "cs" => "Czech",
        "cu" => "Church Slavic",
        "cv" => "Chuvash",
        "cy" => "Welsh",
        "da" => "Danish",
        "de" => "German",
        "dv" => "Divehi",
        "dz" => "Dzongkha",
        "ee" => "Ewe",
        "el" => "Greek",
        "en" => "English",
        "eo" => "Esperanto",
        "es" => "Spanish",
        "et" => "Estonian",
        "eu" => "Basque",
        "fa" => "Persian",
        "ff" => "Fulah",
        "fi" => "Finnish",
        "fj" => "Fijian",
        "fo" => "Faroese",
        "fr" => "French",
        "fy" => "Western Frisian",
        "ga" => "Irish",
        "gd" => "Scottish Gaelic",
        "gl" => "Galician",
        "gn" => "Guarani",
        "gu" => "Gujarati",
        "gv" => "Manx",
        "ha" => "Hausa",
        "he" => "Hebrew",
        "hi" => "Hindi",
        "ho" => "Hiri Motu",
        "hr" => "Croatian",
        "ht" => "Haitian",
        "hu" => "Hungarian",
        "hy" => "Armenian",
        "hz" => "Herero",
        "ia" => "Interlingua",
        "id" => "Indonesian",
        "ie" => "Interlingue",
        "ig" => "Igbo",
        "ii" => "Sichuan Yi",
        "ik" => "Inupiaq",
        "io" => "Ido",
        "is" => "Icelandic",
        "it" => "Italian",
        "iu" => "Inuktitut",
        "ja" => "Japanese",
        "jv" => "Javanese",
        "ka" => "Georgian",
        "kg" => "Kongo",
        "ki" => "Kikuyu",
        "kj" => "Kwanyama",
        "kk" => "Kazakh",
        "kl" => "Kalaallisut",
        "km" => "Khmer",
        "kn" => "Kannada",
        "ko" => "Korean",
        "kr" => "Kanuri",
        "ks" => "Kashmiri",
        "ku" => "Kurdish",
        "kv" => "Komi",
        "kw" => "Cornish",
        "ky" => "Kirghiz",
        "la" => "Latin",
        "lb" => "Luxembourgish",
        "lg" => "Ganda",
        "li" => "Limburgish",
        "ln" => "Lingala",
        "lo" => "Lao",
        "lt" => "Lithuanian",
        "lu" => "Luba-Katanga",
        "lv" => "Latvian",
        "mg" => "Malagasy",
        "mh" => "Marshallese",
        "mi" => "Maori",
        "mk" => "Macedonian",
        "ml" => "Malayalam",
        "mn" => "Mongolian",
        "mr" => "Marathi",
        "ms" => "Malay",
        "mt" => "Maltese",
        "my" => "Burmese",
        "na" => "Nauru",
        "nb" => "Norwegian Bokmal",
        "nd" => "North Ndebele",
        "ne" => "Nepali",
        "ng" => "Ndonga",
        "nl" => "Dutch",
        "nn" => "Norwegian Nynorsk",
        "no" => "Norwegian",
        "nr" => "South Ndebele",
        "nv" => "Navajo",
        "ny" => "Chichewa",
        "oc" => "Occitan",
        "oj" => "Ojibwa",
        "om" => "Oromo",
        "or" => "Oriya",
        "os" => "Ossetian",
        "pa" => "Panjabi",
        "pi" => "Pali",
        "pl" => "Polish",
        "ps" => "Pashto",
        "pt" => "Portuguese",
        "qu" => "Quechua",
        "rm" => "Raeto-Romance",
        "rn" => "Kirundi",
        "ro" => "Romanian",
        "ru" => "Russian",
        "rw" => "Kinyarwanda",
        "sa" => "Sanskrit",
        "sc" => "Sardinian",
        "sd" => "Sindhi",
        "se" => "Northern Sami",
        "sg" => "Sango",
        "si" => "Sinhala",
        "sk" => "Slovak",
        "sl" => "Slovenian",
        "sm" => "Samoan",
        "sn" => "Shona",
        "so" => "Somali",
        "sq" => "Albanian",
        "sr" => "Serbian",
        "ss" => "Swati",
        "st" => "Southern Sotho",
        "su" => "Sundanese",
        "sv" => "Swedish",
        "sw" => "Swahili",
        "ta" => "Tamil",
        "te" => "Telugu",
        "tg" => "Tajik",
        "th" => "Thai",
        "ti" => "Tigrinya",
        "tk" => "Turkmen",
        "tl" => "Tagalog",
        "tn" => "Tswana",
        "to" => "Tonga",
        "tr" => "Turkish",
        "ts" => "Tsonga",
        "tt" => "Tatar",
        "tw" => "Twi",
        "ty" => "Tahitian",
        "ug" => "Uighur",
        "uk" => "Ukrainian",
        "ur" => "Urdu",
        "uz" => "Uzbek",
        "ve" => "Venda",
        "vi" => "Vietnamese",
        "vo" => "Volapuk",
        "wa" => "Walloon",
        "wo" => "Wolof",
        "xh" => "Xhosa",
        "yi" => "Yiddish",
        "yo" => "Yoruba",
        "za" => "Zhuang",
        "zh" => "Chinese",
        "zu" => "Zulu"
    ];

    // key value array with language name as key and translated word hello as value
    private $translation = [
        "Afrikaans" => "Hallo",
        "Albanian" => "Mirë dita",
        "Amharic" => "ታዲያስ",
        "Arabic" => "مرحبا",
        "Azerbaijani" => "Салам",
        "Bengali" => "নমস্কার",
        "Bosnian" => "Zdravo",
        "Bulgarian" => "Здравей",
        "Croatian" => "Bok",
        "Czech" => "ahoj",
        "Danish" => "Hej",
        "Dutch" => "Hallo",
        "English" => "Hello",
        "Esperanto" => "Saluton",
        "Estonian" => "Tere",
        "Persian" => "سلام",
        "Fijian" => "Bula",
        "Finnish" => "Terve",
        "French" => "Salut",
        "German" => "Hallo",
        "Greek" => "Γεια σου",
        "Hebrew" => "שלום",
        "Hindi" => "नमस्ते",
        "Hungarian" => "Szia",
        "Indonesian" => "Hai",
        "Irish" => "Dia dhuit",
        "Italian" => "Ciao",
        "Japanese" => "こんにちは",
        "Kannada" => "ನಮಸ್ಕಾರ",
        "Khmer" => "ជំរាបសួរ",
        "Korean" => "안녕",
        "Lao" => "ສະບາຍດີ",
        "Latin" => "Salve",
        "Latvian" => "Sveiki",
        "Limburgish" => "Hallau",
        "Lithuanian" => "Sveiki",
        "Macedonian" => "Добар ден",
        "Malay" => "Selamat tengahari",
        "Maltese" => "Ħelow",
        "Chinese" => "你好",
        "Maori" => "Kia ora",
        "Norwegian" => "Hei",
        "Polish" => "Cześć",
        "Portuguese" => "Oi",
        "Romanian" => "alo or salut",
        "Russian" => "Здравствуйте",
        "Scottish Gaelic" => "Haló",
        "Serbian" => "Здраво",
        "Slovak" => "Ahoj",
        "Slovenian" => "Zdravo",
        "Spanish" => "Hola",
        "Swahili" => "Hujambo",
        "Swedish" => "Hallá",
        "Tamil" => "வனக்கம்",
        "Telugu" => "నమస్కారం",
        "Thai" => "สวัสดีค่ะ",
        "Turkish" => "Merhaba",
        "Vietnamese" => "Xin chào",
        "Yiddish" => "שלום"
    ];

    /**
     * Gets translated word from country code
     *
     * @param string $countryCode
     * @return string
     */
    public function getByCountryCode($countryCode)
    {
        // get locales from country code 
        $locales = locale::country2locale($countryCode);
        $localesArr = explode(',', $locales);
        $translations = [];
        foreach ($localesArr as $locale) {
            $languageCode = \Locale::getPrimaryLanguage($locale);
            // ignore if not found
            if (!isset($this->languageName[$languageCode])) {
                continue;
            }
            // ignore if not found
            $languageName = $this->languageName[$languageCode];
            if (!isset($this->translation[$languageName])) {
                continue;
            }
            $translations[] = $this->translation[$languageName];
        }
        return array_unique($translations);
    }

    /**
     * Gets translated word from locale
     *
     * @param string $locale
     * @return string
     */
    public function getByLocale($locale)
    {
        $languageCode = \Locale::getPrimaryLanguage($locale);
        $translations = [];
        if (isset($this->languageName[$languageCode])) {
            $languageName = $this->languageName[$languageCode];
            if (isset($this->translation[$languageName])) {
                $translations[] = $this->translation[$languageName];
            }
        }
        return $translations;
    }

    /**
     * Gets translated word from language code
     *
     * @param string $languageCode
     * @return string
     */
    public function getByLanguageCode($languageCode)
    {
        // make sure alwayes lowercase
        $languageCode = strtolower($languageCode);
        $translations = [];
        if (isset($this->languageName[$languageCode])) {
            $languageName = $this->languageName[$languageCode];
            if (isset($this->translation[$languageName])) {
                $translations[] = $this->translation[$languageName];
            }
        }
        return $translations;
    }

    /**
     * Gets translated word from language name
     *
     * @param string $languageName
     * @return string
     */
    public function getByLanguageName($languageName)
    {   
        // make sure alwayes first case capital lowercase
        $languageName = ucfirst($languageName);
        $translations = [];
        if (isset($this->translation[$languageName])) {
            $translations[] = $this->translation[$languageName];
        }
        return $translations;
    }
}
