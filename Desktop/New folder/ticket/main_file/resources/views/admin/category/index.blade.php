@extends('layouts.admin')

@section('page-title')
    {{ __('Manage Category') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Category') }}</li>
@endsection

@section('multiple-action-button')
    @can('create-category')
        <div class="btn btn-sm btn-primary btn-icon m-1 float-end">
            <a href="{{route('admin.category.create')}}" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Create Category') }}"><i class="ti ti-plus text-white"></i></a>
        </div>  
    @endcan

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="pc-dt-simple" class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Color') }}</th>
                                <th scope="col" class="text-end me-3">{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $index => $category)
                                    <tr>
                                        <th scope="row">{{++$index}}</th>
                                        <td>{{$category->name}}</td>
                                        <td><span class="badge" style="background: {{$category->color}}">&nbsp;&nbsp;&nbsp;</span></td>
                                        <td class="text-end">
                                            @can('edit-category')

                                                <div class="action-btn bg-info ms-2">
                                                    <a href="{{ route('admin.category.edit', $category->id) }}" class="mx-3 btn btn-sm d-inline-flex align-items-center" data-toggle="tooltip"
                                                        title="{{ __('Edit') }}"><span class="text-white"> <i class="ti ti-edit"></i></span></a>
                                                </div>
                                            @endcan
                                            @can('delete-category')
                                                <div class="action-btn bg-danger ms-2">
                                                    <form method="POST" action="{{route('admin.category.destroy',$category->id) }}" id="user-form-{{$category->id}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="mx-3 btn btn-sm d-inline-flex align-items-center show_confirm" data-toggle="tooltip"
                                                        title="{{ __('Delete') }}">
                                                            <span class="text-white"> <i class="ti ti-trash"></i></span>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
