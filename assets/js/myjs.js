
    var i=1;  
    $('#addenquiry').click(function(){ 
            //alert('a');        
           i++;  
           str='<div id="enquiry'+i+'">'+
               '<br />'+
               '<div class="row">'+               
               '<div class="col-12 col-md-2">'+
               '<label class="m-t-20">Enquiry Date</label>'+
               '<input type="text" class="form-control cquiry_date" placeholder="Enter Enquiry Date" id="cq_date" name="cq_date[]" value="">'+
               '</div>'+
               '<div class="col-12 col-md-2">'+
               '<label class="m-t-20">Enquiry Time</label>'+
               '<input type="text" class="form-control cquiry_time" placeholder="Enter Enquiry Time" id="cq_time" name="cq_time[]" value="">'+
               '</div>'+
               '<div class="col-12 col-md-7">'+
               '<label class="m-t-20">Enquiry Details</label>'+               
               '<textarea class="form-control" placeholder="Enter Enquiry Details" id="cq_enquiry" name="cq_enquiry[]" rows="3"></textarea>'+
               '</div>'+               
               '<div class="col-12 col-md-1">'+
               '<label class="m-t-20">Remove</label>'+
               '<button type="button" name="remove" id="enquiry'+i+'" class="btn btn-danger btn-sm btn_remove">Remove</button>'+
               '</div>'+                
               '</div>';
               '</div>'+
           $('#dynamic_field').append(str);  

           // MAterial Date picker    
          $('.cquiry_date').bootstrapMaterialDatePicker({ 
            weekStart: 0, 
            time: false,
            format: 'DD-MMM-YYYY'
            });

            $('.cquiry_time').bootstrapMaterialDatePicker({ 
                weekStart: 0, 
                date:false,
                time: true,
                format: 'HH:mm',
                twelvehour: false
                });

      }); 

       
      $(document).on('click', '.btn_remove', function(){            
           var button_id = $(this).attr("id");   
           $('#'+button_id+'').remove();  
      });  
      
   
   // var i=1;  
    $('#addenquiry2').click(function(){ 
            //alert('a');        

            
           i++;  
           str='<div id="enquiry2'+i+'">'+
               '<br />'+
               '<div class="row">'+               
               '<div class="col-12 col-md-2">'+
               '<label class="m-t-20">Enquiry Date</label>'+
               '<input type="text" class="form-control pquiry_date" placeholder="Enter Enquiry Date" id="pq_date" name="pq_date[]" value="">'+
               '</div>'+
               '<div class="col-12 col-md-2">'+
               '<label class="m-t-20">Enquiry Time</label>'+
               '<input type="text" class="form-control pquiry_time" placeholder="Enter Enquiry Time" id="pq_time" name="pq_time[]" value="">'+
               '</div>'+
               '<div class="col-12 col-md-7">'+
               '<label class="m-t-20">Enquiry Details</label>'+               
               '<textarea class="form-control" placeholder="Enter Enquiry Details" id="pq_enquiry" name="pq_enquiry[]" rows="3"></textarea>'+
               '</div>'+               
               '<div class="col-12 col-md-1">'+
               '<label class="m-t-20">Remove</label>'+
               '<button type="button" name="remove" id="enquiry2'+i+'" class="btn btn-danger btn-sm btn_remove">Remove</button>'+
               '</div>'+                
               '</div>';
               '</div>'+
           $('#dynamic_field2').append(str);  

           // MAterial Date picker    
          $('.pquiry_date').bootstrapMaterialDatePicker({ 
            weekStart: 0, 
            time: false,
            format: 'DD-MMM-YYYY'
            });

            $('.pquiry_time').bootstrapMaterialDatePicker({ 
                weekStart: 0, 
                date:false,
                time: true,
                format: 'HH:mm',
                twelvehour: false
                });
      }); 


      $('#addbank').click(function(){ 
        //alert('a');        

        
       i++;  
       str='<div id="bankdtls'+i+'">'+
           '<br />'+
           '<div class="row" id="bankdtlsrow">'+
           '<input type="hidden" class="form-control" placeholder="Enter Bank id" id="bd_id" name="bd_id[]" value=""  autocomplete="off">'+                                                                                
                                    '<div class="col-12 col-sm-3">'+
                                        '<label class="m-t-20">Bank Name</label>'+
                                        '<input type="text" class="form-control" placeholder="Enter Bank Name" id="bd_name" name="bd_name[]" value="" >'+
                                    '</div>'+
                                    '<div class="col-12 col-sm-3">'+
                                        '<label class="m-t-20">Bank IFSC</label>'+
                                        '<input type="text" class="form-control" placeholder="Enter Bank IFSC" id="bd_ifsc" name="bd_ifsc[]" value="" >'+                                                                                
                                    '</div>'+
                                    '<div class="col-12 col-sm-3">'+
                                        '<label class="m-t-20">Bank A/C No</label>'+
                                        '<input type="text" class="form-control" placeholder="Enter Bank A/C No" id="bd_acno" name="bd_acno[]" value="" >'+                                                                                
                                    '</div>'+
                                    '<div class="col-12 col-sm-3">'+
                                    '</div>'+
                                    '<div class="col-12 col-sm-3">'+
                                        '<label class="m-t-20">Card Type</label>'+
                                        '<select class="form-control custom-select" style="width: 100%; height:36px;" id="bd_cardtype" name="bd_cardtype[]">'+
                                                '<option value="">Select</option>'+                                                        
                                                '<option value="Debit Card">Debit Card</option>'+                                                                                                        
                                                '<option value="Credit Card">Credit Card</option>'+                                                                                                        
                                        '</select>'+
                                    '</div>'+
                                    '<div class="col-12 col-sm-3">'+
                                        '<label class="m-t-20">Debit Card No</label>'+
                                        '<input type="text" class="form-control" placeholder="Enter Card No" id="bd_cardno" name="bd_cardno[]" value="" >'+                                                                               
                                    '</div>'+
                                    '<div class="col-12 col-sm-2">'+
                                        '<label class="m-t-20">Debited Amount</label>'+
                                        '<input type="text" class="form-control" placeholder="Enter Debited Amount" id="bd_amount" name="bd_amount[]" value="" >'+                                                                                
                                    '</div>'+
                                    '<div class="col-12 col-sm-3">'+
                                        '<label class="m-t-20">Transaction Reference</label>'+
                                        '<input type="text" class="form-control" placeholder="Enter Transaction Reference" id="bd_transaction_ref" name="bd_transaction_ref[]" value="" >'+
                                    '</div>'+
                                    '<div class="col-12 col-md-1">'+
                                    '<label class="m-t-20">Remove</label>'+
                                    '<button type="button" name="remove" id="bankdtls'+i+'" class="btn btn-danger btn-sm btn_remove">Remove</button>'+
                                    '</div>'+ 
                                    '</div>'+
           '</div>';
       $('#dynamic_field3').append(str);  
  }); 

