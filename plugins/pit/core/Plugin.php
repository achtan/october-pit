<?php namespace Pit\Core;

use Backend;
use System\Classes\PluginBase;

/**
 * Core Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Core',
            'description' => 'No description provided yet...',
            'author'      => 'Pit',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        //$this->addCss('/plugins/pit/core/assets/october-fixtures.css');
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Pit\Core\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'pit.core.some_permission' => [
                'tab' => 'Core',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'core' => [
                'label'       => 'Core',
                'url'         => Backend::url('pit/core/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['pit.core.*'],
                'order'       => 500,
            ],
        ];
    }
}
