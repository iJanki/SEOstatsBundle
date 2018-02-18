<?php

namespace Ijanki\Bundle\SEOStatsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ijanki_seo_stats');

        $rootNode
            ->children()
                ->arrayNode('moz')
                    ->children()
                        ->scalarNode('access_id')->defaultNull()->end()
                        ->scalarNode('secret_key')->defaultNull()->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}