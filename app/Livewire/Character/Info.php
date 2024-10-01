<?php

namespace App\Livewire\Character;

use App\Http\Services\CharacterService;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Info extends Component
{
    public int $id;

    #[Computed()]
    public function character()
    {
        return CharacterService::getCharacter($this->id);
    }

    #[Computed()]
    public function chart()
    {
        return [
            'type' => 'line',
            'data' => [
                'labels' => CharacterService::getLabels($this->character->id),
                'datasets' => CharacterService::getDataSets($this->character->id),
            ]
        ];
    }

    public function render()
    {
        return view('livewire.character.info');
    }
}