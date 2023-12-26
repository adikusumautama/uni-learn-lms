@extends('layouts.backend.my')

@section('content')
    <main>
        <div class="page-content container-fluid p-4 ">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Card -->
                    <div class="card card-block p-30 bg-red-600">
                        <div class="card-watermark darker font-size-80 m-15"><i class="fa fa-chalkboard"
                                aria-hidden="true"></i>
                        </div>
                        <div class="counter counter-md counter-inverse text-left">
                            <div class="counter-number-group">
                                <span class="counter-number">{{ $query }}</span>
                                <span class="counter-number-related text-capitalize">Kelas</span>
                            </div>
                            <div class="counter-label text-capitalize">in total</div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-lg-6">
                    <!-- Card -->
                    <div class="card card-block p-30 bg-blue-600">
                        <div class="card-watermark darker font-size-80 m-15"><i class="fas fa-bullhorn"
                                aria-hidden="true"></i>
                        </div>
                        <div class="counter counter-md counter-inverse text-left">
                            <div class="counter-number-group">
                                <span class="counter-number">{{ $courses }}</span>
                                <span class="counter-number-related text-capitalize">Pembelajaran</span>
                            </div>
                            <div class="counter-label text-capitalize">in total</div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h1 class="text-dark">Dashboard Student</h1>
                </div>
            </div>
            <div class="panel-body">
                <div class="row d-flex g-3">
                    {{-- Accordion --}}
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Data Kelas
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="table-responsive-lg">
                                        <table class="table table-hover table-borderless table-danger align-middle">
                                            <thead class="table-light">
                                                <caption>
                                                    Table Data Kelas
                                                </caption>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Kata Kunci</th>
                                                </tr>
                                            </thead>
                                            @foreach ($kursus as $cour)
                                            <tbody class="table-group-divider">
                                                <tr class="table-light">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$cour->course_title}}</td>
                                                    <td>{{$cour->keywords}}</td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                            <tfoot>

                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Accordion --}}



                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Data Pembelajaran yang Diambil
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="table-responsive-lg">
                                        <table class="table table-hover table-borderless align-middle">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Kata Kunci</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                                @if (count($coursesTaken) > 0)
                                                    @foreach ($coursesTaken as $course)
                                                        <tr class="table-light">
                                                            <td>{{ $course->id }}</td>
                                                            <td>{{ $course->course_title }}</td>
                                                            <td>{{ $course->keywords }}</td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <h3>Sorry! No courses added to your account</h3>
                                                @endif
                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Accordion --}}
                </div>
            </div>
        </div>

        {{--  --}}


        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
    </main>
@endsection
