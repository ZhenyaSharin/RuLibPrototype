@extends('layout')

@section('title', $author['Last_name'].' '.$author['First_name'].' '.$author['Middle_name'])

@section('content')
<vue-author-profile :author="{{ json_encode($author) }}">
    
<vue-author-profile/>
@endsection

