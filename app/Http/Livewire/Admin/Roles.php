<?php

namespace App\Http\Livewire\Admin;

use App\Models\Role;
use Livewire\Component;

class Roles extends Component
{
    protected $listeners = ['roleEdit' => 'render'];

    public $title;

    protected $rules = ['title' => 'required'];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }

    public function addRole()
    {
        $this->validate();
        Role::create([
            'title' => $this->title,
        ]);

        session()->flash('success', 'Role Added Successfully 😎');
        $this->reset('title');
    }

    public function delete($id){
        Role::destroy($id);
        session()->flash('success', 'Role Deleted Successfully 😎');
        $this->dispatchBrowserEvent('role-deleted');
    }

    public function render()
    {
        $roles = Role::latest()->get();
        return view('livewire.admin.roles', compact('roles'));
    }
}
