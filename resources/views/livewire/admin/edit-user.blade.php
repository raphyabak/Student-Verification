<div>
    <div class="modal-dialog">
        <form wire:submit.prevent='editUser'>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Full Name</label>
                        <input type="text" wire:model='name'
                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                            id="title">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" wire:model='email'
                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                            id="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Roles</label>
                        <select wire:model='role'
                            class="form-control form-control-lg @error('role') is-invalid @enderror">
                            <option value="">Select a Role</option>
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->title}}</option>
                            @endforeach
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" wire:model='password'
                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                            id="password">
                        @error('password')
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
