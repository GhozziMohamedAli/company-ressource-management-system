

    function car_detail(id)
    {
        $.ajax({
            headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",

            url: '/car/show/' + id ,
            data:
            {
                value: this.value,
            },
            success: function (result) {
                console.log('result', result);
                if (result.success == true)
                {
                    document.getElementById('modal_plate').innerHTML = '';
                    document.getElementById('modal_type').innerHTML = '';
                    document.getElementById('modal_car_meter').innerHTML = '';
                    document.getElementById('modal_fuel_type').innerHTML = '';
                    document.getElementById('modal_fuel_amount').innerHTML = '';
                    document.getElementById('modal_fuel_cost').innerHTML = '';

                    document.getElementById('modal_sum_fuel').innerHTML = '';
                    document.getElementById('modal_oil_amount').innerHTML = '';
                    document.getElementById('modal_oil_cost').innerHTML = '';
                    document.getElementById('modal_sum_oil').innerHTML = '';
                    document.getElementById('modal_atonements').innerHTML = '';
                    document.getElementById('modal_battery').innerHTML = '';


                    
                    $('#modal_plate').append(result.data.plate_number);
                    $('#modal_type').append(result.data.type);
                    if(result.data.locale === 'ar' && result.data.car_meter === "working"){
                        $('#modal_car_meter').append('يعمل');
                    }else if(result.data.locale === 'ar' && result.data.car_meter === "disabled"){
                        $('#modal_car_meter').append('معطل');
                    }else{
                        $('#modal_car_meter').append(result.data.car_meter);
                    }
                    

                    if(result.data.locale === 'ar' && result.data.fuel_type === "gasoline"){
                        $('#modal_fuel_type').append('الغازولين');
                    }else if(result.data.locale === 'ar' && result.data.car_meter === "diesel"){
                        $('#modal_fuel_type').append('ديزل');
                    }else{
                        $('#modal_fuel_type').append(result.data.fuel_type);
                    }

                   

                    $('#modal_fuel_amount').append(result.data.fuel_amount);
                    $('#modal_fuel_cost').append(result.data.fuel_cost);
                    $('#modal_sum_fuel').append(result.data.sum_fuel);
                    $('#modal_oil_amount').append(result.data.oil_amount);
                    $('#modal_oil_cost').append(result.data.oil_cost);
                    $('#modal_sum_oil').append(result.data.sum_oil);
                    $('#modal_atonements').append(result.data.atonements);
                    $('#modal_battery').append(result.data.battery);


                }
            },
            error: function (err) {
                console.log('err ', err)
            }
        });
    }

    function employee_detail(id)
    {
        $.ajax({
            headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",

            url: '/employee/show/' + id ,
            data:
            {
                value: this.value,
            },
            success: function (result) {
                console.log('result', result);
                if (result.success == true)
                {
                    document.getElementById("modal_status").innerHTML='';
                    document.getElementById("modal_name").innerHTML='';
                    document.getElementById("modal_birth_date").innerHTML='';
                    document.getElementById("modal_profession").innerHTML='';
                    document.getElementById("modal_phone_number").innerHTML='';
                    document.getElementById("modal_employment_start").innerHTML='';
                    document.getElementById("modal_hijri_employment_start").innerHTML='';
                    document.getElementById("modal_bank_account_number").innerHTML='';
                    
                    document.getElementById("modal_passport_number").innerHTML='';
                    document.getElementById("modal_passport_end_date").innerHTML='';
                    document.getElementById("modal_residency_number").innerHTML='';
                    document.getElementById("modal_residency_end_date").innerHTML='';
                    if(result.data.status == 1){
                        $('#modal_status').append("working");
                    }else{
                        $('#modal_status').append("vaccation");
                    }
                   
                    $('#modal_name').append(result.data.name);
                    $('#modal_birth_date').append(result.data.birth_date);
                    $('#modal_profession').append(result.data.profession);
                    $('#modal_phone_number').append(result.data.phone_number);
                    $('#modal_employment_start').append(result.data.employment_start);
                    $('#modal_hijri_employment_start').append(result.data.hijri_employment_start);
                    $('#modal_bank_account_number').append(result.data.bank_account_number);
                    $('#modal_medical_insurance').append(result.data.medical_insurance);
                    $('#modal_driving_license').append(result.data.driving_license);
                    $('#modal_passport_number').append(result.data.passport_number);
                    $('#modal_passport_end_date').append(result.data.passport_end_date);
                    $('#modal_residency_number').append(result.data.residency_number);
                    $('#modal_residency_end_date').append(result.data.residency_end_date);


                }
            },
            error: function (err) {
                console.log('err ', err)
            }
        });
    }

    function show_images(id)
    {
        $.ajax({
            headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",

            url: '/car/show_image/' + id ,
            data:
            {
                value: this.value,
            },
            success: function (result) {
                
               
                
                if (result.success == true)
                {
                    var array = [];
                    jQuery.each(result.data, function(index){
                        
                        array.push(result.data[index].url);
                        
                    });
                   
                    createCarousel(array);
                    
                   /* Jquery.forEach((images, index) => {
                        const carouselId = `carousel${index + 1}`;
                       
                        createCarousel(carouselId, images);
                    
                    });*/
                   
                }
            },
            error: function (err) {
                console.log('err ', err)
            }
        });
    }

    function createCarousel(images) {
        const container = document.querySelector('.carousel-container');
        element = document.getElementById("remove-item");

        while (element.firstChild) {
                    element.removeChild(element.firstChild);
                 }


        // Create carousel HTML
        const carouselHTML = `
          <div  id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="2000">
            <div class="carousel-inner">
              ${images.map((image, index) => `
                <div class="carousel-item ${index === 0 ? 'active' : ''}">
                 <a href="${image}"> <img src="${image}" class="d-block w-100" alt="Image ${index + 1}"></a>
                </div>
              `).join('')}
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
          </div>
        `;
      
        // Append the carousel to the container
        container.innerHTML += carouselHTML;
      }

       // Search function

       (function(document) {
        'use strict';

        var TableFilter = (function(myArray) {
            var search_input;

            function _onInputSearch(e) {
                search_input = e.target;
                var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
                myArray.forEach.call(tables, function(table) {
                    myArray.forEach.call(table.tBodies, function(tbody) {
                        myArray.forEach.call(tbody.rows, function(row) {
                            var text_content = row.textContent.toLowerCase();
                            var search_val = search_input.value.toLowerCase();
                            row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
                        });
                    });
                });
            }

            return {
                init: function() {
                    var inputs = document.getElementsByClassName('search-input');
                    myArray.forEach.call(inputs, function(input) {
                        input.oninput = _onInputSearch;
                    });
                }
            };
        })(Array.prototype);

        document.addEventListener('readystatechange', function() {
            if (document.readyState === 'complete') {
                TableFilter.init();
            }
        });

    })(document);

    function confirmation(url,id){
        
        var local = document.getElementById('current_local').value;
        console.log(local);
        if(local == 'en'){
            var result1 = confirm("are you sure?");
        }
         else{
            var result1 = confirm("هل أنت متأكد ؟");
        }
        if (result1) {
            $.ajax({
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "get",
                dataType: "JSON",
                url: url + id,
                success: function (result)
                {
                    console.log(result);
                    if (result.success == true) {
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                        console.log('result ', result)
                        
                    }
                    else {
                        console.log(result);
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: result.data
                        })
                    }
                },
            });
            
        }
    }