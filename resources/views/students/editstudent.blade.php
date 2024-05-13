@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Student Information</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('students.update', $student->id) }}">
                        @csrf
                        <style>
                            /* Internal CSS to style labels as bold */
                            label {
                                font-weight: bold;
                            }
                        </style>
                        <div class="form-group row mt-1">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $student->name }}"  autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="class" class="col-md-4 col-form-label text-md-right">Class</label>

                            <div class="col-md-6">
                                <input id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ $student->class }}" 

                                @error('class')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="roll_no" class="col-md-4 col-form-label text-md-right">Roll Number</label>

                            <div class="col-md-6">
                                <input id="roll_no" type="text" class="form-control @error('roll_no') is-invalid @enderror" name="roll_no" value="{{ $student->roll_no }}">

                                @error('roll_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="marks" class="col-md-4 col-form-label text-md-right">Marks</label>

                            <div class="col-md-6">
                                <input id="marks" type="text" class="form-control @error('marks') is-invalid @enderror" name="marks" value="{{ $student->marks }}">

                                @error('marks')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="subject" class="col-md-4 col-form-label text-md-right">Subject</label>
                            
                            <div class="col-md-6">
                            <select id="subject" class="form-control @error('subject') is-invalid @enderror"  name="subject" required>
                                    <option value="">Select subject</option>
                                    <option value="Maths" {{ $student->subject == 'Maths' ? 'selected' : '' }}>Maths</option>
                                    <option value="English" {{ $student->subject == 'English' ? 'selected' : '' }}>English</option>
                                    <option value="Science" {{ $student->subject == 'Science' ? 'selected' : '' }}>Science</option>
                                    <option value="Physics" {{ $student->subject == 'Physics' ? 'selected' : '' }}>Physics</option>
                                    <option value="Chemistry" {{ $student->subject == 'Chemistry' ? 'selected' : '' }}>Chemistry</option>
                                    <option value="Biology" {{ $student->subject == 'Biology' ? 'selected' : '' }}>Biology</option>
                                    <option value="IT" {{ $student->subject == 'IT' ? 'selected' : '' }}>IT</option>
                                </select>
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row mt-4">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $student->email }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ $student->gender == 'male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ $student->gender == 'female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="other" value="other" {{ $student->gender == 'other' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="other">
                                        Other
                                    </label>
                                </div>

                                @error('gender')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                      
                        <div class="form-group row mt-4">
                            <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>

                            <div class="col-md-6">
                            <select id="country" class="form-control @error('country') is-invalid @enderror" name="country" required>
                                    <option value="">Select Country</option>
                                    <option value="India" {{ $student->country == 'India' ? 'selected' : '' }}>India</option>
                                    <option value="USA" {{ $student->country == 'USA' ? 'selected' : '' }}>United States</option>
                                    <option value="Canada" {{ $student->country == 'Canada' ? 'selected' : '' }}>Canada</option>
                                    <option value="UK" {{ $student->country == 'UK' ? 'selected' : '' }}>United Kingdom</option>
                                    <option value="Germany" {{ $student->country == 'Germany' ? 'selected' : '' }}>Germany</option>
                                    <option value="France" {{ $student->country == 'France' ? 'selected' : '' }}>France</option>
                                    <option value="Australia" {{ $student->country == 'Australia' ? 'selected' : '' }}>Australia</option>
                                </select>
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    UPDATE
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
