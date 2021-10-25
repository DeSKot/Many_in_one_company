<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Interfaces\Companies\CompanyServiceInterface;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Contracts\View\View;
use App\Dto\DtoFactories\CreateCompanyDtoFactory;
use App\Http\Requests\StoreCompanyRequest;

class CompanyController extends Controller
{

    private CompanyServiceInterface $companyService;

    public function __construct(CompanyServiceInterface $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index(): View
    {
        return view('companies.index', [
            'allCompanies' => $this->companyService->indexCompany()
        ]);
    }

    public function create(): View
    {
        return view('companies.create');
    }

    public function store(Request $request, Company $company, StoreCompanyRequest $storeCompanyRequest)
    {/*
        $this->companyService->storeCompany(CreateCompanyDtoFactory::fromRequest($request), $company);
        return view('companies.create');*/
        var_dump($storeCompanyRequest->validated()['name']);
    }

    public function show($id)
    {
        return view('companies.show', [
            'company' => $this->companyService->showCompany($id),
        ]);
    }

    public function edit($id)
    {
        return view('companies.edit',[
            'company' => $this->companyService->showCompany($id),
        ]);
    }

    public function update(Request $request, $id, )
    {
        $this->companyService->updateCompany(CreateCompanyDtoFactory::fromRequest($request), $id);
        return view('companies.edit');
    }

    public function destroy($id)
    {
        $this->companyService->destroyCompany($id);
        return redirect()->back();
    }
}
