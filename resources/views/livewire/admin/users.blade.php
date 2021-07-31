<div>
    <div
        class="flex-wrap pt-3 pb-2 mb-3 d-flex justify-content-between flex-md-nowrap align-items-center border-bottom">
        <h1 class="h2">Users</h1>
        <div class="mb-2 btn-toolbar mb-md-0">
            <button type="button" class="btn btn-lg btn-outline-success" id="btnShow" data-bs-toggle="modal"
                data-bs-target="#addUser">
                Add User
            </button>
            <!--Add User Modal -->
            <div wire:ignore.self class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form wire:submit.prevent='addUser'>
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
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-lg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Role</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>@foreach ($user->role as $role)
                           {{ $role->title}}
                        @endforeach</td>
                        <td>
                            <div x-data="{open : false}" @click.away="open = false" @close.stop="open = false"
                                @user-deleted.window="open = false">
                                <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                                    data-bs-target="#editUser{{ $user->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-edit-2">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                </button>

                                <button type="button" class="btn btn-sm btn-outline-danger" @click="open = ! open"
                                    {{-- data-bs-toggle="modal"
                                data-bs-target="#deleteUser{{ $User->id }}" --}}>
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
                                <div x-cloak x-show="open" wire:key='{{ $user->id }}' class="mod" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" @click="open = false"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3 text-center">
                                                    <img src="{{ asset('delete.svg') }}">
                                                    <h3>Are you sure you want to delete {{ $user->name }} ?</h3>
                                                    <button type="button" @click="open = false"
                                                        class="btn btn-lg btn-primary">No</button>
                                                    <button wire:click='delete({{ $user->id }})' type="button"
                                                        class="btn btn-lg btn-danger">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Edit User Modal -->
                                <div wire:ignore.self class="modal fade" id="editUser{{ $user->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    @livewire('admin.edit-user', ['user' =>
                                    $user, 'roles' => $roles], key($user->id))
                                </div>
                                {{-- end of edit User --}}
                        </td>
                    </tr>
                @empty
                    There are no Users available
                @endforelse
            </tbody>
        </table>
    </div>
</div>
