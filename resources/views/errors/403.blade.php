@extends('errors::minimal')

@section('title', __('Access Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Read Access Forbidden'))
