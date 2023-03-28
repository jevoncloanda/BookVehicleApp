<?php

namespace App\Http\Controllers;

use App\Charts\InvoiceChart;
use App\Charts\InvoicesPerApproverChart;
use App\Charts\VehicleChart;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard() {
        $user = Auth::user();
        // $user_invoices = Invoice::where('user_id', 'LIKE', $user->id)->get();
        // $user_invoices_count = Invoice::where('user_id', 'LIKE', $user->id)->count();
        // $user_invoices_count_pending
        $approvers = User::where('role', 'LIKE', 'Approver')->get();
        $invoices = Invoice::all();


        $i = 0;
        foreach($approvers as $approver)
        {
            $approver_name[$i] = $approver->name;
            $invoice_count[$i] = Invoice::where('user_id', 'LIKE', $approver->id)->count();
            $invoice_count_pending[$i] = Invoice::where('user_id', 'LIKE', $approver->id)->where('status', 'LIKE', 'Pending')->count();
            $invoice_count_approved[$i] = Invoice::where('user_id', 'LIKE', $approver->id)->where('status', 'LIKE', 'Approved')->count();
            $invoice_count_denied[$i] = Invoice::where('user_id', 'LIKE', $approver->id)->where('status', 'LIKE', 'Denied')->count();

            $i++;
        }


        $invoice_chart = new InvoiceChart;
        $invoice_chart->title('Invoices', 32, 'white');
        $invoice_chart->labels($approver_name);
        $invoice_chart->dataset('Total Invoices', 'bar', $invoice_count)->color('rgba(201, 203, 207)')->backgroundColor('rgba(201, 203, 207, 0.6)');
        $invoice_chart->dataset('Pending Invoices', 'bar', $invoice_count_pending)->color('rgba(255, 205, 86)')->backgroundColor('rgba(255, 205, 86, 0.6)');
        $invoice_chart->dataset('Approved Invoices', 'bar', $invoice_count_approved)->color('rgba(75, 192, 192)')->backgroundColor('rgba(75, 192, 192, 0.6)');
        $invoice_chart->dataset('Denied Invoices', 'bar', $invoice_count_denied)->color('rgba(255, 99, 132)')->backgroundColor('rgba(255, 99, 132, 0.6)');

        $vehicles = Vehicle::distinct()->get(['name']);
        $i = 0;
        foreach($vehicles as $vehicle)
        {
            $vehicle_name[$i] = $vehicle->name;
            $vehicle_count[$i] = Vehicle::where('name', 'LIKE', $vehicle->name)->count();
            $i++;
        }
        $vehicle_chart = new VehicleChart;
        $vehicle_chart->title('All Vehicles', 32, 'white');
        $vehicle_chart->labels($vehicle_name);
        $vehicle_chart->dataset('Available Vehicles', 'bar', $vehicle_count)->color('rgba(54, 162, 235)')->backgroundColor('rgba(54, 162, 235, 0.2)');


        // If user is admin straight return view dashboard and no need to pass user_invoice_chart parameter
        if($user->role == 'Admin')
        {
            return view('dashboard', ['user' => $user, 'invoice_chart' => $invoice_chart, 'vehicle_chart' => $vehicle_chart]);
        }

        // Get all authenticated user's invoices
        $user_invoices_count = [$invoice_count[$user->id - 2], $invoice_count_pending[$user->id - 2], $invoice_count_approved[$user->id - 2], $invoice_count_denied[$user->id - 2]];

        $user_invoice_chart = new InvoicesPerApproverChart;
        $user_invoice_chart->title('Invoices of '. $user->name, 32, 'white');
        $user_invoice_chart->labels(['Total Invoices', 'Pending Invoices', 'Approved Invoices', 'Denied Invoices']);
        $user_invoice_chart->dataset('Invoices', 'bar', $user_invoices_count)->color('rgba(54, 162, 235)')->backgroundColor('rgba(54, 162, 235, 0.2)');
        return view('dashboard', ['user' => $user, 'invoice_chart' => $invoice_chart, 'vehicle_chart' => $vehicle_chart, 'user_invoice_chart' => $user_invoice_chart]);

    }
}
