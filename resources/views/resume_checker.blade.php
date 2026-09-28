@extends('admin.com_layout')

@section('content')

    <div class="row m-0 p-0 resume_checker">
        <h2 class="text-primary p-5">Resume Checker</h2>

        <div class="col-md-5 m-0 px-5">

            <p class="text-warning"><i>Check your Resume with your Job Description</i></p>
                <br>
                <label for="resume">Please Upload Resume</label>
                <input type="file" class="form-control" name="resume" id="resume" accept=".pdf,.doc,.docx" required>
                <br>
                <label for="job_description">
                    Add Job Description
                </label>
                <textarea name="job_description" id="job_description" class="form-control" rows="10"
                    placeholder="Paste the Job Description here..." required></textarea>
                <br>
                <button type="submit" class="btn btn-primary">
                    Check Resume
                </button>
            </form>
        </div>

        <div class="col-md-5 m-0 px-5">
            <h2 class="text-primary mt-5 mx-5">
                Result
            </h2>


        </div>

    </div>
@endsection