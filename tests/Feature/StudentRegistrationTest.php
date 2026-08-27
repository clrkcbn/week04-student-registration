<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class StudentRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_form_can_be_viewed(): void
    {
        $this->get(route('students.create'))->assertOk()->assertSee('Student Registration Form');
    }

    public function test_valid_student_can_be_registered(): void
    {
        Storage::fake('public');

        $response = $this->post(route('students.store'), [
            'student_id' => '2026-00001', 'first_name' => 'Juan', 'middle_name' => 'Santos',
            'last_name' => 'Dela Cruz', 'email' => 'juan@example.com', 'mobile_number' => '09123456789',
            'date_of_birth' => '2005-06-15', 'gender' => 'Male', 'program' => 'BSIT',
            'year_level' => 3, 'address' => 'Manila, Philippines',
            'profile_picture' => UploadedFile::fake()->image('juan.jpg')->size(500),
        ]);

        $student = \App\Models\Student::firstOrFail();
        $response->assertRedirect(route('students.show', $student));
        $response->assertSessionHas('success', 'Student registered successfully!');
        $this->assertDatabaseHas('students', ['student_id' => '2026-00001']);
        Storage::disk('public')->assertExists($student->profile_picture);
    }

    public function test_invalid_registration_is_rejected(): void
    {
        $this->from(route('students.create'))->post(route('students.store'), [])
            ->assertRedirect(route('students.create'))
            ->assertSessionHasErrors(['student_id', 'first_name', 'last_name', 'email', 'profile_picture']);
    }
}
