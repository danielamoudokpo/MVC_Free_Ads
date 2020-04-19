@extends('layouts.app')

@section('content')
    

 <section>
       <div class="container">
        <div class="row">
          <div class="col-md-4">
           <div class="chat-list-box">
           <div class="head-box">
             <ul class="list-inline text-left d-inline-block float-left">
               <li> <img src="https://i.ibb.co/fCzfFJw/person.jpg" alt="" width="40px"> </li> 
             </ul>
              <ul class="flat-icon list-inline text-right d-inline-block float-right">
               <li> <a href="#"> <i class="fas fa-search"></i> </a> </li> 
               <li> <a href="#"> <i class="fas fa-ellipsis-v"></i> </a> </li> 
             </ul>
             </div>
         
             <div class="chat-person-list">
               <ul class="list-inline"> 
                 <li> <a href="#" class="flip"> <img src="https://i.ibb.co/6JpcfrK/p4.png" alt=""> <h4> {{$User->name}} </h4> <span class="chat-time">12:00 Am</span> </a> </li> 
                 {{-- <li> <a href="#" class="flip"> <img src="https://i.ibb.co/vdyYVvp/p1.png" alt=""> <span> Sunena Daksh </span> <span class="chat-time">11:45 Pm</span> </a> </li> 
                 <li> <a href="#" class="flip"> <img src="https://i.ibb.co/vY406Hp/p3.png" alt=""> <span> Arpit Singh </span>  <span class="chat-time">12:15 Pm</span> </a> </li>
                 <li> <a href="#" class="flip"> <img src="https://i.ibb.co/KhYZwPg/p2.png" alt=""> <span> Arpita </span>  <span class="chat-time">09:10 Am</span> </a> </li>
                 <li> <a href="#" class="flip"> <img src="https://i.ibb.co/ChGLXKZ/p5.png" alt=""> <span> Sorasth parmar </span>  <span class="chat-time">02:00 Pm</span> </a> </li>
                 <li> <a href="#" class="flip"> <img src="https://i.ibb.co/KDZymW5/p6.png" alt=""> <span> Sushmita </span>  <span class="chat-time">08:00 Am</span> </a> </li> --}}
               </ul>
             </div>
             
           </div>
          </div> <!-- col-md-4 closed -->
          
          <div class="col-md-8">
            <div class="message-box">
              <div class="head-box-1">
              
                <ul class="msg-box list-inline text-left d-inline-block float-left">
                 <li> <i class="fas fa-arrow-left" id="back"></i> </li> 
                   <li> <img src="https://i.ibb.co/fCzfFJw/person.jpg" alt="" width="40px"> <span> <h1> {{$User->name}} </h1> </span> <br>  </li> 
                </ul>
                
             </div>
             
             <div class="msg_history">
             <div class="incoming_msg">
               <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
               <div class="received_msg">
                 <div class="received_withd_msg">
                   <p>Hi, How are you ?</p>
                   <span class="time_date"> 11:01 AM    |    June 9</span></div>
               </div>
             </div>
             <div class="outgoing_msg">
               <div class="sent_msg">
                 <p>Hello, i am fine thankyou, what about you ?</p>
                 <span class="time_date"> 11:01 AM    |    June 9</span> </div>
             </div>
             <div class="incoming_msg">
               <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
               <div class="received_msg">
                 <div class="received_withd_msg">
                   <p>I am also good thankyou!</p>
                   <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
               </div>
             </div>
             <div class="outgoing_msg">
               <div class="sent_msg">
                 <p> ok </p>
                 <span class="time_date"> 11:01 AM    |    Today</span> </div>
             </div>
             <div class="incoming_msg">
               <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
               <div class="received_msg">
                 <div class="received_withd_msg">
                 {{-- <p> {{$message->content}}</p> --}}
                   <span class="time_date"> 11:01 AM    |    Today</span></div>
               </div>
             </div>
           </div>
             
             <div class="send-message">

             <form method="POST" >
                @csrf
                <textarea cols="10" rows="2" name="content"class="form-control" placeholder="Type your message here ..."> </textarea>
                 <ul class="list-inline"> 
                   <li><a href="/Message/{{$User->id}}"> <button class="fas fa-paper-plane btn btn-success"></button> </a></li>
                   <input type="hidden" name="_method" value ="PUT">
                 </ul>
               </form>
             </div>
             
             
            </div>
          </div>
          
        </div>
       </div>
     </section>
     
     
         <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
     
     <script>
       $("#attach").click(function(){
           $(".attachement").toggle();
         });
     </script>
     <script>
       $("#dset").click(function(){
           $(".setting-drop").toggle('1000');
         });
     </script>
     
     <script>
     $(document).ready(function(){
     $(".flip").click(function(){
         $(".message-box").show("slide", { direction: "right" }, 10000);
     });
 });
  </script>
  <script>
     $(document).ready(function(){
     $("#back").click(function(){
         $(".message-box").hide("slide", { direction: "left" }, 10000);
     });
 });
  </script>

@endsection