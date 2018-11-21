# Hello to all languages plugin for Craft CMS 3.x

Greet your visitor with their native language 

## Requirements

This plugin requires Craft CMS 3 or later

## Overview

Use a personal greeting in your website with many options to translate from: language name, language code, country code, locale or detected from the browser of the user.


## Configuration

Just install the plugin

## Using

There are two ways to use the plugin, via __twig__ functions and __HTTP__ requests.  

### Twig functions  
- `craft.helloTranslated.detectBrowser()`  
Detects the browser language and returns the appropriate translation  
- `craft.helloTranslated.getByCountryCode('GB')`  
Given the 2 character ISO country code returns the appropriate translation  
- `craft.helloTranslated.getByLanguageCode('en')`  
Given the 2 character ISO language code returns the appropriate translation  
- `craft.helloTranslated.getByLanguageName('english')`  
Given the language name returns the appropriate translation  
- `craft.helloTranslated.getByLocale('en_US')`  
Given the locale (PHP locale) returns the appropriate translation  

### HTTP requests  
- `api/helloTranslated/countryCode/<countryCode>`  
Given the 2 character ISO country code returns the appropriate translation  
- `api/helloTranslated/languageCode/<languageCode>`  
Given the 2 character ISO language code returns the appropriate translation  
- `api/helloTranslated/languageName/<languageName>`  
Given the language name returns the appropriate translation  
- `api/helloTranslated/countryCode/<locale>`  
Given the locale (PHP locale) returns the appropriate translation  

### Example

Request  
GET `/api/helloTranslated/languageName/Dutch`  

Response
```json
{
  "translations": "Hallo"
}
```  

__Notice:__ Plugin makes use of PHP locale to determine the language. That means for a multilanguage country system it will return multiple translations.
e.g. In Switzerland the languages Italian, French and German are spoken. Therefore plugin will return all 3 possible translations (Ciao/Salut/Hallo).

Not every language is translated but feel free to suggest new ones and/or suggest update of the current ones! :)

## Credits

Made with ❤️ by [Bolden](https://www.bolden.nl) – It's free to use, but if you insist 😄 donate [here](https://www.paypal.me/boldenamsterdam)




