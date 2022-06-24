<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $categories = Category::all();
        $categoriesMatch = $categories->firstWhere('slug',request('category'));
        $currentCategory = $categoriesMatch ? $categoriesMatch : (object)[
            'name'=>request('category') ? request('category'): 'Categories',
            'id'=>-1
        ];

        return view('components.category-dropdown',[
            'categories' => $categories->sortBy('name', SORT_STRING),
            'currentCategory'=> $currentCategory,
        ]);
    }
}
