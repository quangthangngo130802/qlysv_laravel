<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\StudentAccount;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StudentsImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $student = Student::create([  // nếu create thât bại sẽ trả về giá trị null
            'student_code' => $row[0],
            'first_name' => $row[1],
            'last_name' => $row[2],
            'date_of_birth' => $row[3],
            'gender' => $row[4],
            'address' => $row[5],
            'email' => $row[6],
            'phone' => $row[7],
            'student_avatar' => $row[8],
            'class_id' => $row[9],
        ]);
        if ($student) {
            StudentAccount::create([
                'email' => $row[6],
                'password' => bcrypt('1'),
                'student_id' => $student->student_id
            ]);
        }
        return null;
    }

    public function startRow(): int
    {
        return 2;
        //Bắt đầu import từ hàng 2 (để bỏ qua hàng tiêu đề)
    }
}
