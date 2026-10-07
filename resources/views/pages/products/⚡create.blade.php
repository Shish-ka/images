<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;

new class extends Component
{
    use WithFileUploads;

    public $title = '';
    public $description = '';
    public $count = '';
    public $image = '';

    public function save()
    {
        $this->validate([
            'title' => ['required'],
            'count' => ['required', 'integer', 'min:0'],
            'image' => ['required', 'image','max:1024'],
        ]);
        $path=$this->image->store('images', 'public');
        $product=Product::create([
            'title' => $this->title,
            'count' => $this->count,
            'description' => $this->description,
            'image' => $path,
        ]);
        $this->redirectRoute('products.index');
    }
};
?>

<div class="grid gap-5">
    <p class="font-bold text-xl">New product</p>
    <form wire:submit="save" class="border border-gray-400 p-2 grid gap-1">
        <div class="grid">
            <label for="">Title</label>
            <input type="text" wire:model="title" class="border border-gray-400 p-1">
            @error('title')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="grid">
            <label for="">Description</label>
            <textarea id="" cols="30" rows="10" wire:model="description" class="border border-gray-400 p-1"></textarea>
            @error('description')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="grid">
            <label for="">Count</label>
            <input type="number" wire:model.number="count" class="border border-gray-400 p-1">
            @error('count')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="grid">
            <label for="">Image</label>
            <div class="border border-gray-400 p-1">
                <input type="file" wire:model="image">
                @error('image')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" width="100">
                @endif
            </div>
        </div>

        <button type="submit" class="text-green-600 cursor-pointer">Save</button>
    </form>
</div>
