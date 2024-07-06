<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ourjourney;
use Illuminate\Http\Request;

class OurjourneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function our_journey_status($id){

        $getstatus=Ourjourney::select('status')->where('id',$id)->first();//take value from status
        if($getstatus->status==1){
            $status=0;//any type variable
         }else{
            $status=1;//any type variable
         }

         Ourjourney::where('id',$id)->update(['status'=>$status]);//updated value status

         return redirect()->back()->with('success', 'Ourjourney Status change successfully!');

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.Our_journey',[
           'journeys'=>Ourjourney::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|string',
            'status' => 'required',

        ]);



        // Create a new MainCategory instance and save it to the database
     $our_journey = new Ourjourney();
     $our_journey->year =$request->year;

     $our_journey->description= $request->description;
     $our_journey->link= $request->link;
     $our_journey->status= $request->status;
     $our_journey->save();

        // Optionally, you may return a response or redirect somewhere
        return redirect()->back()->with('success', 'Our journey  created successfully!');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $journey=Ourjourney::findOrFail($id);
        // return $request;

        // Update the main category data
        $journey->update([
            'year' => $request->year,
            'description' => $request->description,
            'link' => $request->link,
            'status' => $request->status,

        ]);

        return redirect()->back()->with('success', 'journey updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
