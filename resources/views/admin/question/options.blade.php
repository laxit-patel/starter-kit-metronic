
<!--begin::Modal - Show Option-->
<div class="modal fade " id="order_details" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-75">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Line Items</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn-group">
                    <button type="button" class="btn btn-light-primary btn-hover-scale me-2" onclick="printOrder()">
                        <i class="fa fa-print"></i> Print
                    </button>
                    <button type="button" class="btn btn-light-danger btn-hover-scale me-2" data-bs-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </button>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y" id="print_order">
                <div class="table-responsive" style="page-break-inside: avoid!important">
                    <table class="table table-rounded border gs-5" id="line_item_table">
                        <tbody class="bg-gopal" >
                            <tr>
                                <td colspan="4">
                                    <img alt="Logo" src="{{ asset('assets/media/logos/favicon.png') }}" style="height: 40px;">
                                    <span class="ms-3 fs-2x text-white" style="vertical-align: middle"> 
                                        Purchase Order
                                    </span>
                                </td>
                                <td colspan="4" style="text-align: end;vertical-align: middle">
                                    <span class="fs-2x text-white" id="order_no"> 
                                        
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                     <tbody class="bg-gopal text-white" id="line_item_table_thead"></tbody>
                        <tbody id="line_item_table_tbody"></tbody>
                    </table>
                </div>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add permissions-->

