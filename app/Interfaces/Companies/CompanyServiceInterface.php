<?php
namespace App\Interfaces\Companies;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

interface CompanyServiceInterface
{
  public function indexCompany(): Collection;

  public function storeCompany(Collection $dto, object $company): void;

  public function showCompany($id): Collection;

  public function updateCompany(Collection $dto, int $id): void;

  public function destroyCompany($id);
}