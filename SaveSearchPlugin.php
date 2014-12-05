<?php
namespace Craft;

/**
 * Save Search @v1.1
 *
 * A plugin that allows your last search to be saved
 * and populated in the search box's in Craft. This is
 * useful when navigating away from a listings page and
 * wanting to retain your search when you return.
 *
 * @author      Peter Tell - http://page-8.com
 * @package     Save Search
 * @copyright   2014 Page 8
 * @license     [MIT]
 *
*/

class SaveSearchPlugin extends BasePlugin
{

    /**
     * Fire's on the bootstrap
     */
    public function init()
    {
        parent::init();
        if (craft()->request->isCpRequest() && !craft()->request->isAjaxRequest())
        {
            // Grab the specific area of the site we're in and store the search against this value.
            // This way we can have different searches across different sections
            $segment = craft()->request->getSegment(1);
            craft()->templates->includeJs('var area = "' . $segment . '";');
            craft()->templates->includeJsResource('savesearch/js/save-search.js');
        }
    }

    /**
     * Returns the plugins name
     *
     * @return mixed|string
     */
    public function getName()
    {
         return Craft::t('Save Search');
    }

    /**
     * Returns the plugin’s version.
     *
     * @return string
     */
    public function getVersion()
    {
        return '1.1';
    }

    /**
     * Returns the plugin developer's name.
     *
     * @return string
     */
    public function getDeveloper()
    {
        return 'Page 8';
    }

    /**
     * Returns the plugin developer's URL.
     *
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://page-8.com';
    }

}
