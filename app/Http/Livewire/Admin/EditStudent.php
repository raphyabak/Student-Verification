<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditStudent extends Component
{
    use WithFileUploads;

    public $student;
    public $surname;
    public $other_names;
    public $matric_no;
    public $status;
    public $faculty;
    public $department;
    public $programme;
    public $level;
    public $year_admit;
    public $image;
    public $facprogramme = ['Botany',
        'Biochemistry',
        'Computer Science',
        'Geophysics',
        'Industial Chemistry',
        'Mathematics',
        'Microbiology',
        'Physics',
        'Statistics',
        'Zoology',
        'Agriculture Economics and Extension',
        'Animal Production & Health',
        'Crop, Soil and Pest Management',
        'Fisheries and Aquaculture',
        'Forestory, Wildlife and Environmental Management',
        'Food Science and Technology',
        'Civil Engineering',
        'Electrical / Electronic Engineering',
        'Mechanical Engineering'];

    protected $rules = [
        'surname' => 'required|string|max:255',
        'other_names' => 'required|string|max:255',
        'matric_no' => 'required',
        'status' => ['required'],
        'faculty' => 'required',
        'department' => 'required',
        'programme' => 'required',
        'level' => 'required',
        'year_admit' => 'required',

    ];

    public function mount()
    {
        $this->surname = $this->student->surname;
        $this->other_names = $this->student->other_names;
        $this->matric_no = $this->student->matric_no;
        $this->status = $this->student->status;
        $this->faculty = $this->student->faculty;
        $this->department = $this->student->department;
        $this->programme = $this->student->programme;
        $this->level = $this->student->level;
        $this->year_admit = $this->student->year_admit;
    }

    public function editStudent()
    {

        $this->validate();

        if ($this->image) {

            if ($this->student->image) {
                Storage::disk('s3')->delete('photos/' . $this->student->image);
            }

            $file = $this->image;

            $imageName = time() . '.' . $file->getClientOriginalExtension();

            $img = Image::make($file);

            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->sharpen(6);

            $resource = $img->stream()->detach();

            $path = Storage::disk('s3')->put(
                'photos/' . $imageName,
                $resource
            );

            $this->student->update([
                'surname' => $this->surname,
                'other_names' => $this->other_names,
                'matric_no' => $this->matric_no,
                'status' => $this->status,
                'faculty' => $this->faculty,
                'department' => $this->department,
                'programme' => $this->programme,
                'level' => $this->level,
                'year_admit' => $this->year_admit,
                'image' => $imageName,
            ]);
        } else {
            $this->student->update([
                'surname' => $this->surname,
                'other_names' => $this->other_names,
                'matric_no' => $this->matric_no,
                'status' => $this->status,
                'faculty' => $this->faculty,
                'department' => $this->department,
                'programme' => $this->programme,
                'level' => $this->level,
                'year_admit' => $this->year_admit,
            ]);
        }

        $this->emit('studentEdit');
        session()->flash('success', 'Student Details Updated Successfully 😃');
    }

    public function render()
    {
        return view('livewire.admin.edit-student');
    }
}
