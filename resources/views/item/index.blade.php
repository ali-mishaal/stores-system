@extends('../structure')

@section('title' , 'items')

@section('css')

<style>
  .tab2 tr:first-child td
  {
    border-top: 0;
  }

</style>

@endsection

@section('content')


<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>items</h3>
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
                    <h2>items <small>sub title</small></h2>
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
                  <th>name</th>
                  <th>Purchasing price</th>
                  <th>selling price</th>
                  <th>tax</th>
                  <th>store : quantity</th>
                  <th>action</th>
                </tr>
              </thead>
              
              
              <tbody>
                
                @foreach($items as $item)
                       
                <tr>

                    
                   
                    
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['buy'] }}</td>
                    <td>{{ $item['sell'] }}</td>
                    <td>
                      @if($item['tax'] == 1)
                         <i class="fa fa-star" style="color: green"></i>
                      @else
                         <i class="fa fa-close" style="color: #B71C1C"></i>
                      @endif

                    </td>
                    <td>
                      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
  store and quantity
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">quantity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <table class="table tab2" style="margin-bottom: 0;">
                        @foreach($item->store as $store)
                           <tr>
                            <td>{{ $store->name }}</td>
                            <td> {{ $store->pivot->quantity }}</td>
                          </tr>
                        @endforeach
                      </table>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
                      

                    </td>

                    </td>
                      <td>
                      <a id="send" href="{{ route('edit.item' , $item['id']) }}" class="btn btn-success">Edit</a>
                     <a id="send" href="{{ route('destroy.item' , $item['id']) }}" class="btn btn-danger">Delete</a>
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
