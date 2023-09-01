@extends('layouts.template')

@section('content')
<style>
    .checkbox{
        margin-bottom: 15px !important;
        margin-left: -9px;
    }
</style>
<div class="card card-default">
    <div class="card-header py-5">
        <div class="d-flex justify-content-between align-items-center">
            <span id="card_title">
                <h4 class="m-0">{{ __('Update '.$pageTitle) }}</h4>
            </span>
            <div class="float-right">
                {{-- <a href="{{ route($routePath.'.index') }}" class="btn btn-primary btn-sm float-right font-weight-bolder">
                    <i class="fa fa-arrow-left"></i>Back
                </a> --}}
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('role.update', $role->id) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf


            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" placeholder="Name" required="required" name="name" type="text" value="test" id="name">
            </div>

            <div class="form-group">
                <label>Permission</label>
                <table class="table table-bordered">
                    <tr class="bg-success">
                        <td width="1%">
                            <label class="checkbox">
                                {{-- <input id="head" class="align-middle" type="checkbox"> --}}
                                <input class="form-check-input m-0" type="checkbox" id="head">
                                <span></span>
                            </label>
                        </td>
                        <td>
                            <label for="head" class="m-0 text-white align-middle">Check All</label>
                        </td>
                    </tr>
                    @php
                    $lastp = "";
                    @endphp
                    @foreach($permissions as $value)
                        @php
                            $v = "";
                            $title = explode('-', $value->name);
                            foreach ($title as $key => $ve) {
                                if ($key != (count($title) - 1)) {
                                    $v .= ucfirst($ve.' ');
                                }
                            }
                            $v = str_replace(' ', '-', $v);
                        @endphp

                        @if($lastp != $v)
                            <tr class="bg-danger">
                                <td>
                                    <label class="checkbox checkbox-success">
                                        <input class="head-2 form-check-input m-0" data-child=".{{ $v }}" type="checkbox" id="{{ $v }}-head">
                                        <span></span>
                                    </label>
                                    {{-- <label class="checkbox"> --}}
                                </td>
                                <td>
                                    <label for="{{ $v }}-head" class="m-0 text-white">{{ str_replace('-', ' ', $v) }}</label>
                                </td>
                            </tr>
                        @endif

                        <tr>
                            <td width="1%">
                                <label class="checkbox">
                                    {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'form-check-input m-0 name all '.$v, 'id' => $value->name]) }}
                                    <span></span>
                                </label>
                            </td>
                            <td>
                                <label for="{{ $value->name }}" class="m-0">{{ $value->name }}</label>
                            </td>
                        </tr>

                        @php
                            $lastp = $v;
                        @endphp
                    @endforeach
                </table>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    $('#head').click(function() {
        $(".all").prop('checked', this.checked);
        $(".head-2").prop('checked', this.checked);
    });
    $('.head-2').click(function() {
        var v = $(this).data('child');
        $(v).prop('checked', this.checked);
    });
</script>
@endsection
