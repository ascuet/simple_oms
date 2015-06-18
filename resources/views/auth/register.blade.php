@extends('app')

@section('content')
@if (isset($user))
    {!! Form::model($user, ['url' =>  url('users/'.$hash), 'method' => 'put', 'name' => 'update_form', 'id' => 'update_form']) !!}
    {!! Form::hidden('hash', SimpleOMS\Helpers\Helpers::hash($user->id)) !!}
@else
    {!! Form::open(['url' => url('users'), 'name' => 'register_form', 'id' => 'register_form']) !!}
@endif
<div class="row">
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <label class="required">User Name</label>
                {!! Form::text('name', Input::old('name'), [ 'id' => "name", 'class' => "form-control", 'maxlength' => "50", 'required' => "required" ]) !!}
            </div>
            <div class="col-md-12">
                <label class="required">E-Mail Address</label>
                {!! Form::text('email', Input::old('email'), [ 'id' => "email", 'class' => "form-control", 'maxlength' => "255", 'required' => "required" ]) !!}
            </div>
            @if (isset($user))
                <div class="col-md-12">
                    <label class="required">Password</label>
                    <input type="password" class="form-control" name="current_password" required>
                </div>
                <div class="col-md-12">
                    <label>New Password (if changing password)</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="col-md-12">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
                <div class="col-md-12">
                    <label>Role</label><br/>
                    <strong>{{ $user->role->name }}</strong>
                </div>
            @else
                <div class="col-md-12">
                    <label>Password</label><br/>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <label>Default password is: "{{ DEFAULT_PW }}".<br/>User will be asked to change password on first login.</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="required">Role</label><br/>
                    @foreach ($roles as $role)
                        <label>
                            <input {{ old('role_id') == $role->id ? 'checked="checked"' : '' }} type="radio" name="role_id" value="{{ $role->id }}"/>
                            {{ $role->name }}
                        </label>&nbsp;&nbsp;&nbsp;
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <label class="required">First Name</label>
                {!! Form::text('customer[first_name]', Input::old('first_name'), [ 'id' => "first_name", 'class' => "form-control", 'maxlength' => "50", 'required' => "required" ]) !!}
            </div>

            <div class="col-md-12">
                <label>Middle Name</label>
                {!! Form::text('customer[middle_name]', Input::old('middle_name'), [ 'id' => "middle_name", 'class' => "form-control", 'maxlength' => "50"]) !!}
            </div>
            <div class="col-md-12">
                <label class="required">Last Name</label>
                {!! Form::text('customer[last_name]', Input::old('last_name'), [ 'id' => "last_name", 'class' => "form-control", 'maxlength' => "50", 'required' => "required" ]) !!}
            </div>
        </div>
    </div>
</div>

<br/>

<div class="row">
    <div class="col-md-12">
        <input class="btn btn-primary" type="submit" value="Submit"/>
    </div>
</div>
{!! Form::close() !!}
@endsection
