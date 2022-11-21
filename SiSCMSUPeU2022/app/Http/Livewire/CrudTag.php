<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class CrudTag extends Component
{
    public $isOpen = false;
    public $search, $tag;
    protected $listeners = ['render', 'delete' => 'delete'];

    protected $rules = [
        'tag.name' => 'required',
        'tag.slug' => 'required',
    ];

    public function render()
    {
        $tags = Tag::where('name', 'like', '%' . $this->search . '%')->paginate();
        return view('livewire.crud-tag', compact('tags'));
    }

    public function create()
    {
        $this->isOpen = true;
        $this->reset('tag');
    }

    public function store()
    {
        $this->validate();

        if (!isset($this->tag['id'])) {
            Tag::create($this->tag);
        } else {
            /*
            $tag=Tag::find($this->tag['id']);
            $tag->name=$this->tag['name'];
            $tag->slug=$this->tag['slug'];
            $tag->save();
            */
            Tag::whereId($this->tag['id'])->update($this->tag);
        }
        $this->reset(['isOpen', 'tag']);
        $this->emitTo('CrudTag', 'render');
        $this->emit('alert', 'Registro creado satisfactoriamente');
    }

    public function edit($tag)
    {
        $this->tag = array_slice($tag, 0, 3);
        $this->isOpen = true;
    }

    public function updatedTagName()
    {
        $this->tag['slug'] = Str::slug($this->tag['name']);
    }

    public function delete($id)
    {
        Tag::find($id)->delete();
    }
}
