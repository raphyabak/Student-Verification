<div>
    <div class="container px-4 py-5 col-xl-10 col-xxl-8">
        <div class="py-5 row align-items-center g-lg-5">
            <div class="text-center col-lg-5 text-lg-start">
                <div class="text-center">
                    <img class="mb-4" src="{{ asset('osustech.jpg') }}" alt="" width="72" height="57">
                </div>
                <h1 class="mb-3 display-6 fw-bold lh-1">OAUSTECH E-Verify</h1>

            </div>
            <div class="mx-auto col-md-10 col-lg-7">
                <form wire:submit.prevent='verify' class="p-4 border p-md-5 rounded-3 bg-light">
                    {{-- <div class="mb-3 form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Full Name</label>
              </div> --}}
                    <div class="mb-3 form-floating">
                        <input type="text" wire:model='matric_no'
                            class="form-control @error('matric_no') is-invalid @enderror" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Matric Number</label>
                        @error('matric_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">
                         Verify
                         {{-- <img wire:loading wire:target="verify" src="https://img.icons8.com/color/48/ffffff/iphone-spinner--v2.png"/> --}}
                         <img wire:loading wire:target="verify" src="{{asset('load.gif')}}">
                        </button>
                    {{-- <hr class="my-4">
              <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small> --}}
                </form>
            </div>
        </div>
        @if ($to_verify)
            <div class="mt-5">
                <div class="page-content page-container" id="page-content">
                    <div class="mt-6">
                        <div class="container row d-flex justify-content-center">
                            <div class="col-xl-9 col-md-12">
                                <div class="card user-card-full">
                                    <div class="row m-l-0 m-r-0">
                                        <div class="col-md-4 bg-c-lite-green user-profile">
                                            <div class="text-center text-white card-block">
                                                <div class="m-b-25">
                                                    @if ($student->image)
                                                <img src="{{Storage::disk('s3')->url('photos/' . $student->image)}}">
                                                @else
                                                <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="Student-Profile-Image">
                                                @endif
                                                     </div>
                                                <h4 class="f-w-600">{{ $student->surname }}</h4>
                                                <h5>{{ $student->other_names }}</h5>
                                                <h3>{{ $student->matric_no }}</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-block">
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Student Information</h6>
                                                {{-- <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="m-b-10 f-w-600">Surname</p>
                                                        <h5 class="text-muted f-w-400">rntng@gmail.com</h5>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="m-b-10 f-w-600">Other Names</p>
                                                        <h5 class="text-muted f-w-400">98979989898</h5>
                                                    </div>
                                                </div> --}}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="m-b-10 f-w-600">Status</p>
                                                        <h5 class="text-muted f-w-400">{{ $student->status }}</h5>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="m-b-10 f-w-600">Level</p>
                                                        <h5 class="text-muted f-w-400">{{ $student->level }}</h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="m-b-10 f-w-600">Faculty</p>
                                                        <h5 class="text-muted f-w-400">{{ $student->faculty }}</h5>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="m-b-10 f-w-600">Department</p>
                                                        <h5 class="text-muted f-w-400">{{ $student->department }}</h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="m-b-10 f-w-600">Programme</p>
                                                        <h5 class="text-muted f-w-400">{{ $student->programme }}</h5>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="m-b-10 f-w-600">Admission Year</p>
                                                        <h5 class="text-muted f-w-400">{{ $student->year_admit }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($error)
            <div class="">
                <div class="mx-auto mb-3 text-center border-0 col-md-6 card">

                    <div class="card-body text-danger">
                        <img src="{{asset('error.svg')}}">
                        {{-- <h5 class="card-title">Danger card title</h5> --}}
                        <h3 class="card-title">There is no student with the provided Matric Number.</h3>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
