<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class EditRole extends Component
{

    public $role;
    public $title;

    public function mount(){
        $this->title = $this->role->title;
    }

    public function editRole(){
        $this->role->update([
            'title'=> $this->title
        ]);

        session()->flash('success', 'Role has been Updated 😎');
        $this->emit('roleEdit');
    }

    public function render()
    {
        return view('livewire.admin.edit-role');
    }
}
