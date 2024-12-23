<?php

namespace App\Repositories\Page;

interface PageInterface
{
    public function findBySlug($slug);
    public function getActivePage();
}
