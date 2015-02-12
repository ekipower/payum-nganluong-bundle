<?php
/**
 * This file is part of the EkiPayumNganluongBundle package.
 *
 * (c) EkiPower <http://ekipower.github.com/>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\Payum\NganluongBundle\DependencyInjection;

use Eki\Symfony\Helper\Extension\ExtensionHelper;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Finder\Finder;

class EkiPayumNganluongExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
		$loader = new YamlFileLoader($container, new FileLocator( __DIR__ . '/../Resources/config' ));
        $loader->load( 'parameters.yml' );
        $loader->load( 'services.yml' );
    }

    /**
     * Automatically imports ...
     *
     * @param ContainerBuilder $container
     */
    public function prepend( ContainerBuilder $container )
    {
		ExtensionHelper::configureBundle($this, $container, 'Payum', 'payum');
	} 
}
