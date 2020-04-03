@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Level <b>{{ $game->level }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                 
                   <!--  // foreach ($game as $data) { -->
                   <?php 
                   $word = strtoupper(str_shuffle($game->word));
                   ?>
                  <h2><b> {{ $word }} </b></h2>
                    
                   Kategori : 
                    {{ $game->kategori }} 
                    <br> 
                   Kisi - Kisi : 
                    {{ $game->klu }} 
                        
                      <!--   echo print('<br>');
                        echo $game->klu; -->
                    <!-- // } -->
                    
                    <!-- You are logged in! -->
                    <div class="row">
                    </div>
                    <form id="contact_us" method="POST" action="javascript:void(0)" >
                        @csrf

                        <div class="form-group row">
                            

                            <div class="col-md-6">
                                <input type="hidden" name="idGame" value="{{ $game->idGame }}">
                                <input id="jawaban" type="text" class="form-control @error('jawaban') is-invalid @enderror" name="jawaban" value="{{ old('jawaban') }}" required autocomplete="jawaban" placeholder="Jawaban" autofocus>

                                @error('jawaban')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="alert alert-success d-none" id="msg_div">
                            <span id="res_message"></span>
                            <br>
                            <img src="{{URL::asset('asset/img/loading2.gif')}}" width="100px">
                        </div>

                        <!-- <div class="form-group row mb-0"> -->
                            <!-- <div class="col-md-6 offset-md-4"> -->
                                <button type="submit" id="send_form" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            <!-- </div> -->
                        <!-- </div> -->
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
   if ($("#contact_us").length > 0) {
    $("#contact_us").validate({
      
    // rules: {
    //   name: {
    //     required: true,
    //     maxlength: 50
    //   },
  
    //    mobile_number: {
    //         required: true,
    //         digits:true,
    //         minlength: 10,
    //         maxlength:12,
    //     },
    //     email: {
    //             required: true,
    //             maxlength: 50,
    //             email: true,
    //         },    
    // },
    // messages: {
        
    //   name: {
    //     required: "Please enter name",
    //     maxlength: "Your last name maxlength should be 50 characters long."
    //   },
    //   mobile_number: {
    //     required: "Please enter contact number",
    //     minlength: "The contact number should be 10 digits",
    //     digits: "Please enter only numbers",
    //     maxlength: "The contact number should be 12 digits",
    //   },
    //   email: {
    //       required: "Please enter valid email",
    //       email: "Please enter valid email",
    //       maxlength: "The email name should less than or equal to 50 characters",
    //     },
         
    // },
    submitHandler: function(form) {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('#send_form').html('Sending..');
      $.ajax({
        url: '/save-form' ,
        type: "POST",
        data: $('#contact_us').serialize(),
        success: function( response ) {
            $('#send_form').html('Submit');
            $('#res_message').show();
            $('#res_message').html(response.msg);
            $('#msg_div').removeClass('d-none');
            $('#jawaban').hide();
            $('#send_form').hide();
            
 
            document.getElementById("contact_us").reset(); 
            setTimeout(function(){
            $('#res_message').hide();
            $('#msg_div').hide();
            window.location.reload();
            },5000);

            // $(document).ajaxSuccess(function(){
            // alert("AJAX request successfully completed");
            // });
        }
      });
    }
  })
}
</script>

@endsection
