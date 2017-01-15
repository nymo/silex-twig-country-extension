<?php
/**
 * This file is part of silex-twig-country-extension
 *
 * (c) Gregor Panek <gp@gregorpanek.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace nymo\Twig\Extension;

use Symfony\Component\Locale\Locale;

/**
 * Class CountryExtension
 * @package nymo\Twig\Extension
 * @author Gregor Panek <gp@gregorpanek.de>
 */
class CountryExtension extends \Twig_Extension
{

    /**
     * @var \Silex\Application
     */
    protected $app;

    /**
     * @param \Silex\Application $app
     */
    public function __construct(\Silex\Application $app)
    {
        $this->app = $app;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'nymo_country';
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            'country' => new \Twig_Filter_Method($this, 'country')
        );
    }

    /**
     * @param $key
     * @return mixed
     */
    public function country($key)
    {
        $countries = Locale::getDisplayCountries($this->app['locale']);
        return $countries[$key];
    }

}