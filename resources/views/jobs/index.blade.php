<x-layout>
    <!--Main layout-->
    <main class="my-5">
        <div class="container">
            <!--Section: Content-->
            <section class="text-center text-md-start">
                <div class="d-flex mb-5 align-items-center justify-content-between flex-column flex-lg-row">
                    <div class="d-flex align-items-center mb-3 mb-lg-0">
                        <h4 class="m-0"><strong>Job list</strong></h4>
                        <a href="{{route('jobs.add')}}" class="ms-3 btn btn-primary rounded-9">Add</a>
                    </div>
                    <div class="flex-fill ms-lg-5">
                        <form method="GET" class="g-3 row justify-content-end">
                            <div class="col-12 col-lg-auto">
                                <div class="form-outline" data-mdb-input-init>
                                    <i class="fas fa-search trailing"></i>
                                    <input type="text" id="search" name="search" value="{{$search}}"
                                           class="form-control form-icon-trailing" onchange="this.form.submit()"/>
                                    <label class="form-label" for="search">Type to search</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-auto">
                                <select name="category_id" id="category_id" name="category_id"
                                        class="form-select" onchange="this.form.submit()">
                                   @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $category_id ? 'selected' : ''}}>
                                            {{$category->name}}
                                        </option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-lg-auto">
                                <select name="sort" id="sort" name="sort" class="form-select" onchange="this.form.submit()">
                                    <option value="new" {{$sort == 'new' ? 'selected' : ''}}>Newest</option>
                                    <option value="old" {{$sort == 'old' ? 'selected' : ''}}>Oldest</option>
                                    <option value="high" {{$sort == 'high' ? 'selected' : ''}}>Salary: High to low</option>
                                    <option value="low" {{$sort == 'low' ? 'selected' : ''}}>Salary: Low to High</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="jobList">
                    @if(count($jobs) != 0)
                        <!-- Post -->
                        @foreach($jobs as $job)
                            <!-- job -->
                            <div class="row ">
                                <div class="col-md-3 mb-4">
                                    <div class="bg-image hover-overlay shadow-1-strong rounded" data-mdb-ripple-init data-mdb-ripple-color="light">
                                        @if($job->image != '')
                                            <img src="{{asset('storage/jobs/' . $job->image)}}" class="img-fluid" />
                                        @else
                                            <img src="{{asset('storage/jobs/noimage.jpg')}}" class="img-fluid" />
                                        @endif
                                        <a href="#!">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-9 mb-4">
                                    <div class="d-flex flex-column h-100">
                                        <div class="h-75">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="mb-1">{{$job->title}}</h5>
                                                <div>
                                                    @php
                                                        $date = \Carbon\Carbon::create($job->date);
                                                        $timestamps = $date->format('H:i:s');
                                                        $day = $date->format('l');
                                                        $month = $date->format('M');
                                                        $day2 = $date->format('d');
                                                        $year = $date->format('Y');
                                                    @endphp
                                                    <span class="text-muted">Posted at {{$timestamps . ' ' . $day}} - {{$month}} {{$day2}}, {{$year}}</span>
                                                </div>
                                            </div>
                                            <div class="mb-1">
                                              <span class="text-success fw-bold">
                                                  ${{$job->salary}}
                                              </span>/month
                                            </div>
                                            <div class="badge badge-primary rounded-pill mb-1">
                                                {{$job->category->name}}
                                            </div>
                                            <p>{{$job->description}}</p>
                                        </div>
                                        <div class="h-25 d-flex align-items-end justify-content-end">
                                            <a href="{{route('jobs.edit', $job)}}" class="btn rounded-9 btn-primary btn-sm me-3" data-mdb-ripple-init><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{route('jobs.destroy', $job)}}" class="btn rounded-9 btn-danger btn-sm" data-mdb-ripple-init><i class="fa-solid fa-x"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                @endforeach
            </section>
            <!--Section: Content-->

            <!-- Pagination -->
            <div class="my-4">
                {{$jobs->links()}}
            </div>
            @else
                No data
                </section>
                <!--Section: Content-->
            @endif
                </div>
        </div>
    </main>
    <!--Main layout-->
</x-layout>
