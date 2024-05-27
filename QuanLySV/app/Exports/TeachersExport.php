<?php

namespace App\Exports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class TeachersExport implements FromCollection, WithTitle, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $title;
    protected $headings;
    protected $selectedColumns = ['teacher_code', 'teacher_name', 'teacher_email', 'teacher_phone', 'teacher_address', 'teacher_date_of_birth', 'teacher_gender', 'department_name', 'teacher_title', 'teacher_avatar'];
    public function __construct()
    {
        // Khởi tạo tiêu đề và các tiêu đề cột mặc định
        $this->title = 'Danh sách giảng viên';
        $this->headings = [
            'Code',
            'Name',
            'Email',
            'Phone',
            'Address',
            'DOB',
            'Gender',
            'Department',
            'Title',
            'Avatar'
        ];
    }
    public function collection()
    {
        //return Student::all();
         return Teacher::join('tbl_department', 'tbl_department.department_id', '=', 'tbl_teacher.department_id')
         ->get($this->selectedColumns);
    }
    public function title(): string
    {
        return $this->title;
    }

    public function headings(): array
    {
        return $this->headings;
    }
}
