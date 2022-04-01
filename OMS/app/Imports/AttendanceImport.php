<?php
  
namespace App\Imports;
  
use App\Models\Dailyattendance;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Validator;
  
class UsersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $files)
    {
         Validator::make($files->toArray(), [
             '*.userid' => 'required',
             '*.date' => 'required',
             '*.checkin' => 'required',
             '*.checkout' => 'required',
             '*.lunchtime' => 'required',
             '*.workinghour' => 'required',
             '*.halfdayleave' => 'required',
             '*.leaveday' => 'required',
             '*.workfromhome' => 'required',
             '*.ottime' => 'required',
             '*.latetime' => 'required',
         ])->validate();
  
        foreach ($files as $file) {
            DailyAttendance::create([
                'userid' => $file['userid'],
                'date' => $file['date'],
                'checkin' => $file['checkin'],
                'checkout' => $file['checkout'],
                'lunchtime' => $file['lunchtime'],
                'workinghour' => $file['workinghour'],
                'halfdayleave' => $file['halfdayleave'],
                'leaveday' => $file['leaveday'],
                'workfromhome' => $file['workfromhome'],
                'ottime' => $file['ottime'],
                'latetime' => $file['latetime']
            ]);
            
            }
        }
  
}