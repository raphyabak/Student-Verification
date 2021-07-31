<?php

namespace App\Http\Livewire\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Users extends Component
{
    protected $listeners = ['userEdit' => 'render'];

    public $name;
    public $email;
    public $password;
    public $role;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'role' => 'required',
        'password' => ['required'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }

    public function addUser(){

        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email'=> $this->email,
            'password'=> Hash::make($this->password)
        ]);

        $user->role()->attach($this->role);

        $this->reset(['name','email','password','role']);

        session()->flash('success', 'User Added Successfully 😃');
    }

    public function delete($id){
        User::destroy($id);
        session()->flash('success', 'User Deleted Successfully 😎');
        $this->dispatchBrowserEvent('user-deleted');
    }

    public function render()
    {
        $users = User::latest()->get();
        $roles = Role::latest()->get();
        return view('livewire.admin.users', compact('users', 'roles'));
    }
}
