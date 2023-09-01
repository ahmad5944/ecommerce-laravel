@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ 'Edit ' . $pageTitle }}</h4>
                </div>
                <hr>
                <form method="POST" action="{{ route($routePath.'.update', $data->id) }}" role="form"
                    enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label">Nama Permission</label>
                                                <input type="text" class="form-control" placeholder="user-list" name="name" value="{{ $data->name }}">
                                                <small class="text-danger">(Format Ada "list/create/edit/delete/show")</small>
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label">Deskripsi</label>
                                                <textarea class="form-control" rows="5"  placeholder="..." name="description">{{ $data->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit"
                                class="btn btn-dark me-1 waves-effect waves-float waves-light">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
