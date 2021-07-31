<div>
    <div
        class="flex-wrap pt-3 pb-2 mb-3 d-flex justify-content-between flex-md-nowrap align-items-center border-bottom">
        <h1 class="h2">Students</h1>
        <div class="mb-2 btn-toolbar mb-md-0">
            <button type="button" class="btn btn-lg btn-outline-success" id="btnShow" data-bs-toggle="modal"
                data-bs-target="#addStudent">
                Add Student
            </button>
            <!--Add Student Modal -->
            <div wire:ignore.self class="modal fade" id="addStudent" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form wire:submit.prevent='addStudent'>
                        <div class="modal-content">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <div class="text-center">
                                        {{ session('success') }}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Surname</label>
                                    <input type="text" wire:model='surname'
                                        class="form-control form-control-lg @error('surname') is-invalid @enderror"
                                        id="title">
                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="other" class="form-label">Other Names</label>
                                    <input type="text" wire:model='other_names'
                                        class="form-control form-control-lg @error('other_names') is-invalid @enderror"
                                        id="other">
                                    @error('other_names')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="matric" class="form-label">Matric No.</label>
                                    <input type="text" wire:model='matric_no'
                                        class="form-control form-control-lg @error('matric_no') is-invalid @enderror"
                                        id="matric">
                                    @error('matric_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select wire:model='status'
                                        class="form-control form-control-lg @error('status') is-invalid @enderror">
                                        <option value="">Select student status</option>
                                        <option value="Undergraduate">Undergraduate</option>
                                        <option value="Graduate">Graduate</option>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="faculty" class="form-label">Faculty</label>
                                    <select wire:model='faculty'
                                        class="form-control form-control-lg @error('faculty') is-invalid @enderror">
                                        <option value="">Select student faculty</option>
                                        <option value="Science">Science</option>
                                        <option value="Agriculture">Agriculture</option>
                                        <option value="Engineering">Engineering</option>
                                    @error('faculty')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="department" class="form-label">Department</label>
                                    <select type="text" wire:model='department'
                                        class="form-control form-control-lg @error('department') is-invalid @enderror"
                                        id="department">
                                        <option value="">Select student department</option>
                                        <option value="Mathematical Sciences">Mathematical Sciences</option>
                                        <option value="Biological Sciences">Biological Sciences</option>
                                        <option value="Physical Sciences">Physical Sciences</option>
                                        <option value="Chemical Sciences">Chemical Sciences</option>
                                        <option value="Food Sciences">Food Sciences</option>
                                        <option value="Agriculture Sciences">Agriculture Sciences</option>
                                        <option value="Engineering">Engineering</option>
                                    @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="programme" class="form-label">Programme</label>
                                    <select wire:model='programme'
                                        class="form-control form-control-lg @error('programme') is-invalid @enderror"
                                        id="programme">
                                        <option value="">Select student programme</option>
                                        @foreach ($facprogramme as $programme)
                                        <option value="{{$programme}}">{{$programme}}</option>
                                        @endforeach

                                    @error('programme')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="level" class="form-label">Level</label>
                                    <select wire:model='level'
                                        class="form-control form-control-lg @error('level') is-invalid @enderror">
                                        <option value="">Select student level</option>
                                        <option value="100 Level">100 Level</option>
                                        <option value="200 Level">200 Level</option>
                                        <option value="300 Level">300 Level</option>
                                        <option value="400 Level">400 Level</option>
                                        <option value="100 Level">500 Level</option>
                                    @error('level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Student Image</label>
                                    <input type="file" wire:model='image'
                                        class="form-control form-control-lg @error('image') is-invalid @enderror"
                                        id="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="year" class="form-label">Admission Year</label>
                                    <input type="text" wire:model='year_admit'
                                        class="form-control form-control-lg @error('year_admit') is-invalid @enderror"
                                        id="year">
                                    @error('year_admit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-lg btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-lg">
            <thead>
                <tr>
                    <th scope="col">Surname</th>
                    <th scope="col">Other Names</th>
                    <th scope="col">Matric No.</th>
                    <th scope="col">Status</th>
                    <th scope="col">Faculty</th>
                    <th scope="col">Department</th>
                    <th scope="col">Programme</th>
                    <th scope="col">Level</th>
                    <th scope="col">Admission Year</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $student->surname }}</td>
                        <td>{{ $student->other_names }}</td>
                        <td>{{ $student->matric_no }}</td>
                        <td>{{ $student->status }}</td>
                        <td>{{ $student->faculty }}</td>
                        <td>{{ $student->department }}</td>
                        <td>{{ $student->programme }}</td>
                        <td>{{ $student->level }}</td>
                        <td>{{ $student->year_admit }}</td>
                        <td>
                            <div x-data="{open : false}" @click.away="open = false" @close.stop="open = false"
                                @student-deleted.window="open = false">
                                <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                                    data-bs-target="#editStudent{{ $student->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-edit-2">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                </button>

                                <button type="button" class="btn btn-sm btn-outline-danger" @click="open = ! open"
                                    {{-- data-bs-toggle="modal"
                                data-bs-target="#deleteStudent{{ $Student->id }}" --}}>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-trash-2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                </button>
                                <div x-cloak x-show="open" wire:key='{{ $student->id }}' class="mod" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" @click="open = false"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3 text-center">
                                                    <img src="{{ asset('delete.svg') }}">
                                                    <h3>Are you sure you want to delete {{ $student->other_names }} ?</h3>
                                                    <button type="button" @click="open = false"
                                                        class="btn btn-lg btn-primary">No</button>
                                                    <button wire:click='delete({{ $student->id }})' type="button"
                                                        class="btn btn-lg btn-danger">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Edit Student Modal -->
                                <div wire:ignore.self class="modal fade" id="editStudent{{ $student->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    @livewire('admin.edit-student', ['student' =>
                                    $student], key($student->id))
                                </div>
                                {{-- end of edit Student --}}
                        </td>
                    </tr>
                @empty
                  <tr>  There are no Students available</tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
