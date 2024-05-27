<?php

namespace App\Imports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TeachersImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $teachers = Teacher::create([  // nếu create thât bại sẽ trả về giá trị null
            'teacher_code'=> $row[0],
            'teacher_name'=> $row[1],
            'teacher_email'=> $row[2],
            'teacher_phone'=> $row[3],
            'teacher_address'=> $row[4],
            'teacher_date_of_birth'=> $row[5],
            'teacher_gender'=> $row[6],
            'department_id'=> $row[7],
            'teacher_title'=> $row[8],
            'teacher_avatar'=> $row[9]
        ]);

        return null;
    }

    public function startRow(): int
    {
        return 2;
        //Bắt đầu import từ hàng 2 (để bỏ qua hàng tiêu đề)
    }
}
