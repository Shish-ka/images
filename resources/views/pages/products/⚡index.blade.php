<?php

use App\Models\Product;
use Livewire\Component;

new class extends Component
{
    public function render()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(5);
        return $this->view(compact('products'));
    }

    public function delete(Product $product)
    {
        Storage::disk('public')->delete($product->image);
        $product->delete();
    }
};
?>

<div class="grid gap-5">
    <p class="font-bold text-xl">Products</p>
    <ul class="grid gap-2">
        @foreach ($products as $product)
            <li class="border border-gray-400 p-2 flex gap-2" wire:key="$product->id">
                <img src="{{ asset('storage/'.$product->image) }}" alt="" class="w-[150px] h-[150px] object-cover">
                <div>
                    <h2 class="font-bold">{{ $product->title }}</h2>
                    <p>{{ $product->description }}</p>
                    <p>Count: {{ $product->count }}</p>
                    <button wire:click="delete({{ $product->id }})" class="text-red-600 cursor-pointer">Delete</button>
                </div>
            </li>
        @endforeach
    </ul>
    {{$products->links()}}
</div>
