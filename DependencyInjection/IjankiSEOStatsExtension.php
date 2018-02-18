<?php

namespace Ijanki\Bundle\SEOStatsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Definition;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class IjankiSEOStatsExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $this->createServices($container, $config);
    }

    protected function createServices(ContainerBuilder $container, $config)
    {
        $definition = new Definition();
        $definition->setClass('Ijanki\SEOStats\Mozscape\MozscapeClient');
        $definition->setArguments([
            $config['moz']['access_id'],
            $config['moz']['secret_key'],
        ]);
        $definition->setPublic(true);
        $container->setDefinition('Ijanki\SEOStats\Mozscape\MozscapeClient', $definition);
    }
}