/*
$('#addsamebank').click(function(){ 
    //alert('aa');        
    var $bankdtls = $('#bankdtlsrow').clone();
    $('#dynamic_field3').append($bankdtls);
    //$('#dynamic_field3').append(str);  
});
*/

  $('#disposestatus').hide(1000);
  $('#disposestatus2').hide(1000);
  $('#disposedYes').click(function(){ 
    //alert('a'); 
    $('#disposestatus').show(1000);
    $('#disposestatus2').show(1000);
  });
  $('#disposedNo').click(function(){ 
    //alert('a'); 
    $('#disposestatus').hide(1000);
    $('#disposestatus2').hide(1000);
  });


       
      $(document).on('click', '.btn_remove', function(){            
           var button_id = $(this).attr("id");   
           $('#'+button_id+'').remove();  
      });

       
    // MAterial Date picker    
    $('.cquiry_date').bootstrapMaterialDatePicker({ 
        weekStart: 0, 
        time: false,
        format: 'DD-MMM-YYYY'
    });

    $('.cquiry_time').bootstrapMaterialDatePicker({ 
        weekStart: 0, 
        date:false,
        time: true,
        format: 'HH:mm',
        twelvehour: false
    });

    $('.pquiry_date').bootstrapMaterialDatePicker({ 
        weekStart: 0, 
        time: false,
        format: 'DD-MMM-YYYY'
        });
    
        $('.pquiry_time').bootstrapMaterialDatePicker({ 
        weekStart: 0, 
        date:false,
        time: true,
        format: 'HH:mm',
        twelvehour: false
        });

/*
// Visualization API with the 'corechart' package.
google.charts.load('visualization', { packages: ['corechart'] });
google.charts.setOnLoadCallback(drawLineChart);
google.charts.setOnLoadCallback(drawLineChart2);

function drawLineChart() {
    $.ajax({
        url: "http://scientificwing.kolkatapolice.org:81/Abhijog/Api/printComplainGraph",
        dataType: "json",
        type: "GET",
        contentType: "application/json; charset=utf-8",
        success: function (data) {

            //alert(data);
            
            var arrSales = [['Date', 'Complain Count']];    // Define an array and assign columns for the chart.

            // Loop through each data and populate the array.
            $.each(data, function (index, value) {

                //alert(value.c_c);

                arrSales.push([new Date(value.mt_date), parseInt(value.c_c)]);
            });

            // Set chart Options.
            var options = {
                title: 'Complain Status',
                curveType: 'function',
                legend: { position: 'bottom', textStyle: { color: '#555', fontSize: 14} }  // You can position the legend on 'top' or at the 'bottom'.
            };

            // Create DataTable and add the array to it.
            var figures = google.visualization.arrayToDataTable(arrSales)

            // Define the chart type (LineChart) and the container (a DIV in our case).
            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(figures, options);      // Draw the chart with Options.
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('Got an Error');
        }
    });
}


function drawLineChart2() {
    $.ajax({
        url: "http://scientificwing.kolkatapolice.org:81/Abhijog/Api/printDisposePendingGraph",
        dataType: "json",
        type: "GET",
        contentType: "application/json; charset=utf-8",
        success: function (data) {

            //alert(data);
            
            var arrSales = [['Date', 'Complain Count']];    // Define an array and assign columns for the chart.

            // Loop through each data and populate the array.
            $.each(data, function (index, value) {

                //alert(value.c_c);

                arrSales.push([value.mt_disposed, parseInt(value.c_c)]);
            });

            // Set chart Options.
            var options = {
                title: 'Complain Disposed Status',
                curveType: 'function',
                legend: { position: 'bottom', textStyle: { color: '#555', fontSize: 14} }  // You can position the legend on 'top' or at the 'bottom'.
            };

            // Create DataTable and add the array to it.
            var figures = google.visualization.arrayToDataTable(arrSales)

            // Define the chart type (LineChart) and the container (a DIV in our case).
            var chart = new google.visualization.PieChart(document.getElementById('curve_chart2'));
            chart.draw(figures, options);      // Draw the chart with Options.
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('Got an Error');
        }
    });
}
*/