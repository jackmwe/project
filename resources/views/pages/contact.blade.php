@extends('main')
@section('title',' | Contact Us')
@section('content')
        <div class="row">
            <div class="col-md-8">
                <h1>Contact Us</h1>
                <hr>
                <form action="{{url('contact')}}", method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label name="email">Email</label>
                        <input name="email" id="email" value="{{Auth::user()->email}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="subject">Subject</label>
                        <input name="subject" id="subject" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="message">Message</label>
                        <textarea name="message" id="message" class="form-control"> Write your message here . . . </textarea>
                    </div>
                    <input type="submit" value="Send Message" class="btn btn-success">
                    <input type="reset" value="Clear Content" class="btn btn-danger">
                </form>
        </div>
    </div>
@endsection