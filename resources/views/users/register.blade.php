<x-layout>
        <!-- Background image -->
        <div class="bg-image shadow-2-strong vh-100">
           <div class="h-100 d-flex align-items-center">
               <div class="container">
                   <div class="row justify-content-center">
                       <div class="col-xl-5 col-md-8">
                           <form class="bg-white rounded shadow-5-strong p-5"
                                 method="post" action="{{route('registerProcess')}}">
                               @csrf
                               @method('POST')
                               <div class="col-12 text-center">
                                   <h1 class="fw-bold text-primary">Sign Up</h1>
                               </div>
                               <!-- Email input -->
                               <div class="form-outline mt-4" data-mdb-input-init>
                                   <input type="email" id="email" name="email" value="{{old('email')}}" class="form-control" />
                                   <label class="form-label" for="email">Email address</label>
                               </div>
                               @error('email')
                               <div class="text-danger">{{ $message }}</div>
                               @enderror

                               <!-- Password input -->
                               <div class="form-outline mt-4" data-mdb-input-init>
                                   <input type="password" id="password" name="password" class="form-control" />
                                   <label class="form-label" for="password">Password</label>
                               </div>
                               @error('password')
                               <div class="text-danger">{{ $message }}</div>
                               @enderror

                               <!-- Submit button -->
                               <button type="submit" class="btn btn-primary btn-block rounded-9 mt-4" data-mdb-ripple-init>Register</button>
                               <div class="col-12 text-center mt-4">
                                   <a href="{{route('login')}}" class="btn btn-tertiary">Sign In</a>
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
</x-layout>
