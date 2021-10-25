<?php

namespace App\Dto\DtoFactories;

use App\Dto\DtoProperties\CompanyDto;
use Illuminate\Support\Collection ;
use Illuminate\Http\Request;

class CreateCompanyDtoFactory
{
  public static function fromRequest(Request $request): Collection
  {
    return collect([
      'input' => self::fromArray($request->input()),
      'file'  => self::fromFile($request->file()),
    ]);
  }

  public static function fromArray(array $data): CompanyDto
  {
    $dto = new CompanyDto;

    $dto->name = $data['name'];
    $dto->description = $data['description'];
    $dto->externalLink = $data['external_link'];
    $dto->companyPresenterAmount = $data['company_presenter_amount'];

    return $dto;
  }

  public static function fromFile(array $data): CompanyDto
  {
     $dto = new CompanyDto;

     $dto->logo = $data['logo'];

     return $dto;
  }
}