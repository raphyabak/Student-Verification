<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditUser extends Component
{
    public $user;
    public $name;
    public $email;
    public $password;
    Public $role;
    public $roles;

    public function mount(){
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->role = $this->user->role->pluck('id');
    }

    public function editUser(){
        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,

        ]);

        if ($this->role) {

            $this->user->role()->sync($this->role);
        }

        if ($this->password) {

            $this->user->password = Hash::make($this->password);
            $this->user->save();
            // session()->flash('success', 'Password change successfully 😃!');
            $this->reset(['password']);

        }
        $this->emit('userEdit');
        session()->flash('success', 'User Details Updated Successfully 😃');
    }

    public function render()
    {
        return view('livewire.admin.edit-user');
    }
}
