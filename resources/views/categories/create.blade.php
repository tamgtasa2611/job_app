<x-layout>
    <!--Main layout-->
    <main class="my-5">
        <div class="container">
            <!--Section: Content-->
            <section class="text-center text-md-start">
                <div class="d-flex mb-5 align-items-center">
                    <h4 class="m-0"><strong>Add category</strong></h4>
                </div>
                <div class="col-12 col-md-4">
                    <form action="{{route('categories.store')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="mb-4">
                            <label for="name" class="form-label">Name<span class="text-danger"> *</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" required>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <a class="btn btn-tertiary rounded-9 me-3" href="{{route('categories')}}">Back</a>
                        <button class="btn btn-primary rounded-9">ADD</button>
                    </form>
                </div>
                <!-- Post -->
                <div class="row">

                </div>

            </section>
            <!--Section: Content-->
        </div>
    </main>
    <!--Main layout-->
</x-layout>
