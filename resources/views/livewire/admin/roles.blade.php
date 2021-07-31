<div>
    <div
        class="flex-wrap pt-3 pb-2 mb-3 d-flex justify-content-between flex-md-nowrap align-items-center border-bottom">
        <h1 class="h2">Roles</h1>
        <div class="mb-2 btn-toolbar mb-md-0">
            <button type="button" class="btn btn-lg btn-outline-success" id="btnShow" data-bs-toggle="modal"
                data-bs-target="#addRole">
                Add Role
            </button>
            <!--Add Role Modal -->
            <div wire:ignore.self class="modal fade" id="addRole" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form wire:submit.prevent='addRole'>
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
                                <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" wire:model='title'
                                        class="form-control form-control-lg @error('title') is-invalid @enderror"
                                        id="title" placeholder="Role title">
                                    @error('title')
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
                    <th scope="col">Title</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $role->title }}</td>
                        <td>
                            <div x-data="{open : false}" @click.away="open = false" @close.stop="open = false"
                                @role-deleted.window="open = false">
                                <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                                    data-bs-target="#editRole{{ $role->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-edit-2">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                </button>

                                <button type="button" class="btn btn-sm btn-outline-danger" @click="open = ! open"
                                    {{-- data-bs-toggle="modal"
                                data-bs-target="#deleteRole{{ $role->id }}" --}}>
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
                                <div x-cloak x-show="open" wire:key='{{ $role->id }}' class="mod" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" @click="open = false"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3 text-center">
                                                    <img src="{{ asset('delete.svg') }}">
                                                    <h3>Are you sure you want to delete {{ $role->title }} ?</h3>
                                                    <button type="button" @click="open = false"
                                                        class="btn btn-lg btn-primary">No</button>
                                                    <button wire:click='delete({{ $role->id }})' type="button"
                                                        class="btn btn-lg btn-danger">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Edit Role Modal -->
                                <div wire:ignore.self class="modal fade" id="editRole{{ $role->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    @livewire('admin.edit-role', ['role' =>
                                    $role], key($role->id))
                                </div>
                                {{-- end of edit role --}}
                        </td>
                    </tr>
                @empty
                    There are no roles available
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@push('script')
    <script>
        window.livewire.on('roleDeleted', (id) => {
            // $('#deleteRole' + postId).modal('hide');
            const container = document.getElementById("deleteRole" + id);
            const modal = new bootstrap.Modal(container);
            // var myModal = new bootstrap.Modal(document.getElementById("deleteRole" + postId));
            modal.hide();
        })

        // var myModal = new bootstrap.Modal(document.getElementById("deleteRole" + postId));
        // myModal.show();

        // document.getElementById('addRole').addEventListener("click", function() {
        //     // return confirm("Confirm");
        //     console.log(1);
        // });

        // const container = document.getElementById("addRole");
        // const modal = new bootstrap.Modal(container);
        // function greet() {
        //     modal.show();
        // }
        // document.getElementById("btnShow").addEventListener("click", function() {
        //     modal.show();
        // });
        // document.getElementById("btnSave").addEventListener("click", function() {
        //     modal.hide();
        // });
    </script>
@endpush
