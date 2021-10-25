@extends('layouts.appBootstrap')

@section('title','Все компании')

@section('content')

<div class="container mt-5">
  <div class="row">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @foreach($company as $info)
              <form enctype="multipart/form-data" action="{{ route('company.update', $info->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Name of Company</label>
                    <input class="form-control" name="name" type="text" value="{{ $info->name }}" >
                  </div>
                  <div class="form-group mb-3">
                    <label for="exampleInputEmail1">External link</label>
                    <input class="form-control" name="external_link" type="text" value="{{ $info->external_link }}">
                  </div>
                  <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Company presenter amount</label>
                    <input class="form-control" name="company_presenter_amount" type="number"value="{{ $info->company_presenter_amount }}" >
                  </div>
                      <div class="form-group mb-3">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3" >{{ $info->description }}</textarea>
                      </div>
                  <div class="form-group mb-3">
                    <label for="logo">Logo image</label>
                    <td><img height="300px" width="500px" src="{{ asset('/storage/logoCompany/' .$info->logo)}}"></td>
                    <div class="input-group mt-3">
                        <input type="file" name="logo" class="custom-file-input" id="logo" value="{{$info->logo }}">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              @endforeach
            </div>
<div class="mb-3">you are admin</div>
  </div>
</div>