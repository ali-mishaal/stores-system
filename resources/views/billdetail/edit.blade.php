@extends('../structure')

@section('title' , 'bill detail|edit')

@section('content')

<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>edit bill detail</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            @if(Session::has('msg'))
            <div class="col-md-12">
             
                
                <div class="x_content bs-example-popovers">

                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>{{ session('msg') }}</strong> 
                  </div>

                
              </div>
            </div>
           @endif


            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                  <div class="x_title">
                    <h2>edit bill detail <small>sub title</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" method="post" action="{{ route('update.detail',$bill->id) }}" novalidate>
                    {{ csrf_field() }}

                      <div class="item form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">bill head id<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="billh" class="form-control col-md-7 col-xs-12" required="required">
                             @foreach($bills as $bill)
                                <option value="{{$bill->id}}">{{$bill->id}}</option>
                             @endforeach
                         </select>
                        </div>
                         @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>

                      <div class="item form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">stores<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="store" class="form-control col-md-7 col-xs-12" required="required" id="store">
                             @foreach($stores as $store)
                                <option value="{{$store->id}}">{{$store->name}}</option>
                             @endforeach
                         </select>
                        </div>
                         @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>

                      <div class="item form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">items<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="item" class="form-control col-md-7 col-xs-12" required="required" id="item">
                             
                         </select>
                        </div>
                         @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>
                      <div class="item form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">quantity<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="number" name="qua" class="form-control col-md-7 col-xs-12" required="required" value="{{$bill->quantity}}" id="qua">                         
                        </div>
                         @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>

                      <div class="item form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">price<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input  type="number" name="price" class="form-control col-md-7 col-xs-12" required="required" value=""  id="sprice">                         
                        </div>
                         @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>

                      <div class="item form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">total<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="number" name="total" class="form-control col-md-7 col-xs-12" required="required"  id="total" value="{{$bill->total}}">                         
                        </div>
                         @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>


                      <div class="form-group ">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">edit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

@endsection

@section('script')
<script>


    $(document).ready(function(){
      
         
         $("#store").change(function(){
             var id = $(this).val();
              
             $.ajax({
                     url:'/billhead/item',
                     method:'get',
                     data:{id:id},
                     success:function(resp){
                      if(resp == "false")
                      {
                        alert('enter store');
                      }else
                      {
                        $('#item').html(resp);
                      }
                      
                     },error:function(){
                         alert("error");
                     }
                      

                });
         });

         $("#item").change(function(){
             var id = $(this).val();

             $.ajax({
                     url:'/billhead/price',
                     method:'get',
                     data:{id:id},
                     success:function(resp){
                      if(resp == "false")
                      {
                        alert('enter item');
                      }else
                      {
                        $('#sprice').val(resp);
                      }
                      
                     },error:function(){
                         alert("error");
                     }
                      

                });
         });

         $("#qua").change(function(){
             var qua = $(this).val();
             var price =$('#sprice').val();
             $('#total').val(qua * price);
         });

        
     });

   </script>
   @endsection