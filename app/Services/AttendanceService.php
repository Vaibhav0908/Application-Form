<?php

namespace App\Services;

use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceService
{
    public function recordLogin($userId, $userType, $name)
    {
        $date = today()->toDateString();

        $attendance = Attendance::firstOrCreate(
            [
                'user_id' => $userId,
                'user_type' => $userType,
                'date' => $date,
            ],
            [
                'name' => $name,
                'login_time' => now()->format('H:i:s'),
                'status' => 'Present',
            ]
        );

        return $attendance;
    }

    public function recordLogout($userId, $userType)
    {
        $officeStart = Carbon::parse('09:00:00');
        $officeEnd = Carbon::parse('18:00:00');

        $attendance = Attendance::where('user_id', $userId)
            ->where('user_type', $userType)
            ->whereDate('date', today())
            ->first();

        if ($attendance && !$attendance->logout_time) {

            $logoutTime = now()->format('H:i:s');

            $attendance->logout_time = $logoutTime;

            // Calculate attendance status
            if (empty($attendance->login_time) && empty($logoutTime)) {
                $attendance->status = 'Absent';
            } elseif ($attendance->login_time > '09:30:00' || $logoutTime < '17:50:00') {
                $attendance->status = 'Half Day';
            } elseif ($attendance->status == 'Present' || $attendance->status == 'Half Day') {
                $attendance->overtime = 0;
                if ($attendance->login_time->greaterThan('09:00:00')) {
                    $attendance->overtime = $officeStart->diffInMinutes($attendance->login_time);
                } elseif ($attendance->login_time->lessThan($officeStart)) {
                    $attendance->overtime = $attendance->login_time->diffInMinutes($officeStart);
                }
            } else {
                $attendance->status = 'Present';
            }

            $attendance->save();
        }

        return $attendance;
    }
}
