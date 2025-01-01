<?php

namespace App\Livewire\Student;

use App\Models\User;
use Livewire\Component;

class SearchStudent extends Component
{
    public $search = '';

    public function render()
    {
        // Get all users with the 'student' role and filter based on search query
        $users = User::role('student')
        ->where('name', 'like', '%' . $this->search . '%')
        ->get();

    return view('livewire.student.search-student', compact('users'));
    }
}
