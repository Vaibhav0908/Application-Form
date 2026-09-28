<?php

namespace App\Http\Controllers\ResumeChecker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser as PdfParser;
use PhpOffice\PhpWord\IOFactory;

class ResumeController extends Controller
{

    public function resume_checker()
    {
        return view('resume_checker');
    }

    
    public function resume_submission(Request $request)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:10240',
            'job_description' => 'required|string|min:20',
        ]);

        $file = $request->file('resume');

        /*
        |--------------------------------------------------------------------------
        | Extract Resume Text
        |--------------------------------------------------------------------------
        */

        $extension = strtolower($file->getClientOriginalExtension());

        if ($extension === 'pdf') {

            $parser = new PdfParser();

            $pdf = $parser->parseFile(
                $file->getRealPath()
            );

            $resumeText = $pdf->getText();

        } elseif ($extension === 'docx') {

            $phpWord = IOFactory::load(
                $file->getRealPath()
            );

            $resumeText = '';

            foreach ($phpWord->getSections() as $section) {

                foreach ($section->getElements() as $element) {

                    if (method_exists($element, 'getText')) {
                        $resumeText .= ' ' . $element->getText();
                    }
                }
            }

        } else {

            return back()
                ->withErrors([
                    'resume' => 'DOC files are not currently supported. Please upload PDF or DOCX.'
                ])
                ->withInput();
        }


        /*
        |--------------------------------------------------------------------------
        | Clean Text
        |--------------------------------------------------------------------------
        */

        $resumeTextClean = strtolower(
            preg_replace('/[^a-zA-Z0-9+#.\- ]/', ' ', $resumeText)
        );

        $jobDescription = strtolower(
            preg_replace(
                '/[^a-zA-Z0-9+#.\- ]/',
                ' ',
                $request->job_description
            )
        );


        /*
        |--------------------------------------------------------------------------
        | Important Skills / Keywords
        |--------------------------------------------------------------------------
        */

        $skills = [
            'php',
            'laravel',
            'javascript',
            'jquery',
            'react',
            'vue',
            'angular',
            'node.js',
            'nodejs',
            'mysql',
            'sql',
            'mongodb',
            'html',
            'css',
            'bootstrap',
            'tailwind',
            'git',
            'github',
            'api',
            'rest api',
            'restful',
            'python',
            'java',
            'c++',
            'docker',
            'aws',
            'azure',
            'linux',
            'wordpress',
            'wordpress',
            'figma',
            'communication',
            'leadership',
            'teamwork',
            'project management',
        ];


        /*
        |--------------------------------------------------------------------------
        | Find Skills Mentioned in Job Description
        |--------------------------------------------------------------------------
        */

        $jobSkills = [];

        foreach ($skills as $skill) {

            if (str_contains($jobDescription, strtolower($skill))) {
                $jobSkills[] = $skill;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Compare Resume With Job Description
        |--------------------------------------------------------------------------
        */

        $matched = [];
        $missing = [];

        foreach ($jobSkills as $skill) {

            if (str_contains($resumeTextClean, strtolower($skill))) {
                $matched[] = $skill;
            } else {
                $missing[] = $skill;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Calculate Score
        |--------------------------------------------------------------------------
        */

        $totalSkills = count($jobSkills);
        $matchedSkills = count($matched);

        if ($totalSkills > 0) {

            $score = round(
                ($matchedSkills / $totalSkills) * 100
            );

        } else {

            $score = 0;
        }


        /*
        |--------------------------------------------------------------------------
        | Result Message
        |--------------------------------------------------------------------------
        */

        if ($score >= 75) {

            $status = 'Strong Keyword Match';

            $message = 'The resume contains many of the skills and keywords mentioned in the job description.';

        } elseif ($score >= 50) {

            $status = 'Moderate Keyword Match';

            $message = 'The resume contains some of the important skills mentioned in the job description.';

        } else {

            $status = 'Low Keyword Match';

            $message = 'Several skills mentioned in the job description were not found in the resume.';
        }


        /*
        |--------------------------------------------------------------------------
        | Result
        |--------------------------------------------------------------------------
        */

        $result = [
            'score' => $score,
            'status' => $status,
            'message' => $message,
            'matched' => $matched,
            'missing' => $missing,
            'resume_text' => $resumeText,
        ];


        return back()->with('result', $result);
    }
}