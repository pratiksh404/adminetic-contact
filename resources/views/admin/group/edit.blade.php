@extends('adminetic::admin.layouts.app')

@section('content')
    <x-adminetic-edit-page name="group" route="group" :model="$group">
        <x-slot name="content">
            {{-- ================================Form================================ --}}
            @include('contact::admin.layouts.modules.group.edit_add')
            {{-- =================================================================== --}}
        </x-slot>
    </x-adminetic-edit-page>
@endsection

@section('custom_js')
    @include('contact::admin.layouts.modules.group.scripts')
@endsection
