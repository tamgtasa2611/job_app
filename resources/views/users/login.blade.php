<x-layout>
    <div class="bg-image shadow-2-strong vh-100">
        <div class="h-100 d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-md-8">
                            <form class="bg-white rounded shadow-5-strong p-5"
                            method="post" action="{{route('loginProcess')}}">
                                @csrf
                                @method('POST')
                                <div class="col-12 text-center">
                                    <h1 class="fw-bold text-primary">Login</h1>
                                </div>
                                <!-- Email input -->
                                <div class="form-outline mt-4" data-mdb-input-init>
                                    <input required type="email" id="email" name="email" value="{{old('email')}}" class="form-control" />
                                    <label class="form-label" for="email">Email address</label>
                                </div>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <!-- Password input -->
                                <div class="form-outline mt-4 input-group" data-mdb-input-init id="show_hide_password">
                                    <input required type="password" id="password" name="password" class="form-control" minlength="6" />
                                    <a href="#!" class="input-group-text">
                                        <i class="fas fa-eye-slash" aria-hidden="true"></i>
                                    </a>
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block rounded-9 mt-4" data-mdb-ripple-init>Sign in</button>
                               <div class="col-12 text-center">
                                   <a href="{{route('register')}}" class="mt-4 btn btn-tertiary">Register</a>
                               </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->
    @if(session('fail'))
        <script>
            alert({{session('fail')}});
        </script>
    @endif
    @if(session('success'))
        <script>
            alert({{session('success')}});
        </script>
    @endif
</x-layout>
