<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\BookingRequest;
use App\Models\Customer;
use App\Models\Ticket;
use App\Models\Concert;

use Codedge\Fpdf\Fpdf\Fpdf;

// Repositories
use App\Repositories\LandingRepository;

class BookTicketController extends Controller
{

    private $process;

    public function __construct(LandingRepository $process){
        $this->process = $process;
    }

    public function index($id)
    {
        return view('guest.index', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(BookingRequest $request)
    {
        $attributes = $request->only(['name', 'address', 'gender', 'phone']);
        $ticket_number = $this->process->storing($attributes, $request->id);

        $fpdf = new FPDF('P','mm',array(60,60));
        $fpdf->AddPage();
        $fpdf->SetFont('Courier', 'B', 18);
        $fpdf->Cell(10, 10, $ticket_number);
        $fpdf->Cell(25, 25, $request->name);
        $path = storage_path('app/public/ticket/');
        $fpdf->Output($path.$ticket_number.'.pdf', 'F');

        return redirect()->back()->with(['ticket' => $ticket_number]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
