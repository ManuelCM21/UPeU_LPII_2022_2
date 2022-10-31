<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class TagLivewire extends Component
{
    public $isOpen = false;
    public $search;
    public $tag;
    protected $listeners = ['render', 'delete' => 'delete'];

    protected $rules = [
        'tag.name' => 'required',
        'tag.slug' => 'required',
    ];

    public function messages()
    {
        return [
            'tag.name' => 'Ingrese un nombre al tag',
            'tag.slug' => 'Falta el Slug al tag',
        ];
    }
    public function render()
    {
        $tags = Tag::where('name', 'like', '%' . $this->search . '%')->paginate();
        return view('livewire.tag-livewire', compact('tags'));
    }

    public function create()
    {
        $this->isOpen = true;
        $this->reset(['tag']);
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();
        //dd($this->tag);

        if (!isset($this->tag['id'])) {
            Tag::create($this->tag);
        } else {
            $tag = Tag::find($this->tag['id']);
            $tag->name = $this->tag['name'];
            $tag->slug = $this->tag['slug'];
            $tag->save();
        }
        $this->reset(['isOpen', 'tag']);
        $this->emitTo('CrudTag', 'render');
        $this->emit('alert', 'Registro creado satisfactoriamente');
    }

    public function edit($tag)
    {
        //dd($tag);
        $this->tag = $tag;
        $this->isOpen = true;
        $this->resetValidation();
    }

    public function delete($id)
    {
        Tag::find($id)->delete();
    }

    public function updatedTagName()
    {
        $this->tag['slug'] = Str::slug($this->tag['name']);
    }
}
