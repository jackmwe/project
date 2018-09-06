@extends('main')

@section('title', ' || Library')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
    box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
    float: left;
    width: 50%;
    padding: 10px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
/* Style the buttons */
.btn {
    border: none;
    outline: none;
    padding: 12px 16px;
    background-color: #f1f1f1;
    cursor: pointer;
}

.btn:hover {
    background-color: #ddd;
}

.btn.active {
    background-color: #666;
    color: white;
}
</style>
</head>
<body>

<h2>Books Available in the Unions' Library</h2>
<div class="col-md-8">
<p>Visit Isiolo 8 and borrow any book of your interest</p>
</div>
@if(auth()->user()->isAdmin())
<div class="col-md-4">
<a href="{{url('library/create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Add Book</a>
</div>
@endif

<div id="btnContainer">
<button class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
<button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
</div>
<br>

<div class="row">
  @foreach($books as $book)
  <div class="column" style="background-image: url('{{asset('img/book.jpg')}}'); background-repeat: no-repeat; color: red;">
    <h2>{{$book->title}}</h2>
    <h2>{{$book->author}}</h2>
    <p>{{$book->description}}</p>
  </div>

  @endforeach

  </div>
<script>
// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// List View
function listView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "100%";
  }
}

// Grid View
function gridView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "50%";
  }
}

/* Optional: Add active class to the current button (highlight it) */
var container = document.getElementById("btnContainer");
var btns = container.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

@endsection 