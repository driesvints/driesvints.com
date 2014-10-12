<?php
namespace Dries\Http\Controllers;

use Illuminate\Routing\Controller;
use View;

class BaseController extends Controller
{
    /**
     * The page title.
     *
     * @var string
     */
    protected $pageTitle;

    /**
     * Create a view and send along default variables.
     *
     * @param  string $view
     * @param  array $data
     * @param  array $mergeData
     * @return \Illuminate\View\View
     */
    protected function view($view, $data = [], $mergeData = [])
    {
        return View::make($view, $data, $mergeData)->with('pageTitle', $this->pageTitle);
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (! is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }
}
