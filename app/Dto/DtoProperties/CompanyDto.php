<?php

namespace App\Dto\DtoProperties;

use Illuminate\Http\UploadedFile;

class CompanyDto
{
  public string $name;
  public string $description;
  public UploadedFile $logo;
  public string $externalLink;
  public int $companyPresenterAmount;
}