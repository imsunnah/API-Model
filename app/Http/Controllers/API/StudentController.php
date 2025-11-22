<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Requests\Student\CreateStudentRequest;
use App\Http\Resources\Student\StudentResource;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class StudentController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $students = Student::useFilters()->dynamicPaginate();

        return StudentResource::collection($students);
    }

    public function store(CreateStudentRequest $request): JsonResponse
    {
        $student = Student::create($request->validated());

        return $this->responseCreated('Student created successfully', new StudentResource($student));
    }

    public function show(Student $student): JsonResponse
    {
        return $this->responseSuccess(null, new StudentResource($student));
    }

    public function update(UpdateStudentRequest $request, Student $student): JsonResponse
    {
        $student->update($request->validated());

        return $this->responseSuccess('Student updated Successfully', new StudentResource($student));
    }

    public function destroy(Student $student): JsonResponse
    {
        $student->delete();

        return $this->responseDeleted();
    }

   
}
