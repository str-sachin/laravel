@extends('layouts.app')
@section('content')
@if (Auth::user() && Auth::user()->role == '1')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <br>
            <h3 style="margin-left:250px;"><b> USER DETAILS</b></h3>
            <br>
            <table>
               <thead>
                  <th> ID </th>
                  <th> Name </th>
                  <th> Email </th>
                  <th> Role </th>
                  <th> Edit </th>
                  <th> Delete </th>
                  <th> Send Message/Announcement </th>
               </thead>
               <tbody>
                  @foreach ($users as $show)
                  <tr>
                     <td><br> {{ $show->id }} </td>
                     <td><br> {{ $show->name }} </td>
                     <td><br> {{ $show->email }} </td>
                     <td><br> {{ $show->role }} </td>
                     <td> <br><i class="btn btn-primary">Edit</i></td>
                     <td> <br><i class="btn btn-danger">Delete</i></td>
                     <td> <br><a href ="sendnotification?id={{$show->id}}"><i class="btn btn-info" style="margin-left:55px;">Send</i></a></td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <div></div>
   <br/>
   <a href="admin">
      <p> DashBoard </p>
   </a>
</div>
<br/>
<br/>
@endif
@endsection