<script>
    var target = document.querySelector("#datatable");

    var blockUI = new KTBlockUI(target, {
        message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Fetching Line Items ...</div>',
    });

    function fetch_items(order)
    {
        blockUI.block();

        $.ajax({
            url: "{{ route('user.order.items') }}",
            type: "GET",
            data: {
                'order':order
            },
            success: function(data){

                $('#order_no').html(data['header'][0].po_no);
            
                $('#line_item_table_thead').empty(); //clear table

                //first row
                var r1 = document.createElement('tr');

                var r1c11 = document.createElement('td');
                r1c11.innerText = "Customer No.";

                var r1c21 = document.createElement('td');
                r1c21.setAttribute("colspan", "2");
                r1c21.innerText = data['header'][0].customer_number;

                var r1c31 = document.createElement('td');
                r1c31.classList.add('text-end');
                r1c31.innerText = "Date";

                var r1c41 = document.createElement('td');
                r1c41.setAttribute("colspan", "2");
                r1c41.innerText = data['header'][0].order_date;

                var r1c51 = document.createElement('td');
                r1c51.classList.add('text-end');
                r1c51.innerText = "Total Bill Amount";

                var r1c61 = document.createElement('td');
                r1c61.classList.add('text-end');
                r1c61.classList.add('fs-2x');
                r1c61.classList.add('p-0');
                r1c61.classList.add('pe-5');
                r1c61.innerText = "₹" + (Math.round( Number(data['header'][0].amount) + Number(data['header'][0].tax)).toLocaleString('en-IN') );

                r1.appendChild(r1c11);
                r1.appendChild(r1c21);
                r1.appendChild(r1c31);
                r1.appendChild(r1c41);
                r1.appendChild(r1c51);
                r1.appendChild(r1c61);
                $('#line_item_table_thead').append(r1); // first row

                var r2 = document.createElement('tr');

                var r2c21 = document.createElement('td');
                r2c21.innerText = "Customer Name";

                var r2c22 = document.createElement('td');
                r2c22.setAttribute("colspan", "2");
                r2c22.innerText = data['header'][0].name;

                var r2c23 = document.createElement('td');
                r2c23.classList.add('text-end');
                r2c23.innerText = "Total Qty";

                var r2c24 = document.createElement('td');

                var r2c25 = document.createElement('td');

                var r2c26 = document.createElement('td');
                r2c26.classList.add('text-end');
                r2c26.innerText = "Total Tax";

                var r2c27 = document.createElement('td');
                r2c27.classList.add('text-end');
                r2c27.innerText = "Total Amount";

                r2.appendChild(r2c21);
                r2.appendChild(r2c22);
                r2.appendChild(r2c23);
                r2.appendChild(r2c24);
                r2.appendChild(r2c25);
                r2.appendChild(r2c26);
                r2.appendChild(r2c27);
                $('#line_item_table_thead').append(r2); //second row

                var r3 = document.createElement('tr');

                var r3c31 = document.createElement('td');
                r3c31.innerText = "City";

                var r3c32 = document.createElement('td');
                r3c32.setAttribute("colspan", "2");
                r3c32.innerText = data['header'][0].city;

                var r3c33 = document.createElement('td');
                r3c33.classList.add('text-end');
                r3c33.innerText = data['header'][0].qty;

                var r3c34 = document.createElement('td');

                var r3c35 = document.createElement('td');

                var r3c36 = document.createElement('td');
                r3c36.classList.add('text-end');
                r3c36.innerText = (data['header'][0].tax).toLocaleString('en-IN');

                var r3c37 = document.createElement('td');
                r3c37.classList.add('text-end');
                r3c37.innerText = (data['header'][0].amount).toLocaleString('en-IN');

                r3.appendChild(r3c31);
                r3.appendChild(r3c32);
                r3.appendChild(r3c33);
                r3.appendChild(r3c34);
                r3.appendChild(r3c35);
                r3.appendChild(r3c36);
                r3.appendChild(r3c37);
                $('#line_item_table_thead').append(r3); //third row

                var r4 = document.createElement('tr');
                r4.classList.add('bg-secondary');
                r4.classList.add('custom-thead');
                r4.classList.add('text-dark');

                var r4c41 = document.createElement('td');
                r4c41.innerText = "Code";

                var r4c42 = document.createElement('td');
                r4c42.innerText = "Product";

                var r4c43 = document.createElement('td');
                r4c43.innerText = "SO NO";

                var r4c44 = document.createElement('td');
                r4c44.classList.add('text-end');
                r4c44.innerText = "Qty";

                var r4c45 = document.createElement('td');
                r4c45.classList.add('text-end');
                r4c45.innerText = "Rate";

                var r4c46 = document.createElement('td');
                r4c46.classList.add('text-end');
                r4c46.innerText = "Tax Rate(%)";

                var r4c47 = document.createElement('td');
                r4c47.classList.add('text-end');
                r4c47.innerText = "Tax";

                var r4c48 = document.createElement('td');
                r4c48.classList.add('text-end');
                r4c48.innerText = "Amount";

                r4.appendChild(r4c41);
                r4.appendChild(r4c42);
                r4.appendChild(r4c43);
                r4.appendChild(r4c44);
                r4.appendChild(r4c45);
                r4.appendChild(r4c46);
                r4.appendChild(r4c47);
                r4.appendChild(r4c48);
                $('#line_item_table_thead').append(r4); //third row


                $('#line_item_table_tbody').empty(); //empty table

                $.each(data['items'], function(counter,item) {

                var row = document.createElement('tr');

                var cell_code = document.createElement('td');
                cell_code.innerText = item.material_code;

                var cell_product = document.createElement('td');
                cell_product.innerText = item.product;

                var cell_so_no = document.createElement('td');
                cell_so_no.innerText = item.so_no;

                var cell_qty = document.createElement('td');
                cell_qty.classList.add('text-end');
                cell_qty.innerText = parseInt(item.qty);

                var cell_price = document.createElement('td');
                cell_price.classList.add('text-end');
                cell_price.innerText = item.price;

                var cell_tax_rate = document.createElement('td');
                cell_tax_rate.classList.add('text-end');
                cell_tax_rate.innerText = item.tax_rate;

                var cell_tax = document.createElement('td');
                cell_tax.classList.add('text-end');
                cell_tax.innerText = item.tax;

                var cell_total = document.createElement('td');
                cell_total.classList.add('text-end');
                cell_total.innerText = item.total

                row.appendChild(cell_code);
                row.appendChild(cell_product);
                row.appendChild(cell_so_no);
                row.appendChild(cell_qty);
                row.appendChild(cell_price);
                row.appendChild(cell_tax_rate);
                row.appendChild(cell_tax);
                row.appendChild(cell_total);

                if(item.so_no == null)
                {
                    row.classList = 'bg-light-danger';
                }else
                {
                    row.classList = 'bg-light-success';
                }

                $('#line_item_table_tbody').append(row);

                });

                blockUI.release();
                //show modal
                $("#order_details").modal('show');
                

            },
            error : function(request,err)
            {
                blockUI.release();
                Toast.fire({
                icon: 'error',
                title: 'Line Item Error',
                text: "Couldnt Fetch the Line item 😓"
                }); //display error toast
            }
        });
    }


</script>