<?php
namespace App\Services\Companies;

use App\Interfaces\Companies\CompanyServiceInterface;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class CompanyService implements CompanyServiceInterface 
{

  public function indexCompany(): Collection
  {
    return Company::all();
  }

  public function storeCompany($dto, $company): void
  {
    $dtoInput = $dto->get('input');
    $dtoFile = $dto->get('file'); 

    DB::transaction(function () use($dtoInput, $dtoFile, $company)
    {
    $company->name                     = $dtoInput->name;
    $company->description              = $dtoInput->description;
    $company->logo                     = time().$dtoFile->logo->getClientOriginalName();
    $company->external_link            =  $dtoInput->externalLink;
    $company->company_presenter_amount = $dtoInput->companyPresenterAmount;

    $company->save();

    $dtoFile->logo->storeAs('public/logoCompany', time().$dtoFile->logo->getClientOriginalName());
    });
  }

  public function showCompany($id): Collection
  {
    return Company::query()->where('id', $id)->get();
  }

  public function updateCompany($dto, $id): void
  {
    $dtoInput = $dto->get('input');
    $dtoFile = $dto->get('file'); 

    DB::transaction( function() use($dtoInput, $dtoFile, $id)
    {
     Company::query()->where('id', $id)->update([
    'name'                     => $dtoInput->name,
    'description'              => $dtoInput->description,
    'logo'                     => time().$dtoFile->logo->getClientOriginalName(),
    'external_link'            => $dtoInput->externalLink,
    'company_presenter_amount' => $dtoInput->companyPresenterAmount,
    ]);

    Storage::delete('file.jpg');
    $dtoFile->logo->storeAs('public/logoCompany', time().$dtoFile->logo->getClientOriginalName());
    });
  }

  public function destroyCompany($id)
  {
    unlink('..\storage\app\public\logoCompany\\'.Company::query()->where('id', $id)->value('logo'));
    return Company::query()->where('id', $id)->delete();
  }
}