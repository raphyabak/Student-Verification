<div>
    <div class="modal-dialog">
        <form wire:submit.prevent='editStudent'>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
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
                            <option value="">Select student Department</option>
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
