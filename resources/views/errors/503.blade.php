@extends('errors::minimal')

@section('title', __('Oops Service Unavailable'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'Service Unavailable'.bb('error.1')))