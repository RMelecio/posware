<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\CfdiFiscalRegime;
use App\Models\CfdiCountry;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $companies = Company::all();
        return view('company.index')
            ->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company): View
    {
        $fiscalRegimes = CfdiFiscalRegime::all();
        $countries = CfdiCountry::all();
        return view('company.edit')
            ->with('company', $company)
            ->with('countries', $countries)
            ->with('fiscalRegimes', $fiscalRegimes);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company): View
    {
        $updateCompany = Company::find($company->id);
        $updateCompany->fill($request->all());
        $updateCompany->save();
        $companies = Company::all();

        return view('company.index')
            ->with('companies', $companies)
            ->withSuccess('Empresa actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company): RedirectResponse
    {
        //
    }
}
