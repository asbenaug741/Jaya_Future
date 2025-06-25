<nav>
    <section class="container d-flex justify-content-between align-items-center py-3">
        <h4><a href="{{ route('admin.dashboard') }}" class="text-decoration-none font-righteous">Jayafuture</a></h4>
        <div class="d-flex align-items-center gap-3">
            <div class="pe-3 border-end"><i class="bi bi-question-circle"></i></div>

            @guest
            <a href="{{ route('login') }}">
                <div class=" btn  pe-3 border-end"> Sign In</div>
            </a>
            <a href="{{ route('register') }}">
                <div class=" btn btn-dark rounded-pill"><i class="bi bi-box-arrow-in-right"></i> Sign Up</div>
            </a>
            @endguest

            @auth

            <div class="pe-3 ">Halo, {{ Auth::user()->name }}</div>
            <div class="dropdown">
                <div class="rounded-circle overflow-hidden border dropdown" data-bs-toggle="dropdown"
                    aria-expanded="false" style="width: 40px; height: 40px;">
                    @php
                    $profilePicture = Auth::user()->profile_picture
                    ? asset('storage/' . Auth::user()->profile_picture)
                    : asset('img/default.jpg'); // fallback jika belum ada foto
                    @endphp

                    <img src="{{ $profilePicture }}"
                        style="width: 100%; height: 100%; object-fit: cover;">

                </div>

                <ul class="dropdown-menu">
                    <li><a href="{{ route('profile') }}" class="dropdown-item p-2"> My Profil</a></li>
                    @if (Auth::user()->role == 'admin')
                    <li><a href="{{ route('admin.dashboard') }}" class="dropdown-item p-2"> Dashboard</a></li>
                    @elseif (Auth::user()->role == 'user')
                    <li><a href="#" class="dropdown-item p-2"> Application</a></li>
                    @endif
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item p-2">Sign Out</button>
                        </form>
                    </li>

                </ul>
            </div>

            @endauth

        </div>
    </section>
    <section class="nav d-flex justify-content-center py-3 border">
        <a href="{{ route('admin.dashboard') }}" class="text-dark px-4">Dashboard</a>
        <a href="{{ route('admin.tag.index') }}" class="text-dark px-4">Tag</a>
        <a href="{{ route('admin.internship.index') }}" class="text-dark px-4">Intership</a>
        <a href="{{ route('admin.job.index') }}" class="text-dark px-4">Job</a>
        <a href="{{ route('admin.training.index') }}" class="text-dark px-4">Training</a>
        <a href="{{ route('admin.applicant') }}" class="text-dark px-4">Applicant</a>
        <a href="{{ route('admin.messages.index') }}" class="text-dark px-4">Messages</a>
    </section>
</nav>