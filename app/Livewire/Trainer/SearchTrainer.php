<?php

namespace App\Livewire\Trainer;

use App\Models\User;
use Livewire\Component;

class SearchTrainer extends Component
{
    public $search = '';

    public function render()
    {
        // Get all users with the 'student' role and filter based on search query
        $users = User::role('trainer')
        ->where('name', 'like', '%' . $this->search . '%')
        ->get();

    return view('livewire.trainer.search-trainer', compact('users'));
    }
}
