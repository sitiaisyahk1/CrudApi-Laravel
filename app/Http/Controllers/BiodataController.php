<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Exception;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $Biodata = Biodata::all();

            $response = $Biodata;
            $code = 200;
        }catch (Exception $e){
            $code = 500;
            $response = $e -> getMessage();
        }

        return apiResponseBuilder($code,$response);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'age' => 'required',
            'address' => 'required',
            'description' => 'required'
        ]);

        try {
            $Biodata = new Biodata();

            $Biodata->name = $request->name;
            $Biodata->age = $request->age;
            $Biodata->address = $request->address;
            $Biodata->description = $request->description;

            $Biodata->save();
            $code=200;
            $response=$Biodata;

            } catch (Exception $e) {
                if($e instanceof ValidationException){
                    $code = 400;
                    $response = 'tidak ada data';
                }else{
                    $code= 500;
                    $response =$e->getMessage();
                }
            }
            return apiResponseBuilder($code, $response);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $Biodata = Biodata::findOrFail($id);

            $code = 200;
            $response = $Biodata;
        }catch (Exception $e){
            if ($e instanceof ModelNotFoundException){
                $code = 400;
                $response = 'inputkan sesuai id';
            }else{
                $code = 500;
                $response = $e->getMessage();
            }
        }

        return apiResponseBuilder($code,$response);

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
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'address' => 'required',
            'description' => 'required'
        ]);

        try {
            $Biodata = new Biodata();

            $Biodata->name = $request->name;
            $Biodata->age = $request->age;
            $Biodata->address = $request->address;
            $Biodata->description = $request->description;

            $Biodata->save();
            $Biodata=200;
            $response=$Biodata;

            $code = 200;
            $response = $Biodata;
        }catch (Exception $e){
            if ($e instanceof ValidationException){
                $code = 400;
                $response = "tidak ada data";
            }else{
                $code = 500;
                $response = $e->getMessage();
            }
        }

        return apiResponseBuilder($code, $response);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $Biodata = Biodata::find($id);
            $Biodata->delete();

            $code = 200;
            $response = $Biodata;
        }catch (\Exception $e){
            $code = 500;
            $response = $e->getMessage();
        }

        return apiResponseBuilder($code, $response);
    }

}
