<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Reactive;

class ProductList extends Component
{
    #[Reactive]
    public $slug;

    // public function placeholder()
    // {
    //     return view('public.components.loading');
    // }
    public function render()
    {
        $slug = $this->slug;
        if ($slug === 'all') {
            // $products = ProductCategory::get();
            $products = Product::with('thumbnailImage')->with('category')->get();
        } else {
            $products = Product::with('thumbnailImage')->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->get();
        }
        // dd($products);
        return view('livewire.product-list', compact('products'));
    }
}
