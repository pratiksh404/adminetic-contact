@extends('adminetic::admin.layouts.app')

@section('content')
    <x-adminetic-create-page name="contact" route="contact">
        <x-slot name="content">
            {{-- ================================Form================================ --}}
            @include('contact::admin.layouts.modules.contact.edit_add')
            {{-- =================================================================== --}}
        </x-slot>
    </x-adminetic-create-page>
@endsection

@section('custom_js')
    @include('contact::admin.layouts.modules.contact.scripts')
@endsection
