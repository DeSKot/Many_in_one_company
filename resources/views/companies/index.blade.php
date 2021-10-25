@extends('layouts.appBootstrap')

@section('title','Все компании')

@section('content')

@role('admin')
<div class="container">

<div class="row mt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All companies</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Company name</th>
                      <th>Description</th>
                      <th>External link</th>
                      <th>Select</th>
                      @role('admin')
                      <th><a href="{{ route('company.create') }}" type="button" class="btn btn-success" >Создать</a></th>
                      @endrole
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allCompanies as $company)
                    <tr>
                      <td>{{ $company->name }}</td>
                      <td>{{ $company->description }}</td>
                      <td>{{ $company->external_link }}</td>
                      <td>
                          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ route('company.show', $company->id) }}" type="button" class="btn btn-success" >Выбрать компанию</a>
                            <form action="{{ route('company.destroy', $company->id) }}" method="POST">
                               @method('DELETE')
                               @csrf
                               <button class="btn btn-danger" type="submit ">Удалить</button>
                             </form>
                          </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
</div>
@endrole

@role('company_manager')
<div>you are company_manager</div>
@endrole

@role('company_presenter')
<div>you are company_presenter</div>
@endrole

@role('customer')
<div>you are customer</div>
@endrole
