<?php

namespace App\Observers;

use App\Models\Character;
use Exception;
use Illuminate\Support\Facades\DB;

class CharacterObserver
{
    /**
     * Handle the Character "created" event.
     */
    public function created(Character $character): void
    {
        //
        try {
            DB::beginTransaction();

            $data = [
                [
                    'character_id' => $character->id,
                    'game_id' => $character->game_id,
                    'change_type' => 'height',
                    'description' => 'Created: Height',
                    'previous_value' => 0,
                    'new_value' => $character->height
                ],
                [
                    'character_id' => $character->id,
                    'game_id' => $character->game_id,
                    'change_type' => 'weight',
                    'description' => 'Created: Weight',
                    'previous_value' => 0,
                    'new_value' => $character->weight
                ],
                [
                    'character_id' => $character->id,
                    'game_id' => $character->game_id,
                    'change_type' => 'health',
                    'description' => 'Created: Health',
                    'previous_value' => 0,
                    'new_value' => $character->health
                ],
                [
                    'character_id' => $character->id,
                    'game_id' => $character->game_id,
                    'change_type' => 'level',
                    'description' => 'Created: Level',
                    'previous_value' => 0,
                    'new_value' => $character->level
                ],
                [
                    'character_id' => $character->id,
                    'game_id' => $character->game_id,
                    'change_type' => 'strength',
                    'description' => 'Created: Strength',
                    'previous_value' => 0,
                    'new_value' => $character->strength
                ],
                [
                    'character_id' => $character->id,
                    'game_id' => $character->game_id,
                    'change_type' => 'dexterity',
                    'description' => 'Created: Dexterity',
                    'previous_value' => 0,
                    'new_value' => $character->dexterity
                ],
                [
                    'character_id' => $character->id,
                    'game_id' => $character->game_id,
                    'change_type' => 'constitution',
                    'description' => 'Created: Constitution',
                    'previous_value' => 0,
                    'new_value' => $character->constitution
                ],
                [
                    'character_id' => $character->id,
                    'game_id' => $character->game_id,
                    'change_type' => 'intelligence',
                    'description' => 'Created: Intelligence',
                    'previous_value' => 0,
                    'new_value' => $character->intelligence
                ],
                [
                    'character_id' => $character->id,
                    'game_id' => $character->game_id,
                    'change_type' => 'wisdom',
                    'description' => 'Created: Wisdom',
                    'previous_value' => 0,
                    'new_value' => $character->wisdom
                ],
            ];

            DB::table('character_histories')->insert($data);
            DB::commit();
        } catch (Exception $e) {
            log_error($e);
            DB::rollback();
        }
    }

    /**
     * Handle the Character "updated" event.
     */
    public function updated(Character $character): void
    {
        //
    }

    /**
     * Handle the Character "deleted" event.
     */
    public function deleted(Character $character): void
    {
        //
    }

    /**
     * Handle the Character "restored" event.
     */
    public function restored(Character $character): void
    {
        //
    }

    /**
     * Handle the Character "force deleted" event.
     */
    public function forceDeleted(Character $character): void
    {
        //
    }
}