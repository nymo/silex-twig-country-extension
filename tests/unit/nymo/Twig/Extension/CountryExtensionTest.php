<?php
/**
 * This file is part of silex-twig-breadcrumb-extension
 *
 * (c) Gregor Panek <gp@gregorpanek.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace nymo\Twig\Extension;

 class CountryExtensionTest extends \PHPUnit_Framework_TestCase
 {

    protected $countryExt;

    protected $app;

    public function setUp()
    {
        $this->app = new \Silex\Application();
        $this->countryExt = new CountryExtension($this->app);
    }

    public function testGetName()
    {
        $this->assertEquals('nymo_country', $this->countryExt->getName());
    }

    public function testGetFilters()
    {
        $filter = $this->countryExt->getFilters();
        $this->assertInstanceOf('\Twig_Filter_Method', $filter['country']);
    }

    public function testCountry()
    {   
        $this->app['locale'] = 'de';
        $this->assertEquals('Deutschland', $this->countryExt->country('DE'));
        $this->app['locale'] = 'en';
        $this->assertEquals('Germany', $this->countryExt->country('DE'));

    }


 } 