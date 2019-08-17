@extends('../structure')

@section('title' , 'reports')

@section('css')
   <style>
         ul li
         {
          margin-right: 5px;
         }

         #show
         {
          margin-top: 13px;
         }

         #profit
         {
          position: absolute;
          left: 50%;
          transform: translateX(-50%);
          display: inline-flex;
          background-color: khaki;
          padding: 9px;
              padding-bottom: 9px;
          border-radius: 5px;
          top: -3px;
          padding-bottom: 0;
         }
   </style>
@endsection

@section('content')


<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>reports</h3>
              </div>

              <div class="title_right" style="width: 41%;">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group" >
                     <ul style="list-style: none; display: flex; padding: 0;margin: 0;">
                        <li>from:<input type="date" name="from" id="from" required="required
                          "></li>
                        <li> to:<input type="date" name="to" id="to" required="required"></li>
                        <li><button id="show" class="btn btn-success">show</button></li>
                     </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            @if(Session::has('msg'))
            <div class="col-md-12">
             
                
                <div class="x_content bs-example-popovers">

                  <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>{{ session('msg') }}</strong> 
                  </div>

                
              </div>
            </div>
           @endif

            @if(Session::has('msgerr'))
            <div class="col-md-12">
             
                
                <div class="x_content bs-example-popovers">

                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>{{ session('msgerr') }}</strong> 
                  </div>

                
              </div>
            </div>
           @endif

            <div class="row" >
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>reports <small></small></h2>
                    <h5 id="profit">total profit : <p id="demo">0</p></h5>
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
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>id</th>
                  <th>date</th>
                  <th>client</th>
                  <th>details</th>
                  <th>paid</th>
                  <th>remain</th>
                  <th>total buy</th>
                  <th>total sell</th>
                  <th>Profit</th>
                  <th>loss</th>
                  <th>tax</th>
                </tr>
              </thead>
              
              
              <tbody>

              </tbody>
            </table>
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

         $('#show').click(function(){
                
                             
                var emps  = [];
                var data = {};

                data.from = $('#from').val();
                data.to   = $('#to').val();


                if (data.from==null || data.from=="",data.to==null || data.to=="")
                {
                    alert("Please Fill Iputs Fields");
                    return;
                }

                emps.push(data);

                 
                $.ajax({
                     url:'/report',
                     method:'get',
                     data:{emps : JSON.stringify(emps) },
                     success:function(resp){
                      if (resp == 'false') 
                      {
                        alert("there is no bills in this time");
                        return false;
                      }
                       $('#datatable tbody').html(resp['table']);
                       $('#demo').html(resp['profit']);
                      
                     },error:function(){
                         alert("error");
                     }
                      

                });

        });

     });

   </script>

@endsection
