<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class CategoryLivewire extends Component
{
    public $isOpen = false;
    public $search;
    public $category;
    protected $listeners = ['render', 'delete' => 'delete'];

    protected $rules = [
        'category.name' => 'required',
        'category.slug' => 'required',
    ];

    public function messages()
    {
        return [
            'category.name' => 'Ingrese un nombre a la categoría',
            'category.slug' => 'Falta el Slug a la categoría',
        ];
    }
    public function render()
    {
        $categories = Category::where('name', 'like', '%' . $this->search . '%')->paginate();
        return view('livewire.category-livewire', compact('categories'));
    }

    public function create()
    {
        $this->isOpen = true;
        $this->reset(['category']);
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();
        //dd($this->category);

        if (!isset($this->category['id'])) {
            Category::create($this->category);
        } else {
            $category = Category::find($this->category['id']);
            $category->name = $this->category['name'];
            $category->slug = $this->category['slug'];
            $category->save();
        }
        $this->reset(['isOpen', 'category']);
        $this->emitTo('CrudCategory', 'render');
        $this->emit('alert', 'Registro creado satisfactoriamente');
    }

    public function edit($category)
    {
        //dd($category);
        $this->category = $category;
        $this->isOpen = true;
        $this->resetValidation();
    }

    public function delete($id)
    {
        Category::find($id)->delete();
    }

    public function updatedCategoryName()
    {
        $this->category['slug'] = Str::slug($this->category['name']);
    }
}
