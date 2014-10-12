<?php
namespace Dries\View;

class HeaderComposer
{
    /**
     * @param \Illuminate\View\View $view
     */
    public function compose($view)
    {
        // The page title
        $pageTitle = 'Dries Vints';

        if ($view['pageTitle']) {
            $pageTitle = $view['pageTitle'] . ' | ' . $pageTitle;
        }

        $view->with('pageTitle', $pageTitle);

        // The meta description
        $metaDescription = strip_tags($view['metaDescription']);

        // Make sure meta description doesn't exceeds 160 characters.
        if (strlen($metaDescription) > 160) {
            $metaDescription = substr($metaDescription, 0, 157) . '...';
        }

        $view->with('metaDescription', $metaDescription);
    }
}
 