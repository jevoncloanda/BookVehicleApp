<?php

namespace App\Http\Controllers;

use App\Exports\InvoicesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Driver;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function getCreateInvoice($id)
    {
        $vehicle = Vehicle::find($id);
        $drivers = Driver::all();
        $approvers = User::where('role', 'LIKE', 'Approver')->get();
        return view('invoice.create', ['vehicle' => $vehicle, 'drivers' => $drivers, 'approvers' => $approvers]);
    }

    public function createInvoice($id, Request $request)
    {
        $driver = Driver::where('name', 'LIKE', $request->driver_name)->first();
        $driver_id = $driver->id;
        $approver = User::where('name', 'LIKE', $request->approver_name)->first();
        $approver_id = $approver->id;

        Invoice::create([
            'vehicle_id' => $id,
            'driver_id' => $driver_id,
            'user_id' => $approver_id,
            'status' => 'Pending'
        ]);
        return redirect(route('getPendingInvoices'));
    }

    public function getInvoices()
    {
        $invoices = Invoice::all();
        return view('invoice.view-all', ['invoices' => $invoices]);
    }

    public function getPendingInvoices()
    {
        $invoices = Invoice::where('status', 'LIKE', 'Pending')->get();
        return view('invoice.view-pending', ['invoices' => $invoices]);
    }

    public function getInvoicesPerApprover()
    {
        $invoices = Invoice::where('user_id', 'LIKE', Auth::user()->id)->get();
        return view('invoice.view', ['invoices' => $invoices]);
    }


    public function approveInvoice($id)
    {
        $invoice = Invoice::find($id);
        $invoice->update([
            'status' => 'Approved'
        ]);

        return redirect()->back();
    }

    public function denyInvoice($id)
    {
        $invoice = Invoice::find($id);
        $invoice->update([
            'status' => 'Denied'
        ]);

        return redirect()->back();
    }

    public function getAwaitingApproval()
    {
        $invoices = Invoice::where('user_id', 'LIKE', Auth::user()->id)->where('status', 'LIKE', 'Pending')->get();
        return view('invoice.await', ['invoices' => $invoices]);
    }

    public function exportInvoice()
    {
        return Excel::download(new InvoicesExport, 'invoices.xlsx');
    }

    // public function getStudentById($id)
    // {
    //     $student = Student::find($id);
    //     return view('update', ['student' => $student]);
    // }

    // public function updateStudent(StudentRequest $request, $id)
    // {
    //     $student = Student::find($id);
    //     $student->update([
    //         'name' => $request->name,
    //         'NIM' => $request->NIM,
    //         'birth' => $request->birth,
    //         'age' => $request->age,
    //         'class' => $request->class,
    //     ]);
    //     return redirect(route('getStudents'));
    // }

    // public function deleteStudent($id)
    // {
    //     Student::destroy($id);
    //     return redirect(route('getStudents'));
    // }

    // public function getHomePage()
    // {
    //     return view('welcome2');
    // }

    // public function searchStudents()
    // {
    //     $search_text = $_GET['query'];
    //     $students = Student::where('name', 'LIKE', '%' . $search_text . '%')->orWhere('NIM', 'LIKE', '%' . $search_text . '%')->get();

    //     return view('search', ['studentz' => $students]);
    // }
}
