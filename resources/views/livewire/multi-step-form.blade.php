<div class="container mt-5 form-multi-step">


    <form wire:submit.prevent="submitForm" enctype="multipart/form-data">
        @csrf


        {{-- multi step - 1 --}}

        @if ($currentStep == 1)
        <div class="progress rounded-pill mb-4" style="height: 5px;">
            <div class="progress-bar-fill rounded-pill" style="width:33%;"></div>
        </div>

        <h2 class="fw-bold mb-4 pe-4">Create Your Account</h2>
        <p style="color: #aaa; width:50%;">Join us to explore job opportunities, internships, and training programs
            tailored just for you.</p>

        <div class="row mb-4">
            <div class="col-md-6">
                <label class="email" id="email">Email<span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" placeholder="Your Email"
                    wire:model="email">

                <span class="text-danger">
                    @error('email')
                    {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="col-md-6">
                <label class="password">Password<span class="text-danger">*</span></label>
                <input type="password" class="form-control" placeholder="Your Password" wire:model="password">

                <span class="text-danger">
                    @error('password')
                    {{ $message }}
                    @enderror
                </span>
            </div>
        </div>
        @endif

        {{-- multi step - 2 --}}

        @if ($currentStep == 2)
        <div class="progress rounded-pill mb-4" style="height: 5px;">
            <div class="progress-bar-fill rounded-pill" style="width:66%;"></div>
        </div>

        <h2 class="fw-bold mb-4">"Give Us Your Primary Information"</h2>
        <p style="color: #aaa; width:50%;">We use this to know location you and what yours interest</p>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="name" id="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Write Your Name"
                    wire:model="name">

                <span class="text-danger">
                    @error('name')
                    {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="col-md-6">
                <label class="birth_date" id="birth_date">Birth Date</label>
                <input type="date" name="birth_date" class="form-control" wire:model="birth_date">

                <span class="text-danger">
                    @error('birth_date')
                    {{ $message }}
                    @enderror
                </span>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="location" id="location">location</label>
                <input type="text" class="form-control" name="location" id="location" rows="6"
                    placeholder="Write location you.." wire:model="location"></input>

                <span class="text-danger">
                    @error('location')
                    {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="col-md-6">
                <label class="profile_picture" id="profile_picture">Photo Profile</label>
                @if ($currentStep == 2)
                <div wire:key="step-2">
                    <input type="file" wire:model="profile_picture" class="form-control" />
                </div>
                @endif
            </div>


            <div class="col-md-6">
                <label class="phone_number">Phone Number</label>
                <input type="text" class="form-control" placeholder="Your Number" wire:model="phone_number">

                <span class="text-danger">
                    @error('phone_number')
                    {{ $message }}
                    @enderror
                </span>
            </div>
        </div>
        @endif

        {{-- multi step - 3 --}}

        @if ($currentStep == 3)
        <div class="progress rounded-pill mb-4" style="height: 5px;">
            <div class="progress-bar-fill rounded-pill" style="width:100%;"></div>
        </div>

        <h2 class="fw-bold mb-4 pe-4">We will make sure your preferences Up to date
            What is Your Location?</h2>

        <p style="color: #aaa;">We use this to match you nearby offers.</p>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="job_title" id="job_title">Job</label>
                <input type="text" name="job_title" class="form-control" wire:model="job_title">

                <span class="text-danger">
                    @error('job_title')
                    {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="col-md-6">
                <label class="university" id="university">University</label>
                <input type="text" name="university" class="form-control" wire:model="university">

                <span class="text-danger">
                    @error('university')
                    {{ $message }}
                    @enderror
                </span>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="employment_status" id="employment_status">Employment Status</label>
                <select wire:model="employment_status" name="employment_status" id="employment_status">
                    <option value="employed">Employed</option>
                    <option value="not_employed">Not Employed</option>
                </select>

                <span class="text-danger">
                    @error('employment_status')
                    {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="col-md-6">
                <label class="resume" id="resume">Resume</label>
                <input type="file" class="form-control" wire:model="resume">

                <span class="text-danger">
                    @error('resume')
                    {{ $message }}
                    @enderror
                </span>
            </div>
        </div>
        @endif

        <div class="d-flex justify-content-between mt-4">

            @if ($currentStep == 1)
            <div></div>
            @endif

            @if ($currentStep == 2 || $currentStep == 3)
            <button type="button" class="btn btn-primary" wire:click='previousStep()'>Back</button>
            @endif

            @if ($currentStep == 1 || $currentStep == 2)
            <button type="button" class="btn btn-primary" wire:click='nextStep()'>Next</button>
            @endif

            @if ($currentStep == 3)
            <button type="submit" class="btn btn-primary">submit</button>
            @endif
        </div>
    </form>
</div>