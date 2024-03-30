<x-layout>
    <!--Main layout-->
    <main class="my-5">
        <div class="container">
            <!--Section: Content-->
            <section class="text-center text-md-start">
                <div class="d-flex mb-5 align-items-center">
                    <h4 class="m-0"><strong>Category list</strong></h4>
                    <a href="{{route('categories.add')}}" class="ms-3 btn btn-primary rounded-9">Add</a>
                </div>
                @if(count($categories) != 0)
                    <!-- Post -->
                    <div class="row row-cols-4 g-4">
                        @foreach($categories as $category)
                            <div class="col-3">
                                <div class="shadow-2-strong rounded p-4 d-flex align-items-center justify-content-between">
                                    <h5>{{$category->name}}</h5>
                                    <div>
                                        <a href="{{route('categories.edit', $category)}}" class="btn rounded-9 btn-primary btn-sm" data-mdb-ripple-init><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{route('categories.destroy', $category)}}" class="btn rounded-9 btn-danger btn-sm" data-mdb-ripple-init><i class="fa-solid fa-x"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

            </section>
            <!--Section: Content-->

            <!-- Pagination -->
            <div class="my-4">
                {{$categories->links()}}
            </div>
            @else
                No data
                @endif
        </div>
    </main>
    <!--Main layout-->
</x-layout>
