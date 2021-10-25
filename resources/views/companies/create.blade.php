@extends('layouts.appBootstrap')

@section('title','Создать компанию')

@section('content')
<div class="container mt-5">
  <div class="row">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Name of Company</label>
                    <input class="form-control" name="name" type="text" >
                  </div>
                  <div class="form-group mb-3">
                    <label for="exampleInputEmail1">External link</label>
                    <input class="form-control" name="external_link" type="text" >
                  </div>
                  <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Company presenter amount</label>
                    <input class="form-control" name="company_presenter_amount" type="number" >
                  </div>
                      <div class="form-group mb-3">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                      </div>
                  <div class="form-group mb-3">
                    <label for="logo">Logo input</label>
                    <div class="input-group">
                        <input type="file" name="logo" class="custom-file-input" id="logo">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
<div class="mb-3">you are admin</div>
  </div>
</div>