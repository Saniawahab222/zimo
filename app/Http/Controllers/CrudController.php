<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;


class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
 
 
 
 
 
 
 
 
 
     public function index(Request $request)
    {
        // Check if the request is AJAX
        if ($request->ajax()) {
            $data = User::latest()->get();






            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // Generate edit and delete buttons for each row
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
                    // Generate a view button for each row
                    $btn .= '<a class="btn btn-sm btn-info mx-auto" href="' . route('products-ajax-crud.show', $row->id) . '" role="button">View</a>';
        
        
        
        
        
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }











        // // Retrieve the number of users by country
        // $usersByCountry = User::select('country', DB::raw('count(*) as total'))
        //     ->groupBy('country')
        //     ->pluck('total', 'country');

        // // Return the view for productAjax.blade.php with the usersByCountry data
        // return view('productAjax', compact('usersByCountry'));
    }






    /**
     * Show the details of a specific resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
    
    
    
    
     public function show($id)
    {
        // Retrieve the specific user/product based on the given ID
        $product = User::find($id);

        // Return the view for productDetails.blade.php with the product data
        return view('productDetails', compact('product'));
    }






    /**
     * Store or update a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
  
  
  
  
  
  
     public function store(Request $request)
    {
        // Create or update a user/product based on the request data
        User::updateOrCreate(
            [
                'id' => $request->product_id
            ],
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' =>$request->phone_number,
                'country' =>$request->country
            ]
        );

        // Return a JSON response indicating success
    
    
    
        return response()->json(['success' => 'User saved successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
   
   
   
   
     public function edit($id)
    {
        // Find the user/product based on the given ID
        $product = User::find($id);

        // Return the user/product as a JSON response
        return response()->json($product);
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
   
   
   
   
     public function destroy($id)
    {
        // Find and delete the user/product based on the given ID
        User::find($id)->delete();

        // Return a JSON response indicating success
        return response()->json(['success' => 'Product deleted successfully.']);
    }








    public function usersByCountryGraph()
{
    $usersByCountry = DB::table('users')
        ->select('country', DB::raw('COUNT(*) as total'))
        ->groupBy('country')
        ->get();

    $data = [];
    foreach ($usersByCountry as $row) {
        $data[] = [
            'label' => $row->country,
            'y' => $row->total,
        ];
    }

    return response()->json($data);
}
}
