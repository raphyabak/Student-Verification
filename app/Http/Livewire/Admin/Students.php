<?php

namespace App\Http\Livewire\Admin;

use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Students extends Component
{
    use WithFileUploads;
    protected $listeners = ['studentEdit' => 'render'];

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
    public $sex;

    public $facprogramme = [];

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

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }

    public function updatedFaculty()
    {

        if ($this->faculty == 'Science') {
            $this->facprogramme = ['Botany',
                'Biochemistry',
                'Computer Science',
                'Geophysics',
                'Industial Chemistry',
                'Mathematics',
                'Microbiology',
                'Physics',
                'Statistics',
                'Zoology'];
        } elseif ($this->faculty == 'Agriculture') {
            $this->facprogramme = ['Agriculture Economics and Extension',
                'Animal Production & Health',
                'Crop, Soil and Pest Management',
                'Fisheries and Aquaculture',
                'Forestory, Wildlife and Environmental Management',
                'Food Science and Technology',

            ];
        } else {
            $this->facprogramme = ['Civil Engineering',
                'Electrical / Electronic Engineering',
                'Mechanical Engineering',
            ];
        }
    }

    public function addStudent()
    {
        $this->validate();
        if ($this->image) {

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

            Student::create([
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
                'sex'=> $this->sex,

            ]);
        } else {
            Student::create([
                'surname' => $this->surname,
                'other_names' => $this->other_names,
                'matric_no' => $this->matric_no,
                'status' => $this->status,
                'faculty' => $this->faculty,
                'department' => $this->department,
                'programme' => $this->programme,
                'level' => $this->level,
                'year_admit' => $this->year_admit,
                'sex'=> $this->sex,

            ]);
        }

        $this->reset(['surname', 'other_names', 'matric_no', 'status', 'faculty', 'programme', 'department', 'level', 'year_admit', 'image']);

        session()->flash('success', 'Student Added Successfully 😃');
    }

    public function delete($id)
    {
        Student::destroy($id);
        session()->flash('success', 'Student Deleted Successfully 😎');
        $this->dispatchBrowserEvent('student-deleted');
    }

    public function render()
    {
        $students = Student::latest()->get();
        return view('livewire.admin.students', compact('students'));
    }
}
