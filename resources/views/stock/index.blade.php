@extends('../structure')

@section('title' , 'stocks')

@section('content')


<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>stocks</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
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

            <div class="row" style="width: 125%;">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>stocks <small>sub title</small></h2>
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
                  <th>item</th>
                  <th>store</th>
                  <th>action</th>
                </tr>
              </thead>
              
              
              <tbody>
                
                @foreach($stocks as $stock)
                        
                <tr>

                    
                   
                    
                    <td>{{ $stock['id'] }}</td>
                    <td>{{ $stock['item_id'] }}</td>
                    <td>{{ $stock['store_id'] }}</td>
                    <td>{{ $stock['quantity'] }}</td>

                    </td>
                      <td>
                      <a id="send" href="{{ route('edit.stock' , $stock['id']) }}" class="btn btn-success">Edit</a>
                     <a id="send" href="{{ route('destroy.stock' , $stock['id']) }}" class="btn btn-danger">Delete</a>
                    </td> 


                </tr>
                @endforeach
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


@endsection
