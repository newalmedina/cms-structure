<?php

namespace Clavel\TimeTracker\Models;

use Exception;

/*
Locale (en, en_US, fr, fr_CA...)
Format (csv, flags.html, html, json, mysql.sql, php, postgresql.sql, sqlite.sql, sqlserver.sql, txt, xml, yaml)
Get all countries

Route::get('/', function()
{
    return Currency::getList('en', 'json');
});
Get one currency

Route::get('/', function()
{
    return Currency::getOne('RU', 'en');
});

*/




class Currency
{

    /**
     * Path to the directory containing countries data.
     * @var string
     */
    protected $dataDir;

    /**
     * Cached data.
     * @var array
     */
    protected $dataCache = [];

    /**
     * Constructor.
     *
     * @param string|null $dataDir  Path to the directory containing countries data
     */
    public function __construct(?string $dataDir = null)
    {
        if (!isset($dataDir)) {
            $dataDir = base_path('vendor/umpirsky/currency-list/data');
        }

        if (!is_dir($dataDir)) {
            throw new \RuntimeException(sprintf('Unable to locate the currency data directory at "%s"', $dataDir));
        }

        $this->dataDir = realpath($dataDir);
    }

    /**
     * Get the currency data directory.
     *
     * @return string
     */
    public function getDataDir(): string
    {
        return $this->dataDir;
    }

    /**
     * Returns one currency.
     *
     * @param string $currencyCode  The currency
     * @param string $locale       The locale (default: en)
     * @return string
     * @throws CurrencyNotFoundException  If the currency code doesn't match any currency.
     */
    public function getOne(string $currencyCode, string $locale = 'en'): string
    {
        $currencyCode = mb_strtoupper($currencyCode);
        $locales = $this->loadData($locale, 'php');

        if (!$this->has($currencyCode, $locale)) {
            throw new Exception($currencyCode);
        }

        return $locales[mb_strtoupper($currencyCode)];
    }

    /**
     * Returns a list of countries.
     *
     * @param string $locale  The locale (default: en)
     * @param string $format  The format (default: php)
     * @return mixed          An array (list) with currency or raw data
     */
    public function getList(string $locale = 'en', string $format = 'php')
    {
        return $this->loadData($locale, $format);
    }

    /**
     * @param string $locale  The locale
     * @param array $data     An array (list) with currency data
     * @return CurrencyList    The instance of CurrencyList to enable fluent interface
     */
    public function setList(string $locale, array $data): Currency
    {
        $this->dataCache[$locale] = $data;

        return $this;
    }

    /**
     * A lazy-loader that loads data from a PHP file if it is not stored in memory yet.
     *
     * @param string $locale  The locale
     * @param string $format  The format (default: php)
     * @return mixed          An array (list) with currency or raw data
     */
    protected function loadData(string $locale, string $format)
    {
        $locale = str_replace('-', '_', $locale);

        if (!isset($this->dataCache[$locale][$format])) {
            // Customization - "source" does not matter anymore because umpirsky refactored his library.
            $file = sprintf('%s/%s/currency.%s', $this->dataDir, $locale, $format);

            if (!is_file($file)) {
                throw new \RuntimeException(sprintf('Unable to load the currency data file "%s"', $file));
            }

            $this->dataCache[$locale][$format] = ($format === 'php') ? require $file : file_get_contents($file);
        }

        return $this->sortData($locale, $this->dataCache[$locale][$format]);
    }

    /**
     * Sorts the data array for a given locale, using the locale translations.
     * It is UTF-8 aware if the Collator class is available (requires the intl
     * extension).
     *
     * @param string $locale  The locale whose collation rules should be used.
     * @param mixed  $data    Array of strings or raw data.
     * @return mixed          If $data is an array, it will be sorted, otherwise raw data
     */
    protected function sortData(string $locale, $data)
    {
        if (is_array($data)) {
            if (class_exists('Collator')) {
                $collator = new \Collator($locale);
                $collator->asort($data);
            } else {
                asort($data);
            }
        }

        return $data;
    }

    /**
     * Indicates whether or not a given $currencyCode matches a currency.
     *
     * @param string $currencyCode  A 2-letter currency code
     * @param string $locale       The locale (default: en)
     * @return bool                <code>true</code> if a match was found, <code>false</code> otherwise
     */
    public function has(string $currencyCode, string $locale = 'en'): bool
    {
        $locales = $this->loadData($locale, 'php');

        return isset($locales[mb_strtoupper($currencyCode)]);
    }
}
