@extends('layout.main')

@section('container')
<main>

    {{-- search bar --}}
    <section class="container">
        <h3 class="text-center my-5 font-righteous">Start Your Jaya Future Carrier</h3>
        <div class="search">
            <form action="{{ route('jobs') }}" method="GET" id="search-form">
                <div class="search-box">
                    <div class="input-box">
                        <input type="text" name="keyword" placeholder="Junior / Intern Position">
                    </div>
                    <div class="divider"></div>
                    <button type="submit" class="search-icon bg-transparent border-0">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <p class="text-center">Employers?<a href="#">Post your job here</a></p>
        <div class="job-category d-flex flex-wrap justify-content-center gap-3 my-5">
            <div class="p-2 border rounded">Easy Apply</div>
            <div class="p-2 border rounded">Part Time</div>
            <div class="p-2 border rounded">Customer Service</div>
            <div class="p-2 border rounded">Data Analyst</div>
        </div>
    </section>

    {{-- job Offers --}}
    <section class="border-top my-5">
        <h3 class="text-center my-5 font-righteous">Exclusive Offers</h3>
        <div class="job container d-flex flex-wrap justify-content-center gap-3 mb-5">
            @foreach ($latestJobs as $job)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <img src="{{ $job->company_logo ? asset('storage/' . $job->company_logo) : asset('img/logo-default.png') }}" alt="logo"
                        class="rounded-circle mb-3" style="width: 50px; height: 50px;">
                    <h5 class="card-title">{{ $job->title }}</h5>
                    <p class="card-text">{{ $job->location }} <strong>({{ $job->job_type }})</strong></p>
                    <div class="d-flex">
                        <a href="#" class="text-decoration-none border rounded-pill p-1 me-1">Easy Apply</a>
                        <a href="#" class="text-decoration-none border rounded-pill p-1 me-1">Multiple Candidate</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>


    <section class="hero my-5 p-5">
        <h3 class="text-center my-5 text-light font-righteous">Have You Graduated Or Changed Your Career?</h3>
        <div class="container d-flex justify-content-center gap-5 text-center">
            <div>
                <i class="bi bi-people border border-white rounded-circle p-3 px-4"></i>
                <p class="mt-4">Enter jobior compion</p>
            </div>
            <div>
                <i class="bi bi-journal-text border border-white rounded-circle p-3 px-4"></i>
                <p class="mt-4">Get resume assessment</p>
            </div>
            <div>
                <i class="bi bi-person-check border border-white rounded-circle p-3 px-4"></i>
                <p class="mt-4">Search suitable recruiter</p>
            </div>
            <div>
                <i class="bi bi-currency-dollar border border-white rounded-circle p-3 px-4"></i>
                <p class="mt-4">Search salaries by major</p>
            </div>
        </div>
    </section>

    <section>
        <h3 class="text-center font-righteous">Top Internship Opportunities</h3>
        <div class="container d-flex flex-wrap justify-content-center gap-3 my-5">
            @foreach ($topInternships as $intern)
            <div class="card p-4" style="width: 18rem;">
                <img src="{{ $intern->company_logo ? asset('storage/' . $intern->company_logo) : asset('img/logo-default.png') }}"
                    class="mx-auto border rounded-circle" alt="company" style="width: 5rem; height: 5rem">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-4">{{ $intern->company_name }}</h5>
                    <p class="card-text">{{ $intern->title }}</p>
                    <p class="card-text">{{ $intern->location }} - {{ $intern->job_type }}</p>
                    <p class="card-text text-muted">{{ \Carbon\Carbon::parse($intern->date_posted)->diffForHumans() }}</p>
                </div>
                <div class="mt-2">
                    <a href="{{ route('jobs.show', $intern->id) }}" class="card-link border rounded-pill py-2 px-3">View</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <hr class="my-5">

    <section>
        <h3 class="text-center font-righteous">Top Training Programs</h3>
        <div class="container d-flex flex-wrap justify-content-center gap-3 my-5">
            @foreach ($topTrainings as $train)
            <div class="card p-4" style="width: 18rem;">
                <img src="{{ $train->company_logo ? asset('storage/' . $train->company_logo) : asset('img/logo-default.png') }}"
                    class="mx-auto border rounded-circle" alt="company" style="width: 5rem; height: 5rem">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-4">{{ $train->company_name }}</h5>
                    <p class="card-text">{{ $train->title }}</p>
                    <p class="card-text">{{ $train->location }} - {{ $train->job_type }}</p>
                    <p class="card-text text-muted">{{ \Carbon\Carbon::parse($train->date_posted)->diffForHumans() }}</p>
                </div>
                <div class="mt-2">
                    <a href="{{ route('jobs.show', $train->id) }}" class="card-link border rounded-pill py-2 px-3">View</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>



    <section class="get-app">
        <div class="container">
            <h3 class="text-white">Get The App</h3>
            <p>Experience the power of Jobior anywhere with our quick apply feature.</p>
            <div class="app d-flex gap-3 my-5">
                <div class="d-flex gap-3 border border-white border-2 rounded-pill py-2 px-4">
                    <i class="bi bi-apple"></i>
                    <div>
                        <p>Download On</p>
                        <h5>App Store</h5>
                    </div>
                </div>
                <div class="d-flex gap-3 border border-white border-2 rounded-pill py-2 px-4">
                    <i class="bi bi-google-play"></i>
                    <div>
                        <p>Get It On</p>
                        <h5>Google Play</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@include('components.footer')
@endsection