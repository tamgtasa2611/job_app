<x-layout>
    <!--Main layout-->
    <main class="my-5">
        <div class="container">
            <!--Section: Content-->
            <section class="text-center text-md-start">
                <div class="d-flex mb-5 align-items-center">
                    <h4 class="m-0"><strong>Edit job</strong></h4>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <form action="{{route('jobs.update', $job)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="mb-4">
                                <label for="title" class="form-label">Title<span class="text-danger"> *</span></label>
                                <input type="text" name="title" id="title" class="form-control" value="{{$job->title}}" required>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="salary" class="form-label">Salary<span class="text-danger"> *</span></label>
                                <input type="number" name="salary" id="salary" class="form-control" value="{{$job->salary}}" required>
                                @error('salary')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="description" class="form-label">Description<span class="text-danger"> *</span></label>
                                <input type="text" name="description" id="description" class="form-control" value="{{$job->description}}" required>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="category_id" class="form-label">Category</label>
                                <select name="category_id" id="category_id" class="form-select" {{count($categories) == 0 ? 'disabled' : ''}}>
                                    @if(count($categories) != 0)
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                {{$job->category_id == $category->id ? 'selected' : ''}}>
                                                {{$category->name}}</option>
                                        @endforeach
                                    @else
                                        <option>No data available</option>
                                    @endif
                                </select>
                                @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control" value="{{old('image')}}">
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <a class="btn btn-tertiary rounded-9 me-3" href="{{route('jobs')}}">Back</a>
                            <button class="btn btn-primary rounded-9">UPDATE</button>
                        </form>
                    </div>
                    @if($job->image)
                        <!-- img -->
                        <div class="col-12 col-md-4">
                            <label class="form-label">Current Image</label>
                            <div class="bg-image hover-overlay shadow-1-strong rounded" data-mdb-ripple-init data-mdb-ripple-color="light">
                                <img src="{{asset('storage/jobs/' . $job->image)}}" alt="job_img" class="img-fluid">
                            </div>
                        </div>

                    @endif
                </div>
            </section>
            <!--Section: Content-->
        </div>
    </main>
    <!--Main layout-->
</x-layout>
