<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
    public function generate($enrollmentId)
    {
        $enrollment = Enrollment::with('course', 'user')->findOrFail($enrollmentId);

        // Ensure course is completed before allowing download
        if (!$enrollment->completed) {
            return redirect()->back()->with('error', 'Course not completed yet!');
        }

        // Use completed_at if you have it, otherwise fallback to now
        $certificateDate = $enrollment->completed_at
            ? $enrollment->completed_at->format('F j, Y')
            : now()->format('F j, Y');

        // Data for certificate
        $data = [
            'student' => $enrollment->user->name,
            'course' => $enrollment->course->name, 
            'date' => $certificateDate,
        ];

        // Generate PDF
        $pdf = Pdf::loadView('certificates.certificate', $data);

        return $pdf->download('certificate-' . $enrollment->user->name . '.pdf');
    }
}
