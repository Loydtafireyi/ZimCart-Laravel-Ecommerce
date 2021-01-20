@extends('vendor.installer.layouts.master')

@section('template_title')
    Welcome To Zimcart Installer
@endsection

@section('title')
    Zimcart E-commerce
@endsection

@section('container')
    <p class="text-center">
      Welcome To Zimcart Installer
    </p>
    <p class="text-center">
      <a href="{{ route('LaravelInstaller::requirements') }}" class="button">
        {{ trans('installer_messages.welcome.next') }}
        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
      </a>
    </p>
@endsection
