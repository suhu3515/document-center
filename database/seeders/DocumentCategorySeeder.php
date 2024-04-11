<?php

namespace Database\Seeders;

use App\Models\DocumentCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DocumentCategory::create([
            'category_name' => 'Resume',
            'accepted_types' => 'pdf, doc, docx'
        ]);
        DocumentCategory::create([
            'category_name' => 'Agreement',
            'accepted_types' => 'pdf, doc, docx'
        ]);
        DocumentCategory::create([
            'category_name' => 'Photo',
            'accepted_types' => 'jpg, jpeg, png'
        ]);
    }
}
