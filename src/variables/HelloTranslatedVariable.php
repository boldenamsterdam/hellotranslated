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

namespace bolden\hellotranslated\variables;

use Craft;
use bolden\hellotranslated\HelloTranslated;

/**
 * HelloTranslated Variable
 */
class HelloTranslatedVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Returns the translated word give the browser language
     *
     * @return string
     */
    public function detectBrowser()
    {
        $languages = explode(';', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        $languageCodeBrowser = explode(',', $languages[0]);

        $languageCode = explode('-', $languageCodeBrowser[0])[0];
        $translations = HelloTranslated::getInstance()->helloTranslatedService->getByLanguageCode($languageCode);
        while (empty($translations) && isset($languageCodeBrowser[$index + 1])) {
            $index++;
            $languageCode = explode('-', $languageCodeBrowser[$index]);
            $translations = HelloTranslated::getInstance()->helloTranslatedService->getByLanguageCode($languageCode[0]);
        }
        // fallback english
        if (empty($translations)) {
            $translations = HelloTranslated::getInstance()->helloTranslatedService->getByLanguageCode('en');
        }
        return $translations;
    }

    /**
     * Returns the translated word given the country code
     *
     * @param string $countryCode
     * @return string
     */
    public function getByCountryCode($countryCode)
    {
        $translations = HelloTranslated::getInstance()->helloTranslatedService->getByCountryCode($countryCode);
        return $translations;
    }

    /**
     * Returns the translated word given the locale
     *
     * @param string $locale
     * @return string
     */
    public function getByLocale($locale)
    {
        $translations = HelloTranslated::getInstance()->helloTranslatedService->getByLocale($locale);
        return $translations;
    }

    /**
     * Returns the translated word given the language code
     *
     * @param string $languageCode
     * @return string
     */
    public function getByLanguageCode($languageCode)
    {
        $translations = HelloTranslated::getInstance()->helloTranslatedService->getByLanguageCode($languageCode);
        return $translations;
    }

    /**
     * Returns the translated word given the language name
     *
     * @param string $languageName
     * @return string
     */
    public function getByLanguageName($languageName)
    {
        $translations = HelloTranslated::getInstance()->helloTranslatedService->getByLanguageName($languageName);
        return $translations;
    }

}
