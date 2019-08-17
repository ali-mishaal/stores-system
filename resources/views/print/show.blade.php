
@extends('../structure')

@section('title' , 'Billhead|create')

@section('content')

<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Create Bill Head</h3>
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
                    <h2>Create Bill Head <small>sub title</small></h2>
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
                    <img src="<?php echo asset("storage/images/$image->image")?>" style="width: 100%;height: 1000px">
                    <form class="form-horizontal form-label-left" novalidate name="Form">
                   

                      <div class="item form-group {{ $errors->has('name_it') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">bill number<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                         <input type="text" id="billid" name="bill" required="required" class="form-control col-md-7 col-xs-12" value="{{ $arr_head['id']}}" readonly="readonly">

                         </div>
                       </div>

                      <div class="item form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="text" id="date" name="date" required="required" class="form-control col-md-7 col-xs-12" readonly="readonly" value="{{ $arr_head['date'] }}">
                        </div>
                         @if ($errors->has('date'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('date') }}</strong>
                              </span>
                          @endif
                      </div>

                      <div class="item form-group {{ $errors->has('client') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">clients<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="text" id="client" name="client" required="required" class="form-control col-md-7 col-xs-12" readonly="readonly" value="{{ $arr_head['name'] }}">
                        </div>
                         @if ($errors->has('client'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('client') }}</strong>
                              </span>
                          @endif
                      </div>



                    </form>

 <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>id</th>
                  <th>item</th>
                  <th>store</th>
                  <th>quantity</th>
                  <th>price</th>
                  <th>tax</th>
                  <th>total</th>
                </tr>
              </thead>
              
             
              <tbody>
              	<?php $count = 1; ?>
                @for($i=0 ; $i < count($arr) ; $i=$i+6)
                <tr>
                  <td>{{ $count }}</td>
                  <td>{{ $arr[$i] }}</td>
                  <td>{{ $arr[$i+1] }}</td>
                  <td>{{ $arr[$i+2] }}</td>
                  <td>{{ $arr[$i+3] }}</td>
                  <td>{{ $arr[$i+4] }}</td>
                  <td>{{ $arr[$i+5] }}</td>
                </tr>
                <?php $count = $count +1; ?>
                @endfor  
              </tbody>
            </table>
            total:<input type="text" name="totalitems" id="totalitems" value="{{ $arr_head['total']}}" readonly="readonly">
            paid:<input type="text" name="paid" id="paid" value="{{ $arr_head['paid'] }}" readonly="readonly">
            total tax:<input type="text" name="totax" id="totax" value="{{ $arr_head['total_tax'] }}" readonly="readonly">
            remain:<input type="text" name="remain" id="remain" value="{{ $arr_head['remain'] }}" readonly="readonly">

            <button id="create" class="btn btn-success">create</button>
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
      
         $('#create').click(function(){
                
                             
                var emps  = [];
                var data1 = {};
                var data2 = {};
                
                data1.id=document.forms["Form"]["bill"].value;
                data1.date=document.forms["Form"]["date"].value;
                data1.client=document.forms["Form"]["client"].value;
                data1.total=document.getElementById('totalitems').value;
                data1.paid=document.getElementById('paid').value;
                data1.remain=document.getElementById('remain').value;
                

                emps.push(data1);

           

                var theTbl = document.getElementById('datatable');
                
                for(var i=1;i<theTbl.rows.length;i++)
                {
                    for(var j=1;j<theTbl.rows[i].cells.length;j++)
                    {
                         
                         emps[emps.length] = theTbl.rows[i].cells[j].innerHTML;
                         
                    } 
                    
                }
                 
                $.ajax({
                     url:'/pri/create',
                     method:'get',
                     data:{emps : JSON.stringify(emps) },
                     success:function(resp){
                     	
                     if(resp == "no")
                     {
                     	alert("no quantity available");
                     	return;
                     }
                      var url = '/billhead';
                      $( location ).attr("href", url);
                      
                     },error:function(){
                         alert("error");
                     }
                      

                });

        });

     });

   </script>
@endsection