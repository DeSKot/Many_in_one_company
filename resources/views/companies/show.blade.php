@extends('layouts.appBootstrap')

@section('title','Все компании')

@section('content')


<div class="container">
<div class="row mt-5">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Company name</th>
                      <th>Description</th>
                      <th>logo</th>
                      <th>External link</th>
                      <th>company_presenter_amount</th>
                      <th>Select</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($company as $info)
                    <tr>
                      <td>{{$info->name}}</td>
                      <td>{{$info->description}}</td>
                      <td><img height="300px" width="500px" src="{{ asset('/storage/logoCompany/' .$info->logo)}}"></td>
                      <td>{{$info->external_link}}</td>
                      <td>{{$info->company_presenter_amount}}</td>
                      <td>
                          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                             <a href="{{ route('company.edit', $info->id) }}" type="button" class="btn btn-warning" >Редактировать</a>
                             <form action="{{ route('company.destroy', $info->id) }}" method="DELETE">
                               @csrf
                               @method('DELETE')
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