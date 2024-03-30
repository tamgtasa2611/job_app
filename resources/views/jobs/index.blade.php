<x-layout>
    <!--Main layout-->
    <main class="my-5">
        <div class="container">
            <!--Section: Content-->
            <section class="text-center text-md-start">
                <div class="d-flex mb-5 align-items-center">
                    <h4 class="m-0"><strong>Job list</strong></h4>
                    <a href="{{route('jobs.add')}}" class="ms-3 btn btn-primary rounded-9">Add</a>
                </div>
                @if(count($jobs) != 0)
                    <!-- Post -->
                        @foreach($jobs as $job)
                            <!-- job -->
                            <div class="row ">
                                <div class="col-md-3 mb-4">
                                    <div class="bg-image ratio ratio-16x9 hover-overlay shadow-1-strong rounded" data-mdb-ripple-init data-mdb-ripple-color="light">
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

                                <div class="col-md-8 mb-4">
                                   <div class="d-flex flex-column h-100">
                                      <div class="h-75">
                                          <h5>{{$job->title}}</h5>
                                          <div>
                                              <span class="text-success fw-bold">
                                                  ${{$job->salary}}
                                              </span>/month
                                          </div>
                                          <p>{{$job->description}}</p>
                                      </div>
                                       <div class="h-25 d-flex align-items-end justify-content-end">
                                           <a href="{{route('jobs.edit', $job)}}" class="btn rounded-9 btn-primary btn-sm" data-mdb-ripple-init><i class="fa-solid fa-pen-to-square"></i></a>
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
                @endif
        </div>
    </main>
    <!--Main layout-->
</x-layout>
