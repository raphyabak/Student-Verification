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
        {{-- <div class="mx-auto text-center border-0 col-md-6 card" wire:loading wire:target="verify">
            <div class="card-body text-danger">
             <img src="{{asset('error.svg')}}">
            </div>
         </div> --}}
        @if ($to_verify)
            <div class="mt-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="mt-3 col-12">
                            <div class="border-0 card">
                                <div class="card-horizontal">
                                    {{-- <div class="img-square-wrapper"> --}}
                                        @if ($student->image)
                                        <img src="{{Storage::disk('s3')->url('photos/' . $student->image)}}">
                                        @else
                                        <img class="" src="{{ asset('tech.png') }}" alt="Card image cap">
                                        @endif

                                    {{-- <img class="" src="http://via.placeholder.com/300x180" alt="Card image cap"> --}}
                                    {{-- </div> --}}
                                    <div class="card-body">
                                        <h4 class="card-title">Surname: {{ $student->surname }}</h4>
                                        <h4 class="card-title">Other Names: {{ $student->other_names }}</h4>
                                        <h5 class="card-title">Status: <span class="badge bg-warning"> {{ $student->status }} </span></h5>
                                        <h5 class="card-title">Level: {{ $student->level }}</h5>
                                        <h5 class="card-title">Faculty: {{ $student->faculty }}</h5>
                                        <h5 class="card-title">Department: {{ $student->department }}</h5>
                                        <h5 class="card-title">Programme: {{ $student->programme }}</h5>
                                        <h5 class="card-title">Admission Year: {{ $student->year_admit }}</h5>

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
