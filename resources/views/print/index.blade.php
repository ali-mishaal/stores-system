<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>store bill </title>
     <!-- Bootstrap -->
    <link href="{{ asset('css/backend-css/bootstrap.min.css') }}" rel="stylesheet" >
    <!-- Font Awesome -->
    <link href="{{ asset('css/backend-css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" >
    <!-- NProgress -->
    <link href="{{ asset('css/backend-css/nprogress/nprogress.css') }}" rel="stylesheet" >
    <!-- Custom Theme Style -->
    <link href="{{ asset('css/backend-css/custom.min.css') }}" rel="stylesheet" >
    <style>
      ul
      {
        margin: 0;
        padding: 0;
        list-style: none;
      }
      ul li
      {
        margin-bottom: 5px;
        list-style: none;
      }
    </style>
   
  </head>
  <body style="background-color: #fff">

  <div id="demo">                
          
        <h1>
            <i class="fa fa-globe"></i> Invoice.            
        </h1>
                      
                      
       <h4 style="margin: 53px;">
        <p> client name: {{ $bill->user->name}}</p>
       </h4>

       <h5 style="margin-left: 53px; margin-bottom: 10px;">
        <p> bill detail:</p>
       </h5>
        
  <table class="table table-striped" style="background-color: #fff;width: 80%;margin: auto;border-radius: 5px;">
        <!-- <thead>
          <tr>
            <th>item</th>
            <th>Store</th>
            <th>quantity</th>
            <th>price</th>
            <th>tax</th>
            <th>item total</th>
            <th></th>
          </tr>
        </thead> -->
        <tbody>
                <?php $tax = 0; ?>
              @foreach($bill->biild as $detail)  
              <tr>
                <td>{{ $detail->item->name }}<span style="color:#fff">,</span> </td>
                <td>{{ $detail->store->name }}<span style="color:#fff">,</span> </td>
                <td>{{ $detail->quantity }}<span style="color:#fff">,</span> </td>
                <td>{{ $detail->price }} EGB<span style="color:#fff">,</span> </td>
                <td>@if($detail->item->tax == 0)0 EGB<span style="color:#fff">,</span>
                    @else
                       <?php 
                       $tax += $detail->quantity * $detail->price * 5 /100; ?>{{ $detail->quantity * $detail->price * 5 /100 }} EGB<span style="color:#fff">,</span>
                    @endif

                    
                </td>
                <td>{{ $detail->total }} EGB<span style="color:#fff">,</span> </td>
                <td></td>
              </tr>
              @endforeach
                 
        </tbody>
  </table>
            

  <ul style="list-style: none;margin: 129px;">
    
    <li>Invoice: #{{ $bill->id }}</li>
    <li>Date Of Bill: {{ $bill->billdate }}</li>
    <li>total: {{ $bill->total }} EGB</li>
    <li>total Tax: {{ $tax }} EGB</li>
    <li>paid: {{ $bill->paid }} EGB</li>
    <li>remain: {{ $bill->remain }} EGB</li>
    
  </ul>

 </div>                       
        <a id="basic" href="#nada" class="button button-primary" style="position: absolute;padding: 12px 20px;border-radius: 5px;background-color: cornflowerblue;color: #fff;border: none;top: 100%;left: 7%;">Print</a>
        <!-- /page content -->

    <!-- jQuery -->
    <script src="{{ asset('js/backend-js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/backend-js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('js/backend-js/fastclick/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('js/backend-js/nprogress/nprogress.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/backend-js/custom.min.js') }}"></script>

   
<!-- printThis -->

<script type="text/javascript" src="{{ asset('js/printThis.js') }}"></script>


<script>
 
  // $('#basic').on("click", function () {
  //     $('.demo').printThis({
  //       debug: false,               // show the iframe for debugging
  //       importCSS: true,            // import parent page css
  //       importStyle: false,         // import style tags
  //       printContainer: true,       // print outer container/$.selector
  //       loadCSS: "http://localhost:8000/css/backend-css/custom.min.css",                // path to additional css file - use an array [] for multiple
  //       pageTitle: "",              // add title to print page
  //       removeInline: false,        // remove inline styles from print elements
  //       removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
  //       printDelay: 333,            // variable print delay
  //       header: null,               // prefix to html
  //       footer: null,               // postfix to html
  //       base: false,                // preserve the BASE tag or accept a string for the URL
  //       formValues: true,           // preserve input/form values
  //       canvas: false,              // copy canvas content
  //       doctypeString: '...',       // enter a different doctype for older markup
  //       removeScripts: false,       // remove script tags from print content
  //       copyTagClasses: false,      // copy classes from the html & body tag
  //       beforePrintEvent: null,     // function for printEvent in iframe
  //       beforePrint: null,          // function called before iframe is filled
  //       afterPrint: null  
  //     });



      $('#basic').click(function () {

        var printme = document.getElementById('demo');
        var wm = window.open("","","width=900,height=700");
        wm.document.write(printme.outerHTML);
        wm.document.close();
        wm.focus();
        wm.print();
        wm.close();
          
      });

</script>
  </body>
  </html>