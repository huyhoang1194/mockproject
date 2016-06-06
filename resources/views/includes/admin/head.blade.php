<!-- Head -->
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />

    <link rel="icon" type="image/ico" href="http://tattek.com/minimal/assets/images/favicon.ico" />
    <!-- Bootstrap -->
    <link href="{{asset('assets/css/vendor/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/animate/animate.min.css')}}">
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('assets/js/vendor/mmenu/css/jquery.mmenu.all.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/js/vendor/videobackground/css/jquery.videobackground.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap-checkbox.css')}}">

    <link rel="stylesheet" href="{{asset('assets/js/vendor/rickshaw/css/rickshaw.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/vendor/morris/css/morris.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/vendor/tabdrop/css/tabdrop.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/vendor/summernote/css/summernote.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/vendor/summernote/css/summernote-bs3.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/vendor/chosen/css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/vendor/chosen/css/chosen-bootstrap.css')}}">

    <link href="{{asset('assets/css/minimal.css')}}" rel="stylesheet">
    @yield('css')

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('assets/js/vendor/bootstrap/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/mmenu/js/jquery.mmenu.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/sparkline/jquery.sparkline.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/animate-numbers/jquery.animateNumbers.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/blockui/jquery.blockUI.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/vendor/flot/jquery.flot.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/flot/jquery.flot.time.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/flot/jquery.flot.selection.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/flot/jquery.flot.animator.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/flot/jquery.flot.orderBars.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/easypiechart/jquery.easypiechart.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/vendor/rickshaw/raphael-min.js')}}"></script> 
    <script type="text/javascript" src="{{asset('assets/js/vendor/rickshaw/d3.v2.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/vendor/rickshaw/rickshaw.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/vendor/morris/morris.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/vendor/tabdrop/bootstrap-tabdrop.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/vendor/summernote/summernote.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/vendor/chosen/chosen.jquery.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/minimal.min.js')}}"></script>
  <!-- CKEditor & CKFinder -->
    <script type="text/javascript" src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/ckfinder/ckfinder.js')}}"></script>
    <script type="text/javascript">
        var baseURL = "{!!asset('')!!}";
    </script>
    <script type="text/javascript" src="{{asset('assets/js/func_ckfinder.js')}}"></script>
    <!-- END CKEditor & CKFinder -->
    @yield('js')

    <script>
    $(function(){

      // Initialize card flip
      $('.card.hover').hover(function(){
        $(this).addClass('flip');
      },function(){
        $(this).removeClass('flip');
      });

      // Initialize flot chart
      var d1 =[ [1, 715],
            [2, 985],
            [3, 1525],
            [4, 1254],
            [5, 1861],
            [6, 2621],
            [7, 1987],
            [8, 2136],
            [9, 2364],
            [10, 2851],
            [11, 1546],
            [12, 2541]
      ];
      var d2 =[ [1, 463],
                [2, 578],
                [3, 327],
                [4, 984],
                [5, 1268],
                [6, 1684],
                [7, 1425],
                [8, 1233],
                [9, 1354],
                [10, 1200],
                [11, 1260],
                [12, 1320]
      ];
      var months = ["January", "February", "March", "April", "May", "Juny", "July", "August", "September", "October", "November", "December"];

      // flot chart generate
      var plot = $.plotAnimator($("#statistics-chart"), 
        [
          {
            label: 'Sales', 
            data: d1,    
            lines: {lineWidth:3}, 
            shadowSize:0,
            color: '#ffffff'
          },
          { label: "Visits",
            data: d2, 
            animator: {steps: 99, duration: 500, start:200, direction: "right"},   
            lines: {        
              fill: .15,
              lineWidth: 0
            },
            color:['#ffffff']
          },{
            label: 'Sales',
            data: d1, 
            points: { show: true, fill: true, radius:6,fillColor:"rgba(0,0,0,.5)",lineWidth:2 }, 
            color: '#fff',        
            shadowSize:0
          },
          { label: "Visits",
            data: d2, 
            points: { show: true, fill: true, radius:6,fillColor:"rgba(255,255,255,.2)",lineWidth:2 }, 
            color: '#fff',        
            shadowSize:0
          }
        ],{ 
        
        xaxis: {

          tickLength: 0,
          tickDecimals: 0,
          min:1,
          ticks: [[1,"JAN"], [2, "FEB"], [3, "MAR"], [4, "APR"], [5, "MAY"], [6, "JUN"], [7, "JUL"], [8, "AUG"], [9, "SEP"], [10, "OCT"], [11, "NOV"], [12, "DEC"]],

          font :{
            lineHeight: 24,
            weight: "300",
            color: "#ffffff",
            size: 14
          }
        },
        
        yaxis: {
          ticks: 4,
          tickDecimals: 0,
          tickColor: "rgba(255,255,255,.3)",

          font :{
            lineHeight: 13,
            weight: "300",
            color: "#ffffff"
          }
        },
        
        grid: {
          borderWidth: {
            top: 0,
            right: 0,
            bottom: 1,
            left: 1
          },
          borderColor: 'rgba(255,255,255,.3)',
          margin:0,
          minBorderMargin:0,              
          labelMargin:20,
          hoverable: true,
          clickable: true,
          mouseActiveRadius:6
        },
        
        legend: { show: false}
      });

      $(window).resize(function() {
        // redraw the graph in the correctly sized div
        plot.resize();
        plot.setupGrid();
        plot.draw();
      });

      $('#mmenu').on(
        "opened.mm",
        function()
        {
          // redraw the graph in the correctly sized div
          plot.resize();
          plot.setupGrid();
          plot.draw();
        }
      );

      $('#mmenu').on(
        "closed.mm",
        function()
        {
          // redraw the graph in the correctly sized div
          plot.resize();
          plot.setupGrid();
          plot.draw();
        }
      );

      // tooltips showing
      $("#statistics-chart").bind("plothover", function (event, pos, item) {
        if (item) {
          var x = item.datapoint[0],
              y = item.datapoint[1];

          $("#tooltip").html('<h1 style="color: #418bca">' + months[x - 1] + '</h1>' + '<strong>' + y + '</strong>' + ' ' + item.series.label)
            .css({top: item.pageY-30, left: item.pageX+5})
            .fadeIn(200);
        } else {
          $("#tooltip").hide();
        }
      });

      
      //tooltips options
      $("<div id='tooltip'></div>").css({
        position: "absolute",
        //display: "none",
        padding: "10px 20px",
        "background-color": "#ffffff",
        "z-index":"99999"
      }).appendTo("body");

      //generate actual pie charts
      $('.pie-chart').easyPieChart();


      //server load rickshaw chart
      var graph;

      var seriesData = [ [], []];
      var random = new Rickshaw.Fixtures.RandomData(50);

      for (var i = 0; i < 50; i++) {
        random.addData(seriesData);
      }

      graph = new Rickshaw.Graph( {
        element: document.querySelector("#serverload-chart"),
        height: 150,
        renderer: 'area',
        series: [
          {
            data: seriesData[0],
            color: '#6e6e6e',
            name:'File Server'
          },{
            data: seriesData[1],
            color: '#fff',
            name:'Mail Server'
          }
        ]
      } );

      var hoverDetail = new Rickshaw.Graph.HoverDetail( {
        graph: graph,
      });

      setInterval( function() {
        random.removeData(seriesData);
        random.addData(seriesData);
        graph.update();

      },1000);

      // Morris donut chart
      Morris.Donut({
        element: 'browser-usage',
        data: [
          {label: "Chrome", value: 25},
          {label: "Safari", value: 20},
          {label: "Firefox", value: 15},
          {label: "Opera", value: 5},
          {label: "Internet Explorer", value: 10},
          {label: "Other", value: 25}
        ],
        colors: ['#00a3d8', '#2fbbe8', '#72cae7', '#d9544f', '#ffc100', '#1693A5']
      });

      $('#browser-usage').find("path[stroke='#ffffff']").attr('stroke', 'rgba(0,0,0,0)');

      //sparkline charts
      $('#projectbar1').sparkline('html', {type: 'bar', barColor: '#22beef', barWidth: 4, height: 20});
      $('#projectbar2').sparkline('html', {type: 'bar', barColor: '#cd97eb', barWidth: 4, height: 20});
      $('#projectbar3').sparkline('html', {type: 'bar', barColor: '#a2d200', barWidth: 4, height: 20});
      $('#projectbar4').sparkline('html', {type: 'bar', barColor: '#ffc100', barWidth: 4, height: 20});
      $('#projectbar5').sparkline('html', {type: 'bar', barColor: '#ff4a43', barWidth: 4, height: 20});
      $('#projectbar6').sparkline('html', {type: 'bar', barColor: '#a2d200', barWidth: 4, height: 20});

      // sortable table
      $('.table.table-sortable th.sortable').click(function() {
        var o = $(this).hasClass('sort-asc') ? 'sort-desc' : 'sort-asc';
        $('th.sortable').removeClass('sort-asc').removeClass('sort-desc');
        $(this).addClass(o);
      });

      //todo's
      $('#todolist li label').click(function() {
        $(this).toggleClass('done');
      });

      // Initialize tabDrop
      $('.tabdrop').tabdrop({text: '<i class="fa fa-th-list"></i>'});

      //load wysiwyg editor
      $('#quick-message-content').summernote({
        toolbar: [
          //['style', ['style']], // no style button
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          //['insert', ['picture', 'link']], // no insert buttons
          //['table', ['table']], // no table button
          //['help', ['help']] //no help button
        ],
        height: 143   //set editable area's height
      });

      //multiselect input
      $(".chosen-select").chosen({disable_search_threshold: 10});
      
    })
      
    </script>
<!-- End Head -->