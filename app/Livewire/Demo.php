<?php

namespace App\Livewire;

use App\Models\Genre;
use App\Models\Record;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
class Demo extends Component
{
    use WithPagination;
    public $maxPrice = 100;
    public $perPage = 8;
    #[Layout('layouts.vinylshop-layout', [
        'title' => 'Eloquent models',
        'subtitle' => 'Eloquent models: part 2',
        'description' => 'Eloquent models: part 2',
    ])]
    public function render()
    {
//        $genres = Genre::orderBy('name')->get()->makeHidden(['created_at', 'updated_at']);
        $records = Record::orderBy('artist')
            ->orderBy('title')
            ->maxPrice($this->maxPrice)
            //            ->with('genre')
//            ->get();
            ->paginate($this->perPage);
        $genres = Genre::orderBy('name')
            ->with('records')
            -> has('records')
            ->get();

        return view('livewire.demo', compact('records', 'genres'));
    }
}
