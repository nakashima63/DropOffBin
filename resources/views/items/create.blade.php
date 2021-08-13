@extends('layouts.app')

@section('content')
    
    <div class="text-center">
        <h1>不用品を出品する</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

             
            {!! Form::model($item, ['route' => 'items.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', '出品物名', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('image_file_name', '出品物画像') !!}
                    {!! Form::file('image_file_name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', '出品物の説明') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>

               
                
                <div class="form-group">
                    {!! Form::label('category_id', 'カテゴリ:') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                 </div>
                 
                 <div class="form-group">
                     {!! Form::label('time_limit', '取引期限') !!}
                     {!! Form::date('time_limit', null, ['class' => 'form-control']) !!}
                 </div>
                
                
                <div class="form-group">
                    {!! Form::submit('出品する', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection