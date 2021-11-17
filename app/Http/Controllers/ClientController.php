<?php

namespace App\Http\Controllers;

use App\Client;
use App\Company;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::All();

        return view('client.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::All();
        return view('client.create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $companyNew = $request->companyNew; //1 arba false
        //jeigu companyNew ==1(pazymetas), tada vykdomas naujos kompanijos pridejimas
        //kitu atveju kompanija yra imama is select
        // 1 - interpretuoja kaip true arba kaip string. programa 1 supranta kaip teksta

        // return $companyNew;

        if($companyNew == "1") {
            $company= new Company;
            $company->title = $request->companyTitle;
            $company->description = $request->companyDescription;
            $company->address = $request->companyAddress;
            $company->save();

            $companyId = $company->id;
        } else {
            $companyId = $request->clientCompany;
        }



        //$company->id


        $client = new Client;


        // $validateVar = $request->validate([
        //     'task_title' => 'required|regex:/^[\pL\s]+$/u|unique:tasks,title|min:6|max:225',
        //     'task_description' => 'required|max:1500',
        //     'task_logo' => 'image|mimes:jpg,jpeg,png',
        //     'type_id' => 'required|numeric|gt:0|lte:'.$type_count,
        //     'owner_id' => 'required|numeric|gt:0|lte:'.$owners_count,
        //     'task_start_date'=>'required|before:task_end_date',
        //     'task_end_date'=>'required'

        // ]);

        $client->name = $request->clientName;
        $client->surname = $request->clientSurname;
        $client->description = $request->clientDescription;
        $client->company_id = $companyId;

        // $client->company_id = $request->id; nuo ifo $request->clientCompany, else $company->id  if(companyNew=="1") $company->id else $request->clientCompany

        $client->save();
        return redirect()->route("client.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
