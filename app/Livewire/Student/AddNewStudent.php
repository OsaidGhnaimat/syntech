<?php

namespace App\Livewire\Student;

use App\Models\User;
use Livewire\Component;

class AddNewStudent extends Component
{
    public $name;
    public $email;
    public $password;
    public $address;
    public $phone_number;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'address' => 'required|string|max:255',
        'phone_number' => 'required|string|max:15',
    ];

    public function submit()
    {
        $validatedData = $this->validate();

        // Save the student to the database
        $data = (object) [
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'password' => $this->password,
        ];

        // Call the static insertUser method and pass the data object
        $user = User::insertUser($data);
        $user->assignRole('student');
        $this->reset();
        session()->flash('successAddUser', 'User added successfully!');

        return redirect()->route('students.index'); // Change this to the desired route
    }

    public function render()
    {
        return view('livewire.student.add-new-student');
    }

    public function closeModal()
    {
        $this->reset(['name', 'email', 'password', 'address', 'phone_number']);
        $this->resetErrorBag();
    }
}

