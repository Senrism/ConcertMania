<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Repositories
use App\Repositories\ConcertRepository;

// Requests

use App\Http\Requests\ConcertRequest;

class ConcertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $process;

    public function __construct(ConcertRepository $process){
        $this->process = $process;
    }

    public function index()
    {
        $data = $this->process->getAll();
        return view('admin.concert.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.concert.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConcertRequest $request)
    {
        try{
            $request->file('image')->store('public/img');
            $attributes = [
                            'band'  => $request->band,
                            'image' => $request->image->hashName(),
                            'date'  => $request->date,
                            'ticket_total' => $request->ticket_total,
                        ];
            $this->process->storing($attributes);

            return response()->json(['data' => 'Success']);

        }catch(Exception $e){

            response()->json(['data' => 'Success']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->process->findId($id);
        return view('admin.concert.show', compact('data'));
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
        $this->process->dropping($id);
        return redirect()->back()->with('message', 'delete success');

    }
}
