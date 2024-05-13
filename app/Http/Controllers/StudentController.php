<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function list()
    {
        //

        $studentdata= new Student();

        $studentdatas=$studentdata->paginate(5);
 //dd($data);
         // Pass the fetched data to the view
    return view('students.list', compact('studentdatas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request);
         // Validate the incoming request data
         $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'roll_no' => 'required|numeric',
            'marks' => 'required|numeric',
            'email' => 'required|email|unique:students,email',
            'gender' => 'required|in:male,female,other',
            'subject' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        // Create a new student instance
        $student = new Student();
        $student->name = $validatedData['name'];
        $student->class = $validatedData['class'];
        $student->roll_no = $validatedData['roll_no'];
        $student->marks = $validatedData['marks'];
        $student->email = $validatedData['email'];
        $student->gender = $validatedData['gender'];
        $student->subject = $validatedData['subject'];
        $student->country = $validatedData['country'];

        // Save the student to the database
        $student->save();

        // Redirect the user back to the form with a success message
        return redirect()->route('students.list')->with('success', 'Student registered successfully!');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        //dd($id);
        $student = Student::findOrFail($id);
//dd($student);
     return view('students.editstudent', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'class' => 'required|string|max:255',
        'roll_no' => 'required|numeric',
        'marks' => 'required|numeric',
        'email' => 'required|email',
        'gender' => 'required|in:male,female,other',
        'subject' => 'required|string|max:255',
        'country' => 'required|string|max:255',
    ]);

    // Find the student by ID
    $student = Student::findOrFail($id);

    // Update the student record with the validated data
    $student->update($validatedData);

    // Redirect the user back to the student list with a success message
    return redirect()->route('students.list')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
// Output the ID to verify
//dd($id);

// Find the student by ID
$student = Student::findOrFail($id);

// Delete the student
$student->delete();
        return redirect()->route('students.list')->with('success', 'Student deleted successfully!');
    }


    public function registerform()
    {
        return view('students.register');
    }



    //search and sort function data

    public function searchsortlist(Request $request)
    {
// Start building the query
$query = Student::query();

// Search functionality
if ($request->has('search')) {
    $searchTerm = $request->input('search');
    $query->where('name', 'like', "%$searchTerm%")
          ->orWhere('class', 'like', "%$searchTerm%")
          ->orWhere('roll_no', 'like', "%$searchTerm%");
}

// Sort functionality
$sortField = $request->input('sort');
$validSortFields = ['name', 'class', 'roll_no']; // Define valid sort fields
if (in_array($sortField, $validSortFields)) {
    $sortDirection = $request->input('direction', 'asc');
    $query->orderBy($sortField, $sortDirection);
}

// Fetch paginated student records
$studentdatas  = $query->paginate(5);

// Pass the students data to the view
return view('students.list', compact('studentdatas'));
    }
}
