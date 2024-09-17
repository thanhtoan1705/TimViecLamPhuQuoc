<?php

namespace App\View\Components\Client;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Repositories\Blog\BlogInterface;


class blog extends Component
{
    /**
     * Create a new component instance.
     */
    protected $blogRepository;

    public function __construct(BlogInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $getAllBlog = $this->blogRepository->getAllBlog();

        return view('components.client.blog', [
            'blogs' => $getAllBlog
        ]);
    }
}
