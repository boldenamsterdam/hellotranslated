<?php
/**
 * HelloTranslated plugin for Craft CMS 3.x
 *
 * HelloTranslated Plugin
 *
 * @link      https://www.bolden.nl
 * @copyright Copyright (c) 2018 Bolden B.V.
 * @author Klearchos Douvantzis
 */

namespace bolden\hellotranslated;


use Craft;
use craft\base\Plugin;
use craft\web\Response;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\services\Elements;
use craft\web\UrlManager;
use craft\helpers\FileHelper;
use craft\helpers\UrlHelper;
use craft\events\RegisterUrlRulesEvent;

use yii\base\Event;
use craft\elements\db\ElementQuery;
use craft\elements\Category;
use craft\elements\Entry;
use craft\elements\Asset;
use craft\elements\User;
use craft\elements\GlobalSet;
use craft\web\twig\variables\CraftVariable;
use bolden\hellotranslated\services\HelloTranslatedService;
use bolden\hellotranslated\variables\HelloTranslatedVariable;

/**
 * Craft plugins are very much like little applications in and of themselves. We’ve made
 * it as simple as we can, but the training wheels are off. A little prior knowledge is
 * going to be required to write a plugin.
 *
 * For the purposes of the plugin docs, we’re going to assume that you know PHP and SQL,
 * as well as some semi-advanced concepts like object-oriented programming and PHP namespaces.
 *
 * https://craftcms.com/docs/plugins/introduction
 *
 * @author    Bolden B.V.
 * @package   HelloTranslated
 * @since     0.0.1
 *
 */
class HelloTranslated extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * Static property that is an instance of this plugin class so that it can be accessed via
     * HelloTranslated::$plugin
     *
     * @var HelloTranslated
     */
    public static $plugin;
    public $schemaVersion = '1.0.0';
    public $allowAnonymous = true;
    public $hasCpSettings = true;

    // Public Methods
    // =========================================================================
    
    /**
     * Returns whether the plugin should get its own tab in the CP header.
     *
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    public function hasSettings()
    {
        return false;
    }

    /**
     * Init plugin and initiate events
     */
    public function init()
    {
        parent::init();
        $this->setComponents(
            [
                'helloTranslatedService' => HelloTranslatedService::class,
            ]
        );
        self::$plugin = $this;
        
        if ($this->isInstalled) {
            // setup url endpoints
            Event::on(UrlManager::class, UrlManager::EVENT_REGISTER_SITE_URL_RULES, function(RegisterUrlRulesEvent $event) {
                $event->rules['api/helloTranslated/countryCode/<countryCode:[a-zA-Z]{2}>'] = 'hello-translated/default/country-code';
                $event->rules['api/helloTranslated/languageCode/<languageCode:[a-zA-Z]{2}>'] = 'hello-translated/default/language-code';
                $event->rules['api/helloTranslated/languageName/<languageName:\w+>'] = 'hello-translated/default/language-name';
                $event->rules['api/helloTranslated/locale/<locale:[a-zA-Z]{2}?_?[a-zA-Z].?_?[a-zA-Z].?>'] = 'hello-translated/default/locale';
            });

            // setup twig variable
            Event::on(CraftVariable::class, CraftVariable::EVENT_INIT, function(Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('helloTranslated', HelloTranslatedVariable::class);
            });
        }
    }
    
    // Protected Methods
    // =========================================================================
    
}
            
            
