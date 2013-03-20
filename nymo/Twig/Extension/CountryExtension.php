<?php
/**
 * User: nymo
 * Date: 20.03.13
 * Time: 10:08
 */
namespace nymo\Twig\Extension;
use Symfony\Component\Locale\Locale;
class CountryExtension extends \Twig_Extension{

    /**
     * @var \Silex\Application
     */
    protected $app;

    public function __construct(\Silex\Application $app){
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
            'country' => new \Twig_Filter_Method($this,'country')
        );
    }

    /**
     * @param $key
     * @return mixed
     */
    public function country($key){
        $countries = Locale::getDisplayCountries($this->app['locale']);
        return $countries[$key];
    }

}