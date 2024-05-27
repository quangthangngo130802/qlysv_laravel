<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class TemplateStudent implements FromCollection, WithTitle, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $title;
    protected $headings;
    protected $selectedColumns = ['student_code', 'first_name', 'last_name', 'date_of_birth', 'gender', 'address', 'email', 'phone', 'student_avatar', 'class_id'];
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
            'Class'
        ];
    }
    public function collection()
    {
        return Student::get($this->selectedColumns);
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
