@extends('admin.com_layout')

@section('content')
    <div class="container-fluid">
        <div class="row m-0 resume_checker">

            {{-- LEFT SIDE --}}
            <div class="col-md-5 px-5 py-4">

                <h2 class="text-primary mb-4">Resume Checker</h2>

                <p class="text-warning">
                    <i>Check your Resume against your Job Description</i>
                </p>

                <form action="{{ route('resume_check') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="resume" class="form-label">
                            Please Upload Resume
                        </label>

                        <input type="file" class="form-control @error('resume') is-invalid @enderror" name="resume"
                            id="resume" accept=".pdf,.doc,.docx" required>

                        @error('resume')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="job_description" class="form-label">
                            Add Job Description
                        </label>

                        <textarea name="job_description" id="job_description"
                            class="form-control @error('job_description') is-invalid @enderror" rows="12"
                            placeholder="Paste the Job Description here..." required>{{ old('job_description') }}</textarea>

                        @error('job_description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fa fa-search"></i>
                        Check Resume
                    </button>

                </form>
            </div>


            {{-- RIGHT SIDE --}}
            <div class="col-md-7 px-5 py-4">

                <h2 class="text-primary mb-4">
                    Resume Result
                </h2>

                @if(session('result'))

                    @php
                        $result = session('result');
                        $score = $result['score'];
                    @endphp

                    {{-- SCORE --}}
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1">Resume Match Score</h5>
                                    <small class="text-muted">
                                        Based on keywords found in the resume and job description
                                    </small>
                                </div>

                                <div class="text-center">
                                    <h1 class="text-primary mb-0">
                                        {{ $score }}%
                                    </h1>
                                </div>
                            </div>

                            <div class="progress mt-3" style="height: 12px;">
                                <div class="progress-bar
                                        @if($score >= 75)
                                            bg-success
                                        @elseif($score >= 50)
                                            bg-warning
                                        @else
                                            bg-danger
                                        @endif" role="progressbar" style="width: {{ $score }}%">
                                </div>
                            </div>

                        </div>
                    </div>


                    {{-- STATUS --}}
                    <div class="alert
                            @if($score >= 75)
                                alert-success
                            @elseif($score >= 50)
                                alert-warning
                            @else
                                alert-danger
                            @endif">

                        <strong>{{ $result['status'] }}</strong>

                        <br>

                        <small>
                            {{ $result['message'] }}
                        </small>

                    </div>


                    {{-- MATCHED SKILLS --}}
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-success text-white">
                            <strong>
                                Matched Skills / Keywords
                            </strong>
                        </div>

                        <div class="card-body">

                            @if(count($result['matched']) > 0)

                                @foreach($result['matched'] as $skill)
                                    <span class="badge bg-success me-1 mb-2">
                                        {{ $skill }}
                                    </span>
                                @endforeach

                            @else

                                <p class="text-muted mb-0">
                                    No matching keywords found.
                                </p>

                            @endif

                        </div>
                    </div>


                    {{-- MISSING SKILLS --}}
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-danger text-white">
                            <strong>
                                Missing Skills / Keywords
                            </strong>
                        </div>

                        <div class="card-body">

                            @if(count($result['missing']) > 0)

                                @foreach($result['missing'] as $skill)
                                    <span class="badge bg-danger me-1 mb-2">
                                        {{ $skill }}
                                    </span>
                                @endforeach

                            @else

                                <p class="text-success mb-0">
                                    No important keywords are missing.
                                </p>

                            @endif

                        </div>
                    </div>


                    {{-- RESUME TEXT --}}
                    <div class="card shadow-sm border-0">
                        <div class="card-header">
                            <strong>Extracted Resume Text</strong>
                        </div>

                        <div class="card-body">

                            <div style="
                                    max-height: 300px;
                                    overflow-y: auto;
                                    white-space: pre-wrap;
                                    font-size: 14px;
                                ">
                                {{ $result['resume_text'] }}
                            </div>

                        </div>
                    </div>

                @else

                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center py-5">

                            <i class="fa fa-file-text-o fa-3x text-muted mb-3"></i>

                            <h5 class="text-muted">
                                No Resume Checked Yet
                            </h5>

                            <p class="text-muted mb-0">
                                Upload your resume and enter the job description
                                to see the matching result.
                            </p>

                        </div>
                    </div>

                @endif

            </div>

        </div>
    </div>

@endsection