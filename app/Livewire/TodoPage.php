<?php

namespace App\Livewire;
use Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

class TodoPage extends Component
{
    #[Layout(('layouts.vinylshop-layout'))]
    public $search=''; //public variable is auto added in a view don't need to add it
    public $showModal=false;
    public function showItemModal()
    {
        $this->showModal=true;
    }
    public function render()
    {
        $todos=Auth::check()? Auth::user()->todos()->where('title','like', '%'.$this->search.'%')->get():collect();
        return view('livewire.todo-page',['todos'=>$todos]);
    }
}
