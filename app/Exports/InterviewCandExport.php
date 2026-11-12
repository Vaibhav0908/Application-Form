<?php

namespace App\Exports;

use App\Models\Candidate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InterviewCandExport implements FromCollection, WithHeadings, WithMapping
{
    protected $candidates;

    public function __construct($candidates = null)
    {
        $this->candidates = $candidates;
    }

    public function collection()
    {
        return $this->candidates ?? Candidate::all();
    }

    public function headings(): array
    {
        return [
            'Sr No.',
            'Candidate Name',
            'Email',
            'Contact No.',
        ];
    }

    public function map($candidate): array
    {
        return [
            $candidate->id,
            $candidate->full_name,
            $candidate->email,
            $candidate->contact_no,
        ];
    }
}