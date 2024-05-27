<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithTitle, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $title;
    protected $headings;
    protected $selectedColumns = ['student_code', 'first_name', 'last_name', 'date_of_birth', 'gender', 'address', 'email', 'phone', 'student_avatar', 'class_name', 'year_of_admission'];
    public function __construct()
    {
        // Khởi tạo tiêu đề và các tiêu đề cột mặc định
        $this->title = 'Danh sách sinh viên';
        $this->headings = [
            'Code',
            'First name',
            'Last name',
            'Date of birth',
            'Gender',
            'Address',
            'Email',
            'Phone',
            'Avatar',
            'Class',
            'Year of admission'
        ];
    }
    public function collection()
    {
        //return Student::all();
        return Student::join('tbl_class', 'tbl_class.class_id', '=', 'tbl_student.class_id')
            ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_class.course_id')
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
