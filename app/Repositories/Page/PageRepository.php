<?php

namespace App\Repositories\Page;

use App\Models\Page;

class PageRepository implements PageInterface
{
    protected $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function findBySlug($slug)
    {
        return $this->page->where('slug', $slug)
                         ->where('is_active', true)
                         ->firstOrFail();
    }

    public function getActivePage()
    {
        return $this->page->where('is_active', true)->get();
    }
}
