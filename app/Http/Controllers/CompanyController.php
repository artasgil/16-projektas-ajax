<?php

namespace App\Http\Controllers;

use App\Company;
use App\Client;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::All();

        return view('company.index', ['companies' => $companies]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Ivesti komanija be klientu
        //Ivesti kompanija su vienu klientu
        //Ivesti kompanija su daug klientu



        // $validateVar = $request->validate([
        //     'task_title' => 'required|regex:/^[\pL\s]+$/u|unique:tasks,title|min:6|max:225',
        //     'task_description' => 'required|max:1500',
        //     'task_logo' => 'image|mimes:jpg,jpeg,png',
        //     'type_id' => 'required|numeric|gt:0|lte:'.$type_count,
        //     'owner_id' => 'required|numeric|gt:0|lte:'.$owners_count,
        //     'task_start_date'=>'required|before:task_end_date',
        //     'task_end_date'=>'required'

        // ]);

        $clientsNew = $request->clientsNew;

        $company = new Company;

        $company->title = $request->companyTitle;
        $company->description = $request->companyDescription;
        $company->address = $request->companyAddress;

        $company->save();

        $kiekDinaminiulauku = 30;
        //Ar mes norime ivesti klientu ar ne
        if($clientsNew == "1") {
            for($i = 0; $i = $kiekDinaminiulauku; $i++) {
        $client = new Client;
        $client->name = $request->clientName[$i];
        $client->surname = $request->clientSurname[$i];
        $client->description = $request->clientDescription[$i];
        $client->company_id = $company->id;
        $company->save();

            }
        }
        return redirect()->route("company.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $clients = $company->companyClients;
        return view("company.show", ['company' => $company, 'clients' => $clients]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
