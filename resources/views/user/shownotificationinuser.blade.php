@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"><br>
              <table style="margin-left:180px"  >
               <h3 style="margin-left:290px" >
                <b> Notification </b>
               </h3>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
              <br>
                
                <?php $count = 0; ?> 
                @foreach ($notifications as $notification )
               <?php if($count == 1) break; ?>
               <?php $count++; ?> 
              
               <thead>
                    <th> Subject </th>
                    <th> Message </th>
               </thead>
               
               <tbody>
                <tr>
                 <td> <br> {{$notification['data']['subject']}} </td>
                 <td> <br> {{$notification['data']['message']}} </td>
                </tr>
                  <tr>
                   <td><br> {{ $notifications[1]['data']['subject'] }} </td>
                   <td><br> {{ $notifications[1]['data']['message'] }} </td>
                  </tr>
                  <tr>
                   <td><br> {{ $notifications[2]['data']['subject'] }} </td>
                   <td><br> {{ $notifications[2]['data']['message'] }} </td>
                  </tr>
                  <tr>
                   <td><br> {{ $notifications[3]['data']['subject'] }} </td>
                   <td><br> {{ $notifications[3]['data']['message'] }} </td>
                  </tr>
                  <tr>
                   <td><br> {{ $notifications[4]['data']['subject'] }} </td>
                   <td><br> {{ $notifications[4]['data']['message'] }} </td>
                  </tr>
                  <tr>
                   <td><br> {{ $notifications[5]['data']['subject'] }} </td>
                   <td><br> {{ $notifications[5]['data']['message'] }} </td>
                  </tr>
                  
                </tbody>
              </table>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection