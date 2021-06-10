@extends('adminetic::admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>All Groups</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Groups</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <x-adminetic-card title="group" route="group">
        <x-slot name="buttons">
            <a href="{{ adminCreateRoute('group') }}" class="btn btn-primary btn-air-primary">Create Group</a>
        </x-slot>
        <x-slot name="content">
            <table class="table table-striped table-bordered datatable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($groups as $group)
                        <tr>
                            <td>{{ $group->name }}</td>
                            <td>
                                <x-adminetic-action :model="$group" route="group" show="0" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </x-slot>
    </x-adminetic-card>
@endsection

@section('custom_js')
    @include('contact::admin.layouts.modules.group.scripts')
@endsection
