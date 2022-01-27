<?php

namespace App\Http\Controllers;

use App\Student;
use App\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;
Use Alert;
use App\Http\Requests\StudentRequest;
use App\Jury;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::with(['supervisor', 'jury'])->where('user_id', Auth::id())->get();
        $id = Student::where('user_id', Auth::id())->value('id');
        $date = Jury::where('student_id', $id)->value('dateDefense');
        $date = Carbon::parse($date, 'UTC');
        $date = $date->isoFormat('MMMM D YYYY h:mm:ss');
        return view('student', [ 'student' => $student,
        'date' => $date ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Student::where('user_id', Auth::id())->value('id');
        $student = Student::with('supervisor')->find($id);
            $supervisors = Supervisor::all(['id', 'name']);
            return view('student.create', [
                'supervisors' => $supervisors,
                'student' => $student,
            ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student = Student::create([
            'user_id' =>  Auth::user()->id,
            'supervisor_id' => $request->input('supervisor'),
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'CIN' => $request->input('CIN'),
            'CNE' => $request->input('CNE'),
            'birthday' => $request->input('birthday'),
            'city' => $request->input('city'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'faculty' => $request->input('faculty'),
            'specialty' => $request->input('specialty'),
            'project' => $request->input('project'),
            'summary' => $request->input('summary'),
        ]);
        Alert::success('succès', 'Votre operation a été effectuer avec succès');

        return redirect()->route('formulaire.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $supervisors = Supervisor::all(['id', 'name']);
        return view('student.edit', [
            'supervisors' => $supervisors,
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form = Student::find($id);
        $form->firstname = $request->input('firstname');
        $form->lastname = $request->input('lastname');
        $form->CIN = $request->input('CIN');
        $form->CNE = $request->input('CNE');
        $form->birthday = $request->input('birthday');
        $form->city = $request->input('city');
        $form->email = $request->input('email');
        $form->phone = $request->input('phone');
        $form->address = $request->input('address');
        $form->faculty = $request->input('faculty');
        $form->specialty = $request->input('specialty');
        $form->supervisor_id = $request->input('supervisor');
        $form->project = $request->input('project');
        $form->summary = $request->input('summary');
        $form->save();
        Alert::success('succès', 'Votre operation a été effectuer avec succès');
        return redirect()->route('formulaire.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete($id);
        Alert::success('succès', 'Votre avez supprimé le formulaire');
        return redirect()->route('formulaire.create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $student = Student::where('user_id', Auth::id())->get();
        $pdf = PDF::loadView('student.download', ['student' => $student ]);
        return $pdf->download('form.pdf');
    }
}
