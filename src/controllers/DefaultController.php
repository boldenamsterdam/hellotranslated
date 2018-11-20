<?php
/**
 * helloTranslated plugin for Craft CMS 3.x
 *
 * helloTranslated Plugin
 *
 * @link      https://www.bolden.nl
 * @copyright Copyright (c) 2018 Bolden B.V.
 * @author Klearchos Douvantzis
 */

namespace bolden\hellotranslated\controllers;

use Craft;
use craft\web\Controller;
use bolden\hellotranslated\HelloTranslated;

/**
 * helloTranslated Controller
 */
class DefaultController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var array
     */
    protected $allowAnonymous = true;

    // Public Methods
    // =========================================================================

    /**
     * Returns the translated word given the country code
     *
     * @param string $countryCode
     * @return void
     */
    public function actionCountryCode($countryCode) {
        $translations = HelloTranslated::getInstance()->helloTranslatedService->getByCountryCode($countryCode);
        if ($translations) {
            $this->asJson(['translations' => $translations]);
        } else {
            $this->asErrorJson('No translation found');
        }
    }

    /**
     * Returns the translated word given the locale
     *
     * @param string $locale
     * @return void
     */
    public function actionLocale($locale) {
        $translations = HelloTranslated::getInstance()->helloTranslatedService->getByLocale($locale);
        if ($translations) {
            $this->asJson(['translations' => $translations]);
        } else {
            $this->asErrorJson('No translation found');
        }
    }

    /**
     * Returns the translated word given the language code
     *
     * @param string $languageCode
     * @return void
     */
    public function actionLanguageCode($languageCode) {
        $translations = HelloTranslated::getInstance()->helloTranslatedService->getByLanguageCode($languageCode);
        if ($translations) {
            $this->asJson(['translations' => $translations]);
        } else {
            $this->asErrorJson('No translation found');
        }
    }

    /**
     * Returns the translated word given the language name
     *
     * @param string $countryCode
     * @return void
     */
    public function actionLanguageName($languageName) {
        $translations = HelloTranslated::getInstance()->helloTranslatedService->getByLanguageName($languageName);
        if ($translations) {
            $this->asJson(['translations' => $translations]);
        } else {
            $this->asErrorJson('No translation found');
        }
    }

}
