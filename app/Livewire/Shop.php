<?php

namespace App\Livewire;

use App\Models\Record;
use Http;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{
    use WithPagination;
    public $selectedRecord;
    public $showModal = false;
    public $perPage = 6;
    public $loading = 'Please wait...';
    public function showTracks(Record $record)
    {
        $this->selectedRecord = $record;
        $url = "https://musicbrainz.org/ws/2/release/{$record->mb_id}?inc=recordings&fmt=json";
        $response = Http::get($url)->json();
        $this->selectedRecord['tracks'] = $response['media'][0]['tracks'];
        $this->showModal = true;
    }
    #[Layout('layouts.vinylshop-layout', ['title' => 'Shop', 'description' => 'Welcome to our shop'])]
    public function render()
    {
        $records = Record::orderBy('artist')
            ->paginate($this->perPage);;
        return view('livewire.shop', compact('records'));
    }
}
