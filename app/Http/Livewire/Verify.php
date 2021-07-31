<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class Verify extends Component
{
    protected $rules = [
        'matric_no' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }

    public $matric_no;
    public $student;
    public $error = false;

    public $to_verify = false;

    public function verify()
    {
        $this->validate();
        try
        {
            $this->student = Student::where('matric_no', $this->matric_no)->firstorFail();
            $this->to_verify = true;
            $this->error = false;
        } catch (ModelNotFoundException $e) {

            $this->to_verify = false;
            $this->error = true;

        }

    }

    public function render()
    {
        return view('livewire.verify');
    }
}
