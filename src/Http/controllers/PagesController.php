<?php
namespace Dries\Http\Controllers;

use Dries\Content\Content;

class PagesController extends BaseController
{
    /**
     * Display the specified resource.
     *
     * @param  \Dries\Content\Content $item
     * @return \Illuminate\View\View
     */
    public function show(Content $item)
    {
        $this->title = $item->title;

        return $this->view('page', compact('item'));
    }
